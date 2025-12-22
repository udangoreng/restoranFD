<?php

namespace App\Http\Controllers;

use App\Mail\ReservationConfirmed;
use App\Models\CustTable;
use App\Models\Order;
use App\Models\Reservation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Midtrans\Config;
use Midtrans\Snap;

class ReservationController extends Controller
{
    public function __construct()
    {
        Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        Config::$clientKey = env('MIDTRANS_CLIENT_KEY');
        Config::$isProduction = env('MIDTRANS_IS_PRODUCTION', false);
        Config::$isSanitized = env('MIDTRANS_SANITIZED', true);
        Config::$is3ds = env('MIDTRANS_3DS', true);
    }

    //User
    public function index()
    {
        $userdata = Auth::user();
        return view('reservasi', compact('userdata'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'salutation' => 'required',
            'first_name' => 'required|string|max:20',
            'last_name' => 'required|string|max:20',
            'phone' => 'required',
            'email' => 'required|email',
            'person_attend' => 'required|numeric|max:10',
            'booking_date' => 'required|date',
            'time_in' => 'required',
            'request' => 'nullable|string',
            'allergies' => 'nullable|string|max:100',
            'message' => 'nullable|string|max:255',
        ]);

        $carbon_time = Carbon::parse($request->time_in);
        $time_out = $carbon_time->addMinutes(150);

        $availableTable = CustTable::where('capacity', '>=', $request->person_attend)
            ->where('is_occupied', false)
            ->whereDoesntHave('reservations', function ($query) use ($carbon_time, $time_out, $request) {
                $query->where('booking_date', $request->booking_date)
                    ->where('status', '!=', 'Cancelled')
                    ->where(function ($q) use ($carbon_time, $time_out) {
                        $q->whereBetween('time_in', [$carbon_time->format('H:i'), $time_out->format('H:i')])
                            ->orWhereBetween('time_out', [$carbon_time->format('H:i'), $time_out->format('H:i')])
                            ->orWhere(function ($sub) use ($carbon_time, $time_out) {
                                $sub->where('time_in', '<', $carbon_time->format('H:i'))
                                    ->where('time_out', '>', $time_out->format('H:i'));
                            });
                    });
            })
            ->orderBy('capacity', 'asc')
            ->first();

        if (!$availableTable) {
            return back()->with('error', 'Sorry! There\'s No Avaiable Table On That Time and Date. Please Choose Other Time and Date!');
        }

        $queue = Reservation::whereDate('created_at', Carbon::today())->count();
        $res_id = '#RSV-' . Carbon::Now()->format('Ymd') . '-' . ($queue + 1);

        $data = $request->merge([
            'reservation_code' => $res_id,
            'status' => 'Pending Payment', // Set to Pending Payment initially
            'time_out' => $time_out->format('H:i'),
        ]);

        $res = Reservation::create($data->all());
        return redirect()->route('reservation.detail', $res->id)->with('success', 'Reservation created. Please complete your payment.');
    }

    public function detail(string $id)
    {
        $reservation = Reservation::with(['orders.carts.menu'])->findOrFail($id);
        return view('detail_reservation', compact('reservation'));
    }

    public function seeReservation()
    {
        $user = Auth::user();
        $reservation = Reservation::where('user_id', $user->id)->whereIn('status', ['Pending Payment', 'Confirmed', 'Dine'])->get();
        return view('myreservation', compact('reservation'));
    }

    public function seeHistory()
    {
        $user = Auth::user();
        $reservation = Reservation::where('user_id', $user->id)->whereIn('status', ['Completed', 'Cancelled', 'No Show'])->get();
        return view('myhistory', compact('reservation'));
    }

    function getPaymentToken(Request $request, string $id)
    {
        $reservation = Reservation::with('orders')->findOrFail($id);
        $order = $reservation->orders->first();

        if (!$order) {
            return response()->json(['status' => 'error', 'message' => 'No order found for this reservation.']);
        }

        // Check if full payment is already paid (remaining_amount is 0)
        if ($order->remaining_amount == 0) {
            return response()->json(['status' => 'error', 'message' => 'Payment has already been completed.']);
        }

        $transactionDetails = [
            'transaction_details' => [
                'order_id' => 'PAY-' . $order->order_code . '-' . time(),
                'gross_amount' => $order->remaining_amount, // Pay the remaining amount
            ],
            'customer_details' => [
                'first_name' => $reservation->first_name,
                'last_name' => $reservation->last_name,
                'email' => $reservation->email,
                'phone' => $reservation->phone,
            ],
            'item_details' => [
                [
                    'id' => 'PAY-' . $reservation->reservation_code,
                    'price' => $order->remaining_amount,
                    'quantity' => 1,
                    'name' => 'Full Payment for Reservation ' . $reservation->reservation_code,
                ]
            ],
            'callbacks' => [
                'finish' => url('admin/reservation/' . $id . '/payment/callback'),
                'error' => url('admin/reservation/' . $id . '/payment/callback'),
                'pending' => url('admin/reservation/' . $id . '/payment/callback'),
            ]
        ];

        try {
            $snapToken = Snap::getSnapToken($transactionDetails);

            $order->midtrans_order_id = $transactionDetails['transaction_details']['order_id'];
            $order->save();

            return response()->json([
                'status' => 'success',
                'snapToken' => $snapToken,
                'clientKey' => Config::$clientKey,
                'amount' => $order->remaining_amount
            ]);
        } catch (\Exception $e) {
            Log::error('Midtrans SNAPI error: ' . $e->getMessage());
            return response()->json(['status' => 'error', 'message' => 'Failed to initialize payment.']);
        }
    }

    /**
     * Handle payment callback (Single Step)
     */
    public function handlePaymentCallback(Request $request, string $id)
    {
        $reservation = Reservation::with('orders')->findOrFail($id);
        $order = $reservation->orders->first();

        $orderId = $request->get('order_id');
        $transactionStatus = $request->get('transaction_status');
        $paymentType = $request->get('payment_type');

        if (!$order || $order->midtrans_order_id !== $orderId) {
            return redirect()->route('reservation.detail', $id)->with('error', 'Invalid payment transaction.');
        }

        if ($transactionStatus === 'capture' || $transactionStatus === 'settlement') {
            // FULL Payment successful
            $order->status = 'Completed';
            $order->remaining_amount = 0; // Set remaining to 0
            $order->payment_type = 'Full_Settlement';
            $order->payment_method = $paymentType;
            $order->save();

            // Reservation is now Confirmed (Table is theirs)
            $reservation->status = 'Confirmed';
            $reservation->save();

            $this->sendConfirmationEmail($reservation);

            return redirect()->route('reservation.detail', $id)
                ->with('success', 'Payment successful! Your reservation is confirmed.');
        } elseif ($transactionStatus === 'pending') {
            return redirect()->route('reservation.detail', $id)
                ->with('warning', 'Payment is pending. Please complete your payment.');
        } else {
            // Payment failed
            $order->status = 'Cancelled';
            $order->save();
            $reservation->status = 'Cancelled';
            $reservation->save();

            // Free table
            if ($reservation->table_id) {
                $table = CustTable::find($reservation->table_id);
                if ($table) {
                    $table->is_occupied = false;
                    $table->save();
                }
            }

            return redirect()->route('reservation.detail', $id)->with('error', 'Payment failed.');
        }
    }

    public function handleMidtransNotification(Request $request)
    {
        $notification = new \Midtrans\Notification();

        $transaction = $notification->transaction_status;
        $type = $notification->payment_type;
        $orderId = $notification->order_id;
        $fraud = $notification->fraud_status;

        $order = Order::where('midtrans_order_id', $orderId)->first();

        if (!$order) {
            Log::error('Order not found for Midtrans order ID: ' . $orderId);
            return response()->json(['status' => 'error', 'message' => 'Order not found']);
        }

        $reservation = $order->reservation;

        if ($transaction == 'capture') {
            if ($type == 'credit_card') {
                if ($fraud == 'challenge') {
                    $order->status = 'Pending';
                } else {
                    $this->processSuccessfulPayment($order, $reservation, $type);
                }
            }
        } elseif ($transaction == 'settlement') {
            $this->processSuccessfulPayment($order, $reservation, $type);
        } elseif ($transaction == 'pending') {
            $order->status = 'Pending Payment';
        } elseif (in_array($transaction, ['deny', 'expire', 'cancel'])) {
            $order->status = 'Cancelled';
            $reservation->status = 'Cancelled';
            $reservation->save();

            if ($reservation->table_id) {
                $table = CustTable::find($reservation->table_id);
                if ($table) {
                    $table->is_occupied = false;
                    $table->save();
                }
            }
        }

        $order->save();
        return response()->json(['status' => 'success']);
    }

    private function processSuccessfulPayment($order, $reservation, $paymentMethod)
    {
        $order->status = 'Completed';
        $order->payment_type = 'Full_Settlement';
        $order->payment_method = $paymentMethod;
        $order->remaining_amount = 0;

        $order->save();

        $reservation->status = 'Confirmed';
        $reservation->save();

        $this->sendConfirmationEmail($reservation);
    }


    public function show()
    {
        $reservations = Reservation::orderBy('created_at', 'desc')->get();
        return view('admin.reservation', compact('reservations'));
    }

    public function edit(string $id)
    {
        $reservation = Reservation::with(['user', 'orders.carts.menu', 'table'])
            ->findOrFail($id);

        $availableTables = CustTable::where('is_occupied', false)
            ->orWhere('id', $reservation->table_id)
            ->orderBy('capacity', 'asc')
            ->get();

        return view('admin.detailreservation', compact('reservation', 'availableTables'));
    }

    public function updateStatus(Request $request, string $id)
    {
        $request->validate([
            'status' => 'required|in:Confirmed,Cancelled,Dine,Completed',
            'table_id' => 'nullable|exists:cust_tables,id',
        ]);

        $reservation = Reservation::with('orders')->findOrFail($id);
        $oldStatus = $reservation->status;
        $reservation->status = $request->status;

        if ($request->status === 'Completed') {
            if ($reservation->table_id) {
                $table = CustTable::find($reservation->table_id);
                if ($table) {
                    $table->is_occupied = false;
                    $table->save();
                }
            }
            foreach ($reservation->orders as $order) {
                if ($order->remaining_amount != 0) {
                    $order->remaining_amount = 0;
                    $order->payment_type = "Full_Settlement";
                }
                $order->status = 'Completed';
                $order->save();
            }
            $reservation->time_out = Carbon::now();
        }

        if ($request->status === 'Cancelled') {
            if ($reservation->table_id) {
                $table = CustTable::find($reservation->table_id);
                if ($table) {
                    $table->is_occupied = false;
                    $table->save();
                }
            }
            foreach ($reservation->orders as $order) {
                $order->status = 'Cancelled';
                $order->save();
            }
            $this->sendCancellationEmail($reservation);
        } elseif ($request->status === 'Dine') {
            $reservation->time_in = Carbon::now();
        } elseif ($request->status === 'Completed') {
            if ($reservation->table_id) {
                $table = CustTable::find($reservation->table_id);
                if ($table) {
                    $table->is_occupied = false;
                    $table->save();
                }
            }
            foreach ($reservation->orders as $order) {
                if ($order->remaining_amount != 0) {
                    $order->remaining_amount = 0;
                    $order->payment_type = "Full_Settlement";
                }
                $order->status = 'Completed';
                $order->save();
            }
            $reservation->time_out = Carbon::now();
        }

        $reservation->save();

        if ($request->status === 'Confirmed' && $oldStatus !== 'Confirmed') {
            $this->sendConfirmationEmail($reservation);
        }

        return redirect()->route('admin.reservation.detail', $id)
            ->with('success', 'Reservation status updated successfully.');
    }

    public function updateTable(Request $request, string $id)
    {
        $request->validate([
            'table_id' => 'required|exists:cust_tables,id',
        ]);

        $reservation = Reservation::findOrFail($id);
        $newTable = CustTable::find($request->table_id);

        if ($newTable->is_occupied && $newTable->id !== $reservation->table_id) {
            return redirect()->route('admin.reservation.detail', $id)->with('error', 'Selected table is currently occupied.');
        }

        if ($newTable->capacity < $reservation->person_attend) {
            return redirect()->route('admin.reservation.detail', $id)->with('error', 'Selected table does not have enough capacity.');
        }

        if ($reservation->table_id) {
            $oldTable = CustTable::find($reservation->table_id);
            if ($oldTable) {
                $oldTable->is_occupied = false;
                $oldTable->save();
            }
        }

        $reservation->table_id = $request->table_id;
        $reservation->save();

        $newTable->is_occupied = true;
        $newTable->save();

        return redirect()->route('admin.reservation.detail', $id)->with('success', 'Table assigned successfully.');
    }

    public function processPayment(Request $request, string $id)
    {
        $request->validate([
            'payment_method' => 'required|string|in:Cash,Credit Card,Debit Card,QRIS',
        ]);

        $reservation = Reservation::with('orders')->findOrFail($id);

        if ($reservation->orders->isEmpty()) {
            return redirect()->route('admin.reservation.detail', $id)->with('error', 'No orders found.');
        }

        foreach ($reservation->orders as $order) {
            if ($order->remaining_amount != 0) {
                $order->status = 'Completed';
                $order->payment_type = "Full_Settlement";
                $order->payment_method = $request->payment_method;
                $order->remaining_amount = 0; // Set remaining to 0
                $order->save();

                $reservation->status = 'Confirmed';
                $reservation->save();

                $this->sendConfirmationEmail($reservation);
            }
        }

        return redirect()->route('admin.reservation.detail', $id)->with('success', 'Full payment processed successfully.');
    }

    public function destroyReservation(string $id)
    {
        $reservation = Reservation::with('orders')->findOrFail($id);

        if ($reservation->table_id) {
            $table = CustTable::find($reservation->table_id);
            if ($table) {
                $table->is_occupied = false;
                $table->save();
            }
        }

        foreach ($reservation->orders as $order) {
            if ($order->carts) {
                $order->carts()->delete();
            }
            $order->delete();
        }

        $reservation->delete();

        return redirect()->route('admin.reservation')->with('success', 'Reservation deleted successfully.');
    }

    private function sendConfirmationEmail($reservation)
    {
        try {
            Mail::to($reservation->email)->send(new ReservationConfirmed($reservation));
        } catch (\Exception $e) {
            Log::error('Failed to send confirmation email: ' . $e->getMessage());
        }
    }

    private function sendCancellationEmail($reservation)
    {
        try {
            $subject = 'Reservation Cancelled: ' . $reservation->reservation_code;
            $message = "Dear {$reservation->salutation} {$reservation->first_name},\n\n";
            $message .= "Your reservation {$reservation->reservation_code} has been cancelled.\n";
            $message .= "If you have any questions, please contact us.\n\n";
            $message .= "Best regards,\nRestaurant Team";

            Mail::raw($message, function ($mail) use ($reservation, $subject) {
                $mail->to($reservation->email)->subject($subject);
            });
        } catch (\Exception $e) {
            Log::error('Failed to send cancellation email: ' . $e->getMessage());
        }
    }

    // Unused methods
    public function store(Request $request)
    {
        abort(404);
    }
    public function destroy(string $id)
    {
        abort(404);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\Order;
use App\Models\Cart;
use App\Models\Reservation;
use Midtrans\Config;
use Midtrans\Snap;

class CheckoutController extends Controller
{
    public function __construct()
    {
        Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        Config::$clientKey = env('MIDTRANS_CLIENT_KEY');
        Config::$isProduction = env('MIDTRANS_IS_PRODUCTION', false);
        Config::$isSanitized = env('MIDTRANS_SANITIZED', true);
        Config::$is3ds = env('MIDTRANS_3DS', true);
    }

    /**
     * Show checkout page
     */
    public function show(Request $request)
    {
        $user = Auth::user();
        $orderId = $request->get('order_id');
        
        if (!$orderId) {
            return redirect()->back()->with('error', 'Order tidak ditemukan');
        }
        
        $order = Order::with([
            'carts.menu', 
            'reservation', 
            'user'
        ])->findOrFail($orderId);
        
        if ($order->user_id != $user->id) {
            abort(403, 'Unauthorized');
        }
        
        if (!$this->validateMinimumOrder($order->id)) {
            return redirect()->back()->with('error', 
                'Minimal order harus terdiri dari: 1 Appetizer, 1 Main Dish, dan 1 Dessert'
            );
        }
        if (!$order->snap_token) {
            $snapToken = $this->generateSnapToken($order);
            $order->snap_token = $snapToken;
            $order->save();
        }
        
        return view('checkout', compact('order'));
    }

    /**
     * Generate Snap Token for Midtrans
     */
   private function generateSnapToken($order)
{
    try {
        Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        Config::$clientKey = env('MIDTRANS_CLIENT_KEY');
        Config::$isProduction = env('MIDTRANS_IS_PRODUCTION', false);
        Config::$isSanitized = env('MIDTRANS_SANITIZED', true);
        Config::$is3ds = env('MIDTRANS_3DS', true);
        
        Log::info('Midtrans Config:', [
            'serverKey_set' => !empty(Config::$serverKey),
            'clientKey_set' => !empty(Config::$clientKey),
            'isProduction' => Config::$isProduction
        ]);
        
        if (!$order->total_amount || $order->total_amount <= 0) {
            Log::error('Invalid order total amount: ' . $order->total_amount);
            throw new \Exception('Invalid order total amount');
        }
        $downPaymentAmount = $order->down_payment_amount ?? ($order->total_amount * 0.5);
        $midtransOrderId = $order->order_code . '-' . time();
        
        $transactionDetails = [
            'order_id' => $midtransOrderId,
            'gross_amount' => (int) $downPaymentAmount,
        ];
        
        $customerDetails = [
            'first_name' => $order->user->first_name ?? 'Customer',
            'last_name' => $order->user->last_name ?? '',
            'email' => $order->user->email ?? 'customer@example.com',
            'phone' => $order->user->phone ?? '081234567890',
        ];

        $itemDetails = [];
        if ($order->carts && $order->carts->count() > 0) {
            foreach ($order->carts as $item) {
                if ($item->menu) {
                    $itemDetails[] = [
                        'id' => (string) $item->menu_id,
                        'price' => (int) $item->price,
                        'quantity' => (int) $item->quantity,
                        'name' => substr($item->menu->name, 0, 50),
                    ];
                }
            }
        }
        $itemDetails[] = [
            'id' => 'DOWNPAYMENT',
            'price' => (int) $downPaymentAmount,
            'quantity' => 1,
            'name' => 'Down Payment (50%) - ' . $order->order_code,
        ];

        $params = [
            'transaction_details' => $transactionDetails,
            'customer_details' => $customerDetails,
            'item_details' => $itemDetails,
            'callbacks' => [
                'finish' => url('/checkout/success'),
                'error' => url('/checkout/error'),
                'pending' => url('/checkout/pending'),
            ],
            'expiry' => [
                'start_time' => date("Y-m-d H:i:s O"),
                'unit' => 'hour',
                'duration' => 24
            ]
        ];
        
        Log::info('Midtrans Request Params:', $params);
        
        $snapToken = Snap::getSnapToken($params);
        $order->midtrans_order_id = $midtransOrderId;
        $order->save();
        
        return $snapToken;
        
    } catch (\Exception $e) {
        Log::error('Midtrans Error: ' . $e->getMessage());
        Log::error('Stack Trace: ' . $e->getTraceAsString());
        return null;
    }
}

    /**
     * Process payment callback from Midtrans
     */
    public function callback(Request $request)
    {
        $json = json_decode($request->getContent());

        $serverKey = env('MIDTRANS_SERVER_KEY');
        $hashed = hash("sha512", 
            $json->order_id . $json->status_code . $json->gross_amount . $serverKey
        );
        
        if ($hashed != $json->signature_key) {
            return response()->json(['error' => 'Invalid signature'], 403);
        }
        
        $orderCode = explode('-', $json->order_id)[0];
        $order = Order::where('order_code', $orderCode)->first();
        
        if (!$order) {
            return response()->json(['error' => 'Order not found'], 404);
        }
        
        if ($json->transaction_status == 'settlement') {
            $order->status = 'Processing';
            $order->down_payment_paid = true;
            $order->payment_method = $json->payment_type;
            $order->midtrans_order_id = $json->order_id;
            
            if ($order->reservation) {
                $order->reservation->status = 'Pending Payment';
                $order->reservation->save();
            }
            
        } elseif ($json->transaction_status == 'pending') {
            $order->status = 'Pending';
            
        } elseif (in_array($json->transaction_status, ['deny', 'expire', 'cancel'])) {
            $order->status = 'Cancelled';
        }
        
        $order->save();
        
        return response()->json(['success' => true]);
    }

    /**
     * Show success page
     */
    public function success(Request $request)
    {
        $orderId = $request->get('order_id');
        
        if ($orderId) {
            $order = Order::where('midtrans_order_id', $orderId)->first();
            $res = Reservation::where('id', $order->reservation_id)->first();
            $data = [
                'status' => 'Processing',
                'down_payment_paid' => 1,
            ];

            $upd = [
                'status' => 'Pending Payment',
            ];

            $order->update($data);
            $res->update($upd);

            if ($order) {
                return view('checkout_success', compact('order'));
            }
        }
        
        return view('checkout_success');
    }

    /**
     * Show error page
     */
    public function error()
    {
        return view('checkout_error');
    }

    /**
     * Show pending page
     */
    public function pending()
    {
        return view('checkout_pending');
    }

    /**
     * Validate minimum order requirement
     */
    private function validateMinimumOrder($orderId)
    {
        $carts = Cart::with('menu')
            ->where('order_id', $orderId)
            ->get();
        
        $hasAppetizer = false;
        $hasMainDish = false;
        $hasDessert = false;
        
        foreach ($carts as $item) {
            $category = strtolower($item->menu->category);
            
            if (str_contains($category, 'appetizer')) $hasAppetizer = true;
            if (str_contains($category, 'main') || str_contains($category, 'dish')) $hasMainDish = true;
            if (str_contains($category, 'dessert')) $hasDessert = true;
        }
        
        return $hasAppetizer && $hasMainDish && $hasDessert;
    }
}
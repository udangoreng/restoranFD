<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Menu;
use App\Models\Order;
use App\Models\Reservation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index(string $resId)
    {
        $reservation = Reservation::findOrFail($resId);

        $appetizers = Menu::where('category', 'Appetizer')->get();
        $mainDishes = Menu::where('category', 'Main Dish')->get();
        $desserts = Menu::where('category', 'Dessert')->get();
        $beverages = Menu::where('category', 'Beverages')->get();
        $additionals = Menu::where('category', 'Additional')->get();

        return view('menu', compact('appetizers', 'mainDishes', 'desserts', 'beverages', 'additionals', 'reservation'));
    }

    public function detail(string $resId, string $menuId)
    {
        $reservation = Reservation::findOrFail($resId);
        $menu = Menu::findOrFail($menuId);
        return view('detail_menu', compact('menu'));
    }

    public function addToCart(Request $request)
    {
        $user = Auth::user();

        $activeReservation = Reservation::where('user_id', $user->id)
            ->whereIn('status', ['Created', 'Pending Payment'])
            ->first();

        if (!$activeReservation) {
            return redirect()->back()->with('error', 'You Currently Don\'t Have An Active Reservation');
        }

        $request->validate([
            'menu_id' => 'required|exists:menus,id',
            'quantity' => 'required|integer|min:1'
        ]);

        $menu = Menu::findOrFail($request->menu_id);

        $queue = Reservation::whereDate('created_at', Carbon::today())->count();
        $or_id = '#RSV-' . Carbon::Now()->format('Ymd') . '-' . ($queue + 1);

        $order = Order::firstOrCreate(
            ['reservation_id' => $activeReservation->id],
            [
                'user_id' => $user->id,
                'order_code' => 'ORD-' . time() . '-' . rand(1000, 9999),
                'total_amount' => 0,
                'payment_type' => 'Down_Payment',
                'status' => 'Pending'
            ]
        );

        $cartItem = Cart::where('order_id', $order->id)
            ->where('menu_id', $menu->id)
            ->first();

        if ($cartItem) {
            $cartItem->quantity += $request->quantity;
            $cartItem->subtotal = $cartItem->quantity * $cartItem->price;
            $cartItem->save();
        } else {
            Cart::create([
                'order_id' => $order->id,
                'menu_id' => $menu->id,
                'quantity' => $request->quantity,
                'price' => $menu->price,
                'subtotal' => $menu->price * $request->quantity,
                'category' => $menu->category,
            ]);
        }

        $this->updateOrderTotal($order->id);
        $cartCount = Cart::where('order_id', $order->id)->sum('quantity');
        
        if ($request->ajax() || $request->wantsJson()) {
            try {
                return response()->json([
                    'success' => true,
                    'message' => 'Item berhasil ditambahkan ke keranjang.',
                    'cart_count' => $cartCount,
                    'order_total' => $order->fresh()->total_amount
                ]);
                
            } catch (\Exception $e) {
                return response()->json([
                    'error' => 'Terjadi kesalahan: ' . $e->getMessage()
                ], 500);
            }
        }

        return redirect()->back()->with('success', 'Successfully Add Item Into Cart');
    }

    public function updateQuantity(Request $request, $id)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1'
        ]);

        $cartItem = Cart::findOrFail($id);
        $cartItem->quantity = $request->quantity;
        $cartItem->subtotal = $cartItem->quantity * $cartItem->price;
        $cartItem->save();

        $this->updateOrderTotal($cartItem->order_id);

        return redirect()->back()->with('success', 'Quantity berhasil diupdate.');
    }

    private function updateOrderTotal($orderId)
    {
        $order = Order::find($orderId);
        $total = Cart::where('order_id', $orderId)->sum('subtotal');

        $order->total_amount = $total;

        if ($order->down_payment_amount === null) {
            $order->down_payment_amount = $total * 0.5;
            $order->remaining_amount = $total * 0.5;
        }

        $order->save();
    }

    public function getCart()
    {
        $user = Auth::user();

        $activeReservation = Reservation::where('user_id', $user->id)
            ->whereIn('status', ['Created', 'Pending Payment'])
            ->first();

        if (!$activeReservation) {
            return response()->json(['error' => 'No active reservation'], 400);
        }

        $order = Order::where('reservation_id', $activeReservation->id)->first();
        if (!$order) {
            return response()->json(['cart' => [], 'total' => 0]);
        }

        $cartItems = Cart::with('menu')->where('order_id', $order->id)->get();

        return response()->json([
            'cart' => $cartItems,
            'total' => $order->total_amount
        ]);
    }
}

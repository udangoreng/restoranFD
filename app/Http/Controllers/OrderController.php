<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Menu;
use App\Models\Order;
use App\Models\Reservation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class OrderController extends Controller
{

    public function getActiveReservation()
    {
        $user = Auth::user();

        $activeReservation = Reservation::where('user_id', $user->id)
            ->whereIn('status', ['Created', 'Pending Payment'])
            ->first();

        return $activeReservation;
    }


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

        $otherMenus = Menu::where('id', '!=', $menuId)
            ->orderBy('created_at', 'desc')
            ->take(4)
            ->get();

        if ($otherMenus->count() < 4) {
            $remainingCount = 4 - $otherMenus->count();
            $randomMenus = Menu::whereNotIn('id', array_merge(
                [$menuId],
                $otherMenus->pluck('id')->toArray()
            ))
                ->inRandomOrder()
                ->take($remainingCount)
                ->get();

            $otherMenus = $otherMenus->merge($randomMenus);
        }
        return view('detail_menu', compact('menu', 'otherMenus'));
    }

    public function destroy(string $id)
    {
        try {
            $cart = Cart::findOrFail($id);
            $cart->delete();

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }

    public function addToCart(Request $request)
    {
        $user = Auth::user();

        $activeReservation = $this->getActiveReservation();

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

        // Hanya set jika null atau jika ada kesalahan signifikan
        if (
            $order->down_payment_amount === null ||
            abs($order->down_payment_amount - ($total * 0.5)) > 1000
        ) {

            $order->down_payment_amount = $total * 0.5;
            $order->remaining_amount = $total * 0.5;

            Log::info('Updated down payment amount', [
                'order_id' => $orderId,
                'total' => $total,
                'down_payment' => $total * 0.5,
                'remaining' => $total * 0.5
            ]);
        }

        $order->save();
    }

    public function getCart()
    {
        try {
            $user = Auth::user();

            if (!$user) {
                return response()->json([
                    'error' => 'User not authenticated',
                    'has_active_reservation' => false
                ], 401);
            }

            $activeReservation = Reservation::where('user_id', $user->id)
                ->whereIn('status', ['Created', 'Pending Payment'])
                ->first();

            if (!$activeReservation) {
                return response()->json([
                    'error' => 'No active reservation found. Please create a reservation first.',
                    'has_active_reservation' => false,
                    'cart' => [],
                    'total' => 0
                ], 200);
            }

            $order = Order::where('reservation_id', $activeReservation->id)->first();

            $cartItems = [];
            $total = 0;

            if ($order) {
                $cartItems = $order->carts()->with('menu')->get();
                $total = $order->total_amount;
            }

            $validationResult = $this->validateOrder($order ? $order->id : null);

            return response()->json([
                'success' => true,
                'cart' => $cartItems,
                'total' => $total,
                'reservation_id' => $activeReservation->id,
                'reservation_code' => $activeReservation->reservation_code,
                'order_id' => $order ? $order->id : null,
                'order_code' => $order ? $order->order_code : null,
                'has_active_reservation' => true,
                'is_downpayment_paid' => !isset($order->down_payment_paid) || $order->down_payment_paid == 0 ? 0 : 1,
                'is_valid_order' => $validationResult['is_valid'],
                'missing_categories' => $validationResult['missing'],
                'user_id' => $user->id
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Server error: ' . $e->getMessage(),
                'has_active_reservation' => false
            ], 500);
        }
    }

    private function validateOrder($orderId)
    {
        if (!$orderId) {
            return [
                'is_valid' => false,
                'missing' => ['appetizer', 'main_dish', 'dessert']
            ];
        }

        $order = Order::with('carts.menu')->find($orderId);

        if (!$order || $order->carts->isEmpty()) {
            return [
                'is_valid' => false,
                'missing' => ['appetizer', 'main_dish', 'dessert']
            ];
        }

        $hasAppetizer = false;
        $hasMainDish = false;
        $hasDessert = false;
        $hasBeverage = false;

        foreach ($order->carts as $item) {
            if ($item->menu) {
                $category = strtolower($item->menu->category);

                if (str_contains($category, 'appetizer')) $hasAppetizer = true;
                if (str_contains($category, 'main') || str_contains($category, 'dish')) $hasMainDish = true;
                if (str_contains($category, 'dessert')) $hasDessert = true;
                if (str_contains($category, 'drink') || str_contains($category, 'beverage')) $hasBeverage = true;
            }
        }

        $missing = [];
        if (!$hasAppetizer) $missing[] = 'appetizer';
        if (!$hasMainDish) $missing[] = 'main dish';
        if (!$hasDessert) $missing[] = 'dessert';

        $isValid = $hasAppetizer && $hasMainDish && $hasDessert;

        return [
            'is_valid' => $isValid,
            'missing' => $missing,
            'has_beverage' => $hasBeverage
        ];
    }

    private function getMissingCategories($orderId)
    {
        if (!$orderId) {
            return ['appetizer', 'main_dish', 'dessert'];
        }

        $order = Order::with('carts.menu')->find($orderId);
        $missing = [];

        $hasAppetizer = false;
        $hasMainDish = false;
        $hasDessert = false;

        foreach ($order->cartItems as $item) {
            $category = strtolower($item->menu->category);

            if (str_contains($category, 'appetizer')) $hasAppetizer = true;
            if (str_contains($category, 'main') || str_contains($category, 'dish')) $hasMainDish = true;
            if (str_contains($category, 'dessert')) $hasDessert = true;
        }

        if (!$hasAppetizer) $missing[] = 'appetizer';
        if (!$hasMainDish) $missing[] = 'main dish';
        if (!$hasDessert) $missing[] = 'dessert';

        return $missing;
    }
}

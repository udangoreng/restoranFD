<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = ['id'];
    protected $fillable = [
        'reservation_id',
        'user_id',
        'order_code',
        'total_amount',
        'down_payment_amount',
        'remaining_amount',
        'payment_method',
        'payment_type',
        'midtrans_order_id',
        'snap_token',
        'status',
        'down_payment_paid'
    ];

    public function reservation()
    {
        return $this->belongsTo(Reservation::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    public function hasMinimumOrder()
    {
        $categories = $this->cartItems()
            ->with('menu')
            ->get()
            ->pluck('menu.category')
            ->map(function($category) {
                return strtolower($category);
            })
            ->toArray();
        
        $hasAppetizer = in_array('appetizer', $categories) || 
                       collect($categories)->contains(fn($cat) => str_contains($cat, 'appetizer'));
        
        $hasMainDish = in_array('main dish', $categories) || 
                      in_array('main_dish', $categories) ||
                      collect($categories)->contains(fn($cat) => str_contains($cat, 'main'));
        
        $hasDessert = in_array('dessert', $categories) ||
                     collect($categories)->contains(fn($cat) => str_contains($cat, 'dessert'));
        
        return $hasAppetizer && $hasMainDish && $hasDessert;
    }
}

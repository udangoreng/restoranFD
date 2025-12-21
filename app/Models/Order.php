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

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }
}

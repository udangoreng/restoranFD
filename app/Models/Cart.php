<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $guarded = ['id'];
    protected $fillable = [
        'order_id',
        'menu_id',
        'quantity',
        'price',
        'subtotal',
        'category',
        'note',
        'reservation_id'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function menu()
    {
        return $this->belongsTo(Menu::class, 'menu_id');
    }
}

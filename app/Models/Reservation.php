<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = ([
        'reservation_code',
        'user_id',
        'table_id',
        'salutation',
        'first_name',
        'last_name',
        'phone',
        'email',
        'person_attend',
        'booking_date',
        'time_in',
        'time_out',
        'request',
        'allergies',
        'message',
        'status',
    ]);

    protected $guarded = ['id'];

    public function table()
    {
        return $this->belongsTo(CustTable::class, 'table_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}

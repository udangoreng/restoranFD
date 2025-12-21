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
}

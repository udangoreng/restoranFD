<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustTable extends Model
{
    use HasFactory;
    protected $table = 'cust_tables';
    protected $fillable = [
        'table_number',
        'capacity',
        'is_occupied'
    ];

    protected $guarded = ['id'];

    public function reservations()
    {
        return $this->hasMany(Reservation::class, 'table_id');
    }
}

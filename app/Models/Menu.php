<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category',
        'price',
        'calories',
        'description',
        'img_path',
    ];

    public function getImageUrlAttribute()
    {
        if (file_exists(public_path($this->img_path))) {
            return asset($this->img_path);
        }

        return asset('storage/' . $this->img_path);
    }
}

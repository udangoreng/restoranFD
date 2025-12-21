<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Reservation;
use Illuminate\Http\Request;

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

    }
}

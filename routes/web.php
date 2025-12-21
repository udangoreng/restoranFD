<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\UserController;

Route::get('/auth/login', [AuthController::class, 'showLogin'])->name('auth.login');
Route::get('/auth/register', [AuthController::class, 'showRegister'])->name('auth.register');

Route::post('/auth/login', [AuthController::class, 'login'])->name('login');
Route::post('/auth/register', [AuthController::class, 'register'])->name('register');

Route::get('/auth/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/', function () {
    return view('home');
})->name('/');

Route::controller(MenuController::class)->group(function () {
    route::get('/menu', 'show')->name('menu');
    route::get('/menu/{id}', 'detail')->name('menu.detail');
});

Route::get('/popup', function () {
    return view('popup');
});

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/aboutus', function () {
    return view('about');
})->name('aboutus');


Route::middleware(['verifyrole:admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin');

    Route::controller(MenuController::class)->group(function () {
        Route::get('/menu', 'index')->name('admin.menu');
        Route::post('/menu', 'store')->name('admin.menu.add');
        Route::get('/menu/{id}', 'edit')->name('admin.menu.detail');
        Route::put('/menu/{id}', 'update')->name('admin.menu.update');
        Route::delete('/menu/{id}', 'destroy')->name('admin.menu.destroy');
    });

    Route::controller(TableController::class)->group(function () {
        Route::get('/table', 'index')->name('admin.table');
        Route::post('/table', 'store')->name('admin.table.add');
        Route::get('/table/{id}', 'edit')->name('admin.table.detail');
        Route::put('/table/{id}', 'update')->name('admin.table.update');
        Route::delete('/table/{id}', 'destroy')->name('admin.table.destroy');
    });

    Route::controller(ReservationController::class)->group(function () {
        Route::get('/reservation', 'show')->name('admin.reservation');
        Route::post('/reservation', 'store')->name('admin.reservation.add');
        Route::get('/reservation/{id}', 'edit')->name('admin.reservation.detail');
        Route::put('/reservation/{id}', 'update')->name('admin.reservation.update');
        Route::delete('/reservation/{id}', 'destroy')->name('admin.reservation.destroy');
    });

    Route::controller(UserController::class)->group(function () {
        Route::get('/user', 'index')->name('admin.user');
        Route::post('/user', 'store')->name('admin.user.add');
        Route::get('/user/{id}', 'edit')->name('admin.user.detail');
        Route::put('/user/{id}', 'update')->name('admin.user.update');
        Route::delete('/user/{id}', 'destroy')->name('admin.user.destroy');
    });
});


    Route::get('/payment', function () {
        return view('payment');
    })->name('payment');

    Route::get('/checkout', function () {
        return view('checkout');
    })->name('checkout');

    Route::get('/order', function () {
        return view('order');
    });

    Route::get('/myreservation', function () {
        return view('myreservation');
    });

    Route::get('/myhistory', function () {
        return view('myhistory');
    });

    Route::get('/editprofile', function () {
        return view('editprofile');
    });

    Route::get('/detail_history', function () {
        return view('detail_history');
    });

    Route::get('/detail_menu', function () {
        return view('detail_menu');
    });

    Route::get('/detail_reservation', function () {
        return view('detail_reservation');
    });

Route::controller(ReservationController::class)->group(function () {
    Route::get('reservation', 'index')->name('reservation');
});

Route::middleware(['verifyrole:customer'])->group(function () {
    Route::controller(UserController::class)->group(function () {
        Route::get('profile/', 'show')->name('profile');
        Route::get('profile/edit/', 'detail')->name('editprofile');
        Route::put('profile/edit/{id}', 'userUpdate')->name('profile.edit');
    });
    
    Route::controller(ReservationController::class)->group(function () {
        Route::post('reservation', 'create')->name('reservation.create');
        Route::get('reservation/{id}', 'detail')->name('reservation.detail');
        Route::get('myreservation', 'seeReservation')->name('reservation.see');
    });

    Route::controller(OrderController::class)->group(function(){
        Route::get('order/{resId}', 'index')->name('order.menu');
        Route::get('order/{resId}/{menuId}', 'detail')->name('order.menu.detail');
        Route::get('cart/data', 'getCart')->name('cart.data');
        Route::post('order/addcart', 'addToCart')->name('addToCart');
        Route::put('cart/update/{id}', 'updateQuantity')->name('cart.update');
        Route::delete('cart/remove/{id}', 'removeFromCart')->name('cart.remove');
    });
    

});

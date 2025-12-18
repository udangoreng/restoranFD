<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\ReservationController;


Route::get('/auth/login', [AuthController::class, 'showLogin'])->name('auth.login');
Route::get('/auth/register', [AuthController::class, 'showRegister'])->name('auth.register');

Route::post('/auth/login', [AuthController::class, 'login'])->name('login');
Route::post('/auth/register', [AuthController::class, 'register'])->name('register');

Route::post('/auth/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/', function () {
    return view('home');
})->name('/');

Route::controller(MenuController::class)->group(function(){
    route::get('/menu', 'show')->name('menu');
    route::get('/menu/{id}', 'detail')->name('menu.detail');
});

Route::get('/checkout', function () {
    return view('checkout');
});

Route::get('/contact', function () {
    return view('contact');
});


Route::middleware(['verifyrole:admin'])->prefix('admin')->group(function () {
    Route::get('', function(){
        return view('admin.dashboard');
    })->name('');

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

    Route::resource('reservation', ReservationController::class);
});

// Route::middleware(['role:user'])->group(function () {
Route::get('/profil', function () {
    return view('profil');
})->name('profile');

Route::controller(ReservationController::class)->group(function(){
    Route::get('reservasi', 'index')->name('reservasi');
});

Route::get('/payment', function () {
    return view('payment');
})->name('payment');

Route::get('/order', function () {
    return view('order');
});

Route::get('/myreservation', function () {
    return view('myreservation');
});

Route::get('/myhistory', function () {
    return view('myhistory');
});
// });

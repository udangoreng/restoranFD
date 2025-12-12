<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MenuController;


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

Route::get('/testadmin', function () {
    return view('admin.layout.index');
});


Route::middleware(['verifyrole:admin'])->group(function () {
    Route::get('/admin', function(){
        return view('admin.dashboard');
    });

    Route::controller(MenuController::class)->group(function () {
        Route::get('admin/menu', 'index')->name('admin.menu');
        Route::post('admin/menu', 'store')->name('admin.menu.add');
        Route::get('admin/menu/{id}', 'edit')->name('admin.menu.detail');
        Route::put('admin/menu/{id}', 'update')->name('admin.menu.update');
        Route::delete('admin/menu/{id}', 'destroy')->name('admin.menu.destroy');
    });
});

// Route::middleware(['role:user'])->group(function () {
Route::get('/profil', function () {
    return view('profil');
})->name('profile');

Route::get('/reservasi', function () {
    return view('reservasi');
})->name('reservasi');

Route::get('/payment', function () {
    return view('payment');
});

Route::get('/order', function () {
    return view('order');
});
// });

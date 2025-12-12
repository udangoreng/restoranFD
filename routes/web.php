<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;


Route::get('/auth/login', [AuthController::class, 'showLogin'])->name('auth.login');
Route::get('/auth/register', [AuthController::class, 'showRegister'])->name('auth.register');

Route::post('/auth/login', [AuthController::class, 'login'])->name('login');
Route::post('/auth/register', [AuthController::class, 'register'])->name('register');

Route::post('/auth/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/', function () {
    return view('home');
})->name('/');

Route::any('/menu', function () {
    return view('menu');
})->name('menu');

Route::get('/checkout', function () {
    return view('checkout');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/testadmin', function () {
    return view('admin.layout.index');
});


Route::middleware(['role:admin'])->group(function () {
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

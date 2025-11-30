<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('home');
});

Route::get('/profil', function () {
    return view('profil');
});

Route::get('/reservasi', function () {
    return view('reservasi');
});

Route::get('/payment', function () {
    return view('payment');
});

Route::get('/auth/login', [AuthController::class, 'showLogin'])->name('auth.login');
Route::get('/auth/register', [AuthController::class, 'showRegister'])->name('auth.register');

Route::post('/auth/login', [AuthController::class, 'login'])->name('login');
Route::post('/auth/register', [AuthController::class, 'register'])->name('register');
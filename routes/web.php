<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CheckoutController;
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

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/aboutus', function () {
    return view('about');
})->name('aboutus');


Route::get('/order/{id}/payment/callback', [CheckoutController::class, 'handlePaymentCallback'])->name('order.payment.callback');
Route::get('/reservation/{id}/payment/callback', [ReservationController::class, 'handlePaymentCallback'])->name('reservation.payment.callback');
Route::post('/checkout/callback', [CheckoutController::class, 'callback']);
Route::middleware(['verifyrole:admin'])->prefix('admin')->group(function () {
    Route::get('/reservation/{id}/get-payment-token', [ReservationController::class, 'getPaymentToken'])->name("admin.reservation.payment-token");
    Route::get('/dashboard', [AuthController::class, 'adminDash'])->name('admin');
    
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
        Route::get('/reservation/{id}/edit', 'edit')->name('admin.reservation.detail');
        Route::put('/reservation/{id}/status', 'updateStatus')->name('admin.reservation.update-status');
        Route::put('/reservation/{id}/table', 'updateTable')->name('admin.reservation.update-table');
        Route::post('/admin/reservation/{id}/process-payment', 'processPayment')->name('admin.reservation.process-payment');
        Route::delete('/admin/reservation/{id}', 'destroyReservation')->name('admin.reservation.destroy');
    });


    Route::controller(UserController::class)->group(function () {
        Route::get('/user', 'index')->name('admin.user');
        Route::post('/user', 'store')->name('admin.user.add');
        Route::get('/user/{id}', 'edit')->name('admin.user.detail');
        Route::put('/user/{id}', 'update')->name('admin.user.update');
        Route::delete('/user/{id}', 'destroy')->name('admin.user.destroy');
    });
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
        Route::get('reservation/{id}', 'detailReservation')->name('reservation.detail');
        Route::get('history/{id}', 'detailHistory')->name('history.detail');
        Route::get('myreservation', 'seeReservation')->name('reservation.see');
        Route::get('myhistory', 'seeHistory')->name('history.see');
        Route::get('/invoice/{reservationId}/download', 'generateInvoice')->name('invoice.download');
    });

    Route::controller(OrderController::class)->group(function () {
        Route::get('order/{resId}', 'index')->name('order.menu');
        Route::get('order/{resId}/{menuId}', 'detail')->name('order.menu.detail');
        Route::get('cart/data', 'getCart')->name('cart.data');
        Route::post('order/addcart', 'addToCart')->name('addToCart');
        Route::put('cart/update/{id}', 'updateQuantity')->name('cart.update');
        Route::delete('cart/remove/{id}', 'destroy')->name('cart.remove');
        Route::post('/checkout/process')->name('checkout.process');
    });

    Route::controller(CheckoutController::class)->group(function () {
        Route::get('/checkout', 'show')->name('checkout');
        Route::post('/checkout/process', 'process')->name('checkout.process');
        Route::get('/checkout/success', 'success')->name('checkout.success');
        Route::get('/checkout/error', 'geterror')->name('checkout.error');
        Route::get('/checkout/pending', 'pending')->name('checkout.pending');
    });
});

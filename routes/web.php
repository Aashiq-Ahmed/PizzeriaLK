<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::resource('users', App\Http\Controllers\UserController::class)
    ->middleware([
        'auth',
        'admin',
    ]);

Route::resource('products', App\Http\Controllers\ProductController::class)
    ->middleware([
        'auth',
        'admin',
    ]);

Route::resource('toppings', App\Http\Controllers\ToppingController::class)
    ->middleware([
        'auth',
        'admin',
    ]);

Route::resource('deliveryMethods', App\Http\Controllers\DeliveryMethodController::class)
    ->middleware([
        'auth',
        'admin',
    ]);


Route::get('product/{id}', [App\Http\Controllers\ProductController::class, 'show'])->name('products.show');

Route::get('/orders/user_history', [App\Http\Controllers\OrderController::class, 'user_history'])
    ->middleware([
        'auth'
    ])
    ->name('orders.user_history');

Route::get('/cart/{cart}/checkout', [App\Http\Controllers\CartController::class, 'checkout'])
    ->middleware([
        'auth'
    ])
    ->name('cart.checkout');

Route::post('/cart/{cart}/{order}/update', [App\Http\Controllers\CartController::class, 'updateOrder'])
    ->middleware([
        'auth'
    ])
    ->name('cart.order.update');

Route::post('/cart/{cart}/{order}/thank-you', [App\Http\Controllers\CartController::class, 'completeCheckout'])
    ->middleware([
        'auth'
    ])
    ->name('cart.thank-you');


Route::resource('cart', App\Http\Controllers\CartController::class)
    ->middleware([
        'auth'
    ]);

Route::resource('orders', App\Http\Controllers\OrderController::class)
    ->middleware([
        'auth',
    ]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

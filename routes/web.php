<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Product;
use App\Http\Controllers\Cart;

Route::get('/',             [Product::class, 'index'])->name('home');
Route::post('/cart/add',    [Cart::class, 'addToCart'])->name('cart.add');
Route::post('/cart/remove', [Cart::class, 'removeFromCart'])->name('cart.remove');
Route::get('/cart',         [Cart::class, 'showCart'])->name('cart.show');


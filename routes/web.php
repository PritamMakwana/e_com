<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\HomeController;

@include "admin.php";

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/wishlist', [HomeController::class, 'wishlist'])->name('wishlist');
Route::get('/cart', [HomeController::class, 'cart'])->name('cart');

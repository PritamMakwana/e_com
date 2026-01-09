<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\HomeController;

@include "admin.php";

Route::get('/',[HomeController::class,'index'])->name('home');

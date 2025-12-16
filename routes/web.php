<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;

Route::get('/', [HomeController::class, 'index']);
Route::post('/order', [OrderController::class, 'store']);
Route::get('/order/{id}', [OrderController::class, 'show']);
Route::post('/tripay/callback', [PaymentController::class, 'callback']);

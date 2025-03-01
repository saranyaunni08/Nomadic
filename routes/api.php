<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TripController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\PaymentMethodController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/trips', [TripController::class, 'index']);
    Route::get('/trips/{id}', [TripController::class, 'show']);
    Route::post('/trips', [TripController::class, 'store']);
    Route::put('/trips/{id}', [TripController::class, 'update']);
    Route::delete('/trips/{id}', [TripController::class, 'destroy']);
    
    Route::get('/regions', [RegionController::class, 'index']);
    Route::get('/regions/{id}', [RegionController::class, 'show']);
    Route::post('/regions', [RegionController::class, 'store']);
    Route::put('/regions/{id}', [RegionController::class, 'update']);
    Route::delete('/regions/{id}', [RegionController::class, 'destroy']);
    
    Route::get('/wishlist', [WishlistController::class, 'index']);
    Route::post('/wishlist', [WishlistController::class, 'store']);
    Route::delete('/wishlist/{id}', [WishlistController::class, 'destroy']);
    
    Route::get('/bookings', [BookingController::class, 'index']);
    Route::post('/bookings', [BookingController::class, 'store']);
    Route::put('/bookings/{id}', [BookingController::class, 'update']);
    
    Route::get('/payment-methods', [PaymentMethodController::class, 'index']);
    Route::post('/payment-methods', [PaymentMethodController::class, 'store']);
    Route::delete('/payment-methods/{id}', [PaymentMethodController::class, 'destroy']);
});

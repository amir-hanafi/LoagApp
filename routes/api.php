<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/profile', [AuthController::class, 'profile']);
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::get('/profile', [UserController::class, 'getProfile']);
    Route::post('/profile/update', [UserController::class, 'updateProfile']);
    Route::post('/update-location', [UserController::class, 'updateLocation']);

    Route::post('/products', [ProductController::class, 'addProduct']);
    Route::delete('/products/{id}', [ProductController::class, 'destroy']);
    Route::get('/products', [ProductController::class, 'index']);
    Route::get('/products/{id}', [ProductController::class, 'show']);
});

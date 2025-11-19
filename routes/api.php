<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;

use App\Http\Controllers\ProvinceController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\LocationController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::delete('/user/{id}', [UserController::class, 'destroy']);

Route::middleware('auth:sanctum')->delete('/delete-account', [UserController::class, 'deleteAccount']);


Route::middleware('auth:sanctum')->group(function () {
    Route::get('/profile', [AuthController::class, 'profile']);
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::get('/profile', [UserController::class, 'getProfile']);
    Route::post('/profile/update', [UserController::class, 'updateProfile']);

    Route::post('/products', [ProductController::class, 'addProduct']);
    Route::delete('/products/{id}', [ProductController::class, 'destroy']);
    Route::get('/products', [ProductController::class, 'index']);
    Route::get('/products/{id}', [ProductController::class, 'show']);
    Route::post('/products/{id}', [ProductController::class, 'update']); // pakai POST biar mudah dul
    

});

Route::get('/provinces', [ProvinceController::class, 'index']);
Route::get('/cities/{provinceId}', [CityController::class, 'getByProvince']);
Route::get('/districts/{city_id}', [LocationController::class, 'districts']);
Route::get('/villages/{district_id}', [LocationController::class, 'villages']);



Route::post('/location/update', [LocationController::class, 'update']);
Route::get('/location/all', [LocationController::class, 'getAllLocations']);

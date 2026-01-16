<?php

use App\Http\Controllers\OrderController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::post('register',[AuthController::class,'register']);
Route::post('login',[AuthController::class,'login']);

Route::middleware(['jwt.auth'])->group(function(){

    Route::post('createOrder',[OrderController::class,'createOrder']);

    Route::post('logout',[AuthController::class,'logout']);
});

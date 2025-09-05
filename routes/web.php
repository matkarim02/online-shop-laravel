<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CartController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/signUp', [UserController::class, 'getSignUpForm']);
Route::post('/signUp', [UserController::class, 'signUp']);

Route::get('/login', [UserController::class, 'getLogin']);
Route::post('/login', [UserController::class, 'login']);

Route::post('/logout', [UserController::class, 'logout']);

Route::get('/profile', [UserController::class, 'getProfile']);
Route::get('/editProfile', [UserController::class, 'getEditProfile']);
Route::post('/editProfile', [UserController::class, 'editProfile']);

Route::get('/catalog', [ProductController::class, 'getCatalog']);

Route::get('/cart', [CartController::class, 'getCart']);
Route::post('/cart-increase', [CartController::class, 'increaseProduct']);
Route::post('/cart-decrease', [CartController::class, 'decreaseProduct']);



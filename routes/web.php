<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/signUp', [UserController::class, 'getSignUpForm']);
Route::post('/signUp', [UserController::class, 'signUp']);

Route::get('/login', [UserController::class, 'getLogin']);
Route::post('/login', [UserController::class, 'login']);

Route::post('/logout', [UserController::class, 'logout']);

Route::get('/catalog', [ProductController::class, 'getCatalog']);



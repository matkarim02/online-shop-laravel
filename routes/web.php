<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CartController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/signUp', [UserController::class, 'getSignUpForm'])->name('signUp');
Route::post('/signUp', [UserController::class, 'signUp'])->name('post.signUp');

Route::get('/login', [UserController::class, 'getLogin'])->name('login');
Route::post('/login', [UserController::class, 'login'])->name('post.login');

Route::post('/logout', [UserController::class, 'logout'])->name('logout');

Route::middleware('auth')->get('/profile', [UserController::class, 'getProfile'])->name('profile');
Route::middleware('auth')->get('/editProfile', [UserController::class, 'getEditProfile'])->name('editProfile');
Route::middleware('auth')->post('/editProfile', [UserController::class, 'editProfile'])->name('post.editProfile');

Route::middleware('auth')->get('/catalog', [ProductController::class, 'getCatalog'])->name('catalog');

Route::middleware('auth')->get('/cart', [CartController::class, 'getCart'])->name('cart');
Route::middleware('auth')->post('/cart-increase', [CartController::class, 'increaseProduct'])->name('cart-increase');
Route::middleware('auth')->post('/cart-decrease', [CartController::class, 'decreaseProduct'])->name('cart-decrease');

Route::middleware('auth')->get('/product/{id}', [ProductController::class, 'getProduct'])->name('product');
Route::middleware('auth')->post('/add-review', [ProductController::class, 'addReview'])->name('add-review');



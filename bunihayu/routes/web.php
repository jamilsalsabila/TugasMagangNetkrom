<?php

use App\Http\Controllers\Product;
use App\Http\Controllers\Userlogin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin;
use App\Http\Controllers\Landing;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\UserRegister;


Route::get('admin', [Admin::class, 'index']);

Route::get('/', [Product::class, 'show']);

/*
RUTE PRODUK
*/
Route::get('product', [ProductController::class, 'index']);
Route::get('product/create', [ProductController::class, 'create']);
Route::post('product', [ProductController::class, 'save']);
Route::get('product/show/{id}', [ProductController::class, 'show']);
Route::get('product/edit/{id}', [ProductController::class, 'edit']);
Route::patch('product', [ProductController::class, 'update']);
Route::delete('product', [ProductController::class, 'delete']);

/*
RUTE LOGIN, LOGOUT
*/
Route::get('login', [Userlogin::class, 'index']);
Route::post('login', [Userlogin::class, 'signin']);
Route::get('login/logout', [Userlogin::class, 'signout']);

/*
RUTE REGISTER
*/
Route::get('register', [UserRegister::class, 'get']);
Route::post('register', [UserRegister::class, 'post']);
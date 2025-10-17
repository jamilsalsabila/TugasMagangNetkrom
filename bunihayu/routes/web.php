<?php

use App\Http\Controllers\Product;
use App\Http\Controllers\Userlogin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin;
use App\Http\Controllers\Landing;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\UserRegister;
use App\Http\Controllers\Search;
use App\Http\Controllers\UserComments;


//Route::get('admin', [Admin::class, 'index']);

/*
RUTE LANDING PAGE
*/
Route::get('/', [Product::class, 'show'])->name('home');

/*
RUTE PRODUK
*/
Route::get('product', [ProductController::class, 'index'])->middleware('auth');
Route::get('product/create', [ProductController::class, 'create'])->middleware('onlyadmin');
Route::post('product', [ProductController::class, 'save'])->middleware('onlyadmin');
Route::get('product/show/{id}', [ProductController::class, 'show']);
Route::get('product/edit/{id}', [ProductController::class, 'edit'])->middleware('onlyadmin');
Route::patch('product', [ProductController::class, 'update'])->middleware('onlyadmin');
Route::delete('product', [ProductController::class, 'delete'])->middleware('onlyadmin');

/*
RUTE LOGIN, LOGOUT
*/
Route::get('login', [Userlogin::class, 'index'])->name('login')->middleware('guest');
Route::post('login', [Userlogin::class, 'signin'])->middleware('guest');
Route::get('logout', [Userlogin::class, 'signout'])->middleware('auth');

/*
RUTE REGISTER
*/
Route::get('register', [UserRegister::class, 'get'])->middleware('guest');
Route::post('register', [UserRegister::class, 'post'])->middleware('guest');


/*
RUTE SEARCH
*/
Route::get('search', [Search::class, 'index'])->middleware('auth');
Route::post('search', [Search::class, 'query'])->middleware('auth');

/*
RUTE COMMENTS
*/
Route::post('product/show/{id}', [UserComments::class, 'add']);
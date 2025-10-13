<?php

use App\Http\Controllers\Product;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin;
use App\Http\Controllers\Landing;
use App\Http\Controllers\Admin\ProductController;


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
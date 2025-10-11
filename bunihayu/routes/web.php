<?php

use App\Http\Controllers\Product;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin;
use App\Http\Controllers\Landing;


Route::get('admin', [Admin::class, 'index']);

Route::get('/', [Product::class, 'show']);
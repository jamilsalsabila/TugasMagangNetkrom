<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin;
use App\Http\Controllers\Landing;

Route::get('/', function () {
    return view('welcome');
});

Route::get('admin', [Admin::class, 'index']);

Route::get('landing', [Landing::class, 'index']);
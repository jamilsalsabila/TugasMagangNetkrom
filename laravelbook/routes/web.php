<?php

use App\Http\Controllers\ResourceController;
use App\Http\Controllers\SingleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Buku;

Route::get('/', function () {
    return view('welcome');
});

Route::get('buku', [Buku::class, 'index']);
Route::get('buku/create', [Buku::class, 'create']);
Route::get('buku/semua', [Buku::class, 'getData']);

// Single Controller
Route::get('hai', SingleController::class);

// Resource Controller
Route::resource('form/book', ResourceController::class);


//Route::post('buku', [Buku::class, 'store']);
//Route::put('buku', [Buku::class, 'update']);
//Route::delete('buku', [Buku::class, 'destroy']);

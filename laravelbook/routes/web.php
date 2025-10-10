<?php

use App\Http\Controllers\Penerbit;
use App\Http\Controllers\Userlogin;
use App\Models\Bukumodel;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Buku;

/*
HALAMAN UTAMA (INDEX)
*/
Route::get('/', function () {
    return view('dashboard');
});

/*
HALAMAN UTAMA (INDEX) BAGI YANG SUDAH LOGIN JIKA MENGAKSES RUTE /login
MAKA AKAN DIALIHKAN KE HALAMAN BERIKUT
*/
Route::get('home', function () {
    return view('dashboard');
});

/*
RUTE 'PENERBIT'
*/
Route::get('penerbit', [Penerbit::class, 'index'])->middleware('admin');
Route::get('penerbit/daftar', [Penerbit::class, 'tambah'])->middleware('admin');
Route::post('penerbit', [Penerbit::class, 'simpan'])->middleware('admin');
Route::get('penerbit/edit/{id}', [Penerbit::class, 'edit'])->middleware('admin');
Route::patch('penerbit', [Penerbit::class, 'simpanedit'])->middleware('admin');
Route::delete('penerbit', [Penerbit::class, 'hapus'])->middleware('admin');

/*
RUTE BUKU
*/
Route::get('buku', [Buku::class, 'index'])->middleware('auth');
Route::get('buku/tambah', [Buku::class, 'tambah'])->middleware('auth');
Route::post('buku', [Buku::class, 'simpan'])->middleware('auth');
Route::get('buku/edit/{id}', [Buku::class, 'edit'])->middleware('auth');
Route::patch('buku', [Buku::class, 'simpanedit'])->middleware('auth');
Route::delete('buku', [Buku::class, 'hapus'])->middleware('auth');

/*
RUTE LOGIN & LOGOUT
*/
Route::get('login', [Userlogin::class, 'index'])->name('login')->middleware('guest');
Route::post('login', [Userlogin::class, 'login'])->middleware('guest');
Route::get('login/logout', [Userlogin::class, 'logout'])->middleware('auth');


/*
RUTE CETAK DAFTAR BUKU
*/
ROute::get('buku/laporan', [Buku::class, 'cetakdaftarbuku']);



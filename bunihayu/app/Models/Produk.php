<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Produk extends Model
{
    use HasFactory;

    protected $table = "tbl_produk";
    protected $fillable = ["nama", "deskripsi", "harga", "kapasitas", "fasilitas", "foto"];

    public $timestamps = true;
    public $incrementing = false;
}

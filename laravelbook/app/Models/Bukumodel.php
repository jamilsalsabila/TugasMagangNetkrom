<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use App\Models\Penerbitmodel;

class Bukumodel extends Model
{
    use HasFactory;
    //use HasUuids;
    protected $table = "tbl_buku";
    protected $fillable = ["kodebuku", "judul", "pengarang", "harga"];

    public function penerbit()
    {
        return $this->belongsTo(Penerbitmodel::class, "idpenerbit", "id");
    }
}

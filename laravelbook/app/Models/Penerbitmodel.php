<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Penerbitmodel extends Model
{
    use HasFactory;
    //use HasUuids;

    protected $table = "tbl_penerbit";
    protected $fillable = ["namapenerbit"];

    public $incrementing = true;

    public function buku()
    {
        return $this->hasMany(Bukumodel::class, "idpenerbit", "id");
    }
}

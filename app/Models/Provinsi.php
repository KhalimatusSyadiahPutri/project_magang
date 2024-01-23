<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provinsi extends Model
{
    use HasFactory;

    // untuk terhubung dengan table maka diisi dengan nama table
    protected $table = "provinsi";

    // kolom yang diizinkan di isi / create secara masal
    protected $fillable = [
        "kode_provinsi",
        "nama_provinsi",
    ];

    public function kota()
    {
        return $this->hasMany(Kota::class, 'id_kota');
    }

    public function kabupaten()
    {
        return $this->hasMany(Kabupaten::class, 'id_kabupaten');
    }

    public function desa()
    {
        return $this->hasMany(Desa::class, 'id_desa');
    }
}
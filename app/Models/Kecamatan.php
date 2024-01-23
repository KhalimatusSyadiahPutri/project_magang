<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    use HasFactory;

    //untuk terhubung dengan table maka diisi dengan nama table
    protected $table = 'kecamatan';

    //kolom yang diizinkan di isi atau create secara keseluruhan
    protected $fillable = [
        "kode_kecamatan",
        "nama_kecamatan",
        "id_kota",
        "id_provinsi",
    ];

    public function provinsi()
    {
        return $this->belongsTo(Provinsi::class,'id_provinsi');
    }

    public function kota()
    {
        return $this->belongsTo(Kota::class,'id_kota');
    }

    public function desa()
    {
        return $this->hasMany(Desa::class,'id_desa');
    }
}
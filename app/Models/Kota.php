<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kota extends Model
{
    use HasFactory;

    // untuk terhubung dengan table maka diisi dengan nama table
    protected $table = "kota";

    // kolom yang diizinkan di isi / create secara masal
    protected $fillable = [
        "kode_kota",
        "nama_kota",
        "id_provinsi",
    ];

    public function provinsi()
    {
        return $this->belongsTo(Provinsi::class, 'id_provinsi');
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

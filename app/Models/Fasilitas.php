<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fasilitas extends Model
{
    protected $table = 'facilities';

    protected $fillable = [
        'jenis',
        'nama',
        'deskripsi',
        'kuantitas',
        'waktu_pemeliharaan',
        'kondisi',
        'id_petugas',
    ];

    public function petugas()
    {
        return $this->belongsTo(User::class, 'id_petugas');
    }
}

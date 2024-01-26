<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravolt\Indonesia\Models\Kecamatan;

class WilayahPenugasan extends Model
{
    protected $fillable = [
        'wilayah',
        'jumlah_penduduk',
        'jumlah_kepala_penduduk',
        'jumlah_pria',
        'jumlah_perempuan',
        'id_pimpinan',
        'id_anggpta',
        'user_id',
        'id_kecamatan',
    ];

    public function anggota()
    {
        return $this->belongsTo(User::class, 'id_anggota');
    }

    public function pimpinan()
    {
        return $this->belongsTo(User::class, 'id_pimpinan');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class, 'id_kecamatan');
    }
}
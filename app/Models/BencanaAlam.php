<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BencanaAlam extends Model
{
    protected $fillable = [
        'time',
        'jenis_bencana',
        'korban_jiwa',
        'korban_jiwa_pria',
        'korban_jiwa_perempuan',
        'anak_anak',
        'dewasa',
        'lansia',
        'id_wilayah_penugasan',
        'id_petugas',
        'user_id',
    ];

    public function wilayah_penugasan()
    {
        return $this->belongsTo(WilayahPenugasan::class, 'id_wilayah_penugasan');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function petugas()
    {
        return $this->belongsTo(User::class, 'id_petugas');
    }
}
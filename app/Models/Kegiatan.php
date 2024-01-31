<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    protected $fillable =[
        'time',
        'judul',
        'deskripsi',
        'status',
        'id_wilayah_penugasan',
        'id_petugas',
        'user_id',
    ];

    public function wilayah_penugasan()
    {
        return $this->belongsTo(WilayahPenugasan::class, 'id_wilayah_penugasan');
    }

    public function petugas()
    {
        return $this->belongsTo(User::class, 'id_petugas');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}

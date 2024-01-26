<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    protected $fillable = [
        'status',
        'keterangan',
        'id_anggota',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_anggota');
    }
}
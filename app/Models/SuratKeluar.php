<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratKeluar extends Model
{
    protected $fillable = [
        'nomor_referensi',
        'tujuan',
        'tanggal',
        'pengirim',
        'review_content',
        'isi_dasar',
        'status',
        'kepada',
        'nama_tanda_tangan',
        'salinan_surat',
        'user_id',
    ];

    public function tanda_tangan()
    {
        return $this->belongsTo(User::class, 'nama_tanda_tangan');
    }

    public function user()
    {
        return $this->belongsToMany(User::class, 'user_id');
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Desa extends Model
{
    use HasFactory;

    protected $table = "desa";

    // kolom yang diizinkan di isi / create secara masal
    protected $fillable = [
        "nama_desa"
    ];
}
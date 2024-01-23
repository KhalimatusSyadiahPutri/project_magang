<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    use HasFactory;

    // untuk terhubung dengan table maka diisi dengan nama table
    protected $table = "jabatan";

    // kolom yang diizinkan di isi / create secara masal
    protected $fillable = [
        "nama_jabatan"
    ];

    public function users()
    {
        return $this->hasMany(User::class, 'id_jabatan');
    }
}
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('wilayah_penugasan', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('wilayah')->comment('luas wilayah kerja');
            $table->bigInteger('jumlah_penduduk');
            $table->bigInteger('jumlah_kepala_keluarga');
            $table->bigInteger('jumlah_pria');
            $table->bigInteger('jumlah_perempuan');
            $table->foreignId('id_pimpinan')->nullable()->comment('pimpinan yang memberikan kewajiban');
            $table->foreignId('id_anggota')->nullable()->comment('anggota yang dikasih kewajiban');
            $table->foreignId('user_id')->nullable()->comment('user yang membuat data');
            $table->foreignId('id_kecamatan')->nullable()->comment('FK Kelurahan atau Desa');
            $table->timestamps();

            $table->foreign('id_pimpinan')->references('id')->on('users')->nullOnDelete();
            $table->foreign('id_anggota')->references('id')->on('users')->nullOnDelete();
            $table->foreign('user_id')->references('id')->on('users')->nullOnDelete();
            // $table->foreign('id_kecamatan')->references('id')->on('kecamatan')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wilayah_penugasan');
    }
};

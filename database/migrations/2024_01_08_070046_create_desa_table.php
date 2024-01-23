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
        Schema::create('desa', function (Blueprint $table) {
            $table->id();
            $table->string('kode_desa')->unique();
            $table->string('nama_desa');
            $table->foreignId('id_provinsi')->nullable();
            $table->foreignId('id_kota')->nullable();
            $table->foreignId('id_kecamatan')->nullable();
            $table->timestamps();

            $table->foreign('id_provinsi')->references('id')->on('provinsi')->nullOnDelete();
            $table->foreign('id_kota')->references('id')->on('kota')->nullOnDelete();
            $table->foreign('id_kecamatan')->references('id')->on('kecamatan')->nullOnDelete();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('desa');
    }
};
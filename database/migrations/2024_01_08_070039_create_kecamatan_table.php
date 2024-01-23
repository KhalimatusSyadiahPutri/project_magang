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
        Schema::create('kecamatan', function (Blueprint $table) {
            $table->id();
            $table->string('kode_kecamatan')->unique();
            $table->string('nama_kecamatan');
            $table->foreignId('id_provinsi')->nullable();
            $table->foreignId('id_kota')->nullable();
            $table->timestamps();

            $table->foreign('id_provinsi')->references('id')->on('provinsi')->nullOnDelete();
            $table->foreign('id_kota')->references('id')->on('kota')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kecamatan');
    }
};
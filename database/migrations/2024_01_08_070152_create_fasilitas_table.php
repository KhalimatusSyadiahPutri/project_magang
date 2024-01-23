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
        Schema::create('fasilitas', function (Blueprint $table) {
            $table->id();
            $table->string('jenis');
            $table->string('nama');
            $table->text('deskripsi')->nullable();
            $table->integer('kuantitas')->default(1);
            $table->date('waktu_pemeliharaan')->nullable();
            $table->string('kondisi')->nullable();
            $table->foreignId('id_petugas')->nullable()->comment('Petugas Yang Menggunakan Fasilitas');
            $table->timestamps();

            $table->foreign('id_petugas')->references('id')->on('users')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fasilitas');
    }
};
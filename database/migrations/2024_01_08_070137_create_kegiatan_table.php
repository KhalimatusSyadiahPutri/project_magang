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
        Schema::create('kegiatan', function (Blueprint $table) {
            $table->id();
            $table->dateTime('time');
            $table->string('judul');
            $table->text('deskripsi')->nullable();
            $table->string('status')->nullable();
            $table->foreignId('id_wilayah_penugasan')->nullable();
            $table->foreignId('id_petugas')->nullable()->comment('Anggota Yang Bertugas');
            $table->foreignId('user_id')->nullable()->comment('User yang Membuat Data');
            $table->timestamps();

            $table->foreign('id_wilayah_penugasan')->references('id')->on('wilayah_penugasan')->nullOnDelete();
            $table->foreign('id_petugas')->references('id')->on('users')->nullOnDelete();
            $table->foreign('user_id')->references('id')->on('users')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kegiatan');
    }
};
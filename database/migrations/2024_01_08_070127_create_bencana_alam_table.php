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
        Schema::create('bencana_alam', function (Blueprint $table) {
            $table->id();
            $table->dateTime('time');
            $table->string('jenis_bencana');
            $table->integer('korban_jiwa')->nullable();
            $table->integer('korban_jiwa_pria')->nullable();
            $table->integer('korban_jiwa_perempuan')->nullable();
            $table->integer('anak_anak')->nullable();
            $table->integer('dewasa')->nullable();
            $table->integer('lansia')->nullable();
            $table->foreignId('id_wilayah_penugasan')->nullable();
            $table->foreignId('id_petugas')->nullable()->comment('Anggota Yang Bertugas');
            $table->foreignId('user_id')->nullable()->comment('User yang Membuat Data');
            $table->timestamps();

            $table->foreign('id_wilayah_penugasan')->references('id')->on('wilayah_penugasan')->nullOnDelete();
            $table->foreign('id_petugas')->references('id')->on('users')->nullOnderDelete();
            $table->foreign('user_id')->references('id')->on('users')->nullOnderDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bencana_alam');
    }
};
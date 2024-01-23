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
        Schema::create('surat_keluar', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_referensi');
            $table->text('tujuan');
            $table->date('tanggal');
            $table->string('pengirim');
            $table->longText('review_content');
            $table->longText('isi_dasar');
            $table->string('status');
            $table->string('kepada');
            $table->string('nama_tanda_tangan');
            $table->text('salinan_surat');
            $table->foreignId('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat_keluar');
    }
};
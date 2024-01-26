<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDesaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(config('laravolt.indonesia.table_prefix').'desa', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('kode_desa', 10)->unique();
            $table->char('kode_kecamatan', 7);
            $table->string('nama_desa', 255);
            $table->text('meta')->nullable();
            $table->timestamps();

            $table->foreign('kode_kecamatan')
                ->references('kode_kecamatan')
                ->on(config('laravolt.indonesia.table_prefix').'kecamatan')
                ->onUpdate('cascade')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(config('laravolt.indonesia.table_prefix').'desa');
    }
}
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKecamatanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(config('laravolt.indonesia.table_prefix').'kecamatan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('kode_kecamatan', 7)->unique();
            $table->char('kode_kota', 4);
            $table->string('nama_kecamatan', 255);
            $table->text('meta')->nullable();
            $table->timestamps();

            $table->foreign('kode_kota')
                ->references('kode_kota')
                ->on(config('laravolt.indonesia.table_prefix').'kota')
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
        Schema::drop(config('laravolt.indonesia.table_prefix').'kecamatan');
    }
};
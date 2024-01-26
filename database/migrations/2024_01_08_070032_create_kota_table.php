<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKotaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(config('laravolt.indonesia.table_prefix').'kota', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('kode_kota', 4)->unique();
            $table->char('kode_provinsi', 2);
            $table->string('nama_kota', 255);
            $table->text('meta')->nullable();
            $table->timestamps();

            $table->foreign('kode_provinsi')
                ->references('kode_provinsi')
                ->on(config('laravolt.indonesia.table_prefix').'provinsi')
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
        Schema::drop(config('laravolt.indonesia.table_prefix').'kota');
    }
};

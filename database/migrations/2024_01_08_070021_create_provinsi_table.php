<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProvinsiTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create(config('laravolt.indonesia.table_prefix').'provinsi', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('kode_provinsi', 2)->unique();
            $table->string('nama_provinsi', 255);
            $table->text('meta')->nullable();
            $table->timestamps();
        });
    }

  /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop(config('laravolt.indonesia.table_prefix').'provinsi');
    }
};
<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRuangansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ruangan', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('gedung_id')->unsigned();
            $table->string('nama');
            $table->double('luas')->nullable();
            $table->integer('lantai');
            $table->integer('bisa_dipinjam')->default(0);
            $table->integer('ruangan_kondisi_id')->unsigned();
            $table->integer('ruangan_fungsi_id')->unsigned();
            $table->integer('unit_pengelola_id')->unsigned();
            $table->timestamps();

            $table->foreign('gedung_id')->references('id')->on('gedung');
            $table->foreign('ruangan_kondisi_id')->references('id')->on('ruangan_kondisi');
            $table->foreign('ruangan_fungsi_id')->references('id')->on('ruangan_fungsi');
            $table->foreign('unit_pengelola_id')->references('id')->on('unit');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ruangan');
    }
}

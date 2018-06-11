<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRuanganFasilitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ruangan_fasilitas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ruangan_id')->unsigned();
            $table->integer('fasilitas_id')->unsigned();
            $table->integer('jumlah');
            $table->timestamps();

            $table->foreign('ruangan_id')->references('id')->on('ruangan');
            $table->foreign('fasilitas_id')->references('id')->on('fasilitas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ruangan_fasilitas');
    }
}

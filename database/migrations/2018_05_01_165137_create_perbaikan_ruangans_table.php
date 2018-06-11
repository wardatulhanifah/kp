<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePerbaikanRuangansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perbaikan_ruangan', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ruangan_id')->unsigned();
            $table->date('tanggal_pengajuan');
            $table->integer('pengaju_id')->unsigned();
            $table->text('alasan');
            $table->integer('perbaikan_status_id')->unsigned();
            $table->date('tanggal_perbaikan')->nullable();
            $table->date('tanggal_selesai_perbaikan')->nullable();
            $table->timestamps();

            $table->foreign('pengaju_id')->references('id')->on('users');
            $table->foreign('ruangan_id')->references('id')->on('ruangan');
            $table->foreign('perbaikan_status_id')->references('id')->on('perbaikan_status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('perbaikan_ruangan');
    }
}

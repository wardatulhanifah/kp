<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeminjamanRuangansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peminjaman_ruangan', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ruangan_id')->unsigned();
            $table->integer('peminjam_id')->unsigned();
            $table->integer('pengaju')->unsigned();
            $table->date('tanggal_pengajuan');
            $table->date('tanggal_peminjaman');
            $table->time('jam_mulai')->nullable();
            $table->date('tanggal_selesai')->nullable();
            $table->time('jam_selesai')->nullable();
            $table->integer('peminjaman_status_id')->unsigned();
            $table->text('tujuan');

            $table->timestamps();

            $table->foreign('ruangan_id')->references('id')->on('ruangan');
            $table->foreign('peminjam_id')->references('id')->on('users');
            $table->foreign('peminjaman_status_id')->references('id')->on('peminjaman_status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('peminjaman_ruangan');
    }
}

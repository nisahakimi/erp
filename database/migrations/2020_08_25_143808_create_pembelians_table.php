<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembeliansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembelians', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_karyawan');
            $table->foreign('id_karyawan')->references('id')->on('karyawans')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedInteger('id_bahan');
            $table->foreign('id_bahan')->references('id')->on('bahans')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('jumlah');
            $table->double('harga');
            $table->date('tanggal');
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
        Schema::dropIfExists('pembelians');
    }
}

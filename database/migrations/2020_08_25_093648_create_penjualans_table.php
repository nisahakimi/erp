<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenjualansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penjualans', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_pelanggan');
            $table->foreign('id_pelanggan')->references('id')->on('pelanggans')->onUpdate('cascade')->onDelete('cascade');
            $table->date('tanggal_penjualan');
            $table->unsignedInteger('id_produk');
            $table->foreign('id_produk')->references('id')->on('produks')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('jumlah');
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
        Schema::dropIfExists('penjualans');
    }
}

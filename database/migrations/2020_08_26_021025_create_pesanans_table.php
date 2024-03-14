<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesanans', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_pelanggan');
            $table->foreign('id_pelanggan')->references('id')->on('pelanggans')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedInteger('id_kategoriproduk');
            $table->foreign('id_kategoriproduk')->references('id')->on('kategori_produks')->onUpdate('cascade')->onDelete('cascade');
            $table->date('tanggal');
            $table->text('deskripsi')->nullable();
            $table->text('jumlah');
            $table->double('harga');
            $table->text('status_pembayaran');
            $table->string('status_pesanan',20);
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
        Schema::dropIfExists('pesanans');
    }
}

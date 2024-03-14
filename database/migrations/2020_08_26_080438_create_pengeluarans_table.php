<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengeluaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengeluarans', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_karyawan');
            $table->foreign('id_karyawan')->references('id')->on('karyawans')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedInteger('id_jenispengeluaran');
            $table->foreign('id_jenispengeluaran')->references('id')->on('jenis_pengeluarans')->onUpdate('cascade')->onDelete('cascade');
            $table->date('tanggal');
            $table->text('keterangan');
            $table->double('total');
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
        Schema::dropIfExists('pengeluarans');
    }
}

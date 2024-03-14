<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSatuanToBahans extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bahans', function (Blueprint $table) {
            //
            $table->string('satuan',10);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bahans', function (Blueprint $table) {
            //
            $table->dropColumn(['satuan']);
        });
    }
}

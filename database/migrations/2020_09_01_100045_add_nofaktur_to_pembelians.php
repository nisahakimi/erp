<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNofakturToPembelians extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pembelians', function (Blueprint $table) {
            //
            $table->string('nofaktur',10)->unique();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pembelians', function (Blueprint $table) {
            //
            $table->dropColumn(['nofaktur']);
        });
    }
}

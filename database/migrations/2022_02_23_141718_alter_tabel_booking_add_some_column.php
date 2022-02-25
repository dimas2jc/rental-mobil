<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTabelBookingAddSomeColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('booking', function (Blueprint $table) {
            $table->dateTime('date_start')->change();
            $table->dateTime('date_finish')->change();
            $table->integer('real_price')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('booking', function (Blueprint $table) {
            $table->date('date_start')->change();
            $table->date('date_finish')->change();
            $table->dropColumn('real_price');
        });
    }
}

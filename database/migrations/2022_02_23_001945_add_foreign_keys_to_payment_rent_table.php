<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToPaymentRentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('payment_rent', function (Blueprint $table) {
            $table->foreign(['id_charge_vehicles'], 'fk_relationship_11')->references(['id_charge_vehicles'])->on('charge_rent');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('payment_rent', function (Blueprint $table) {
            $table->dropForeign('fk_relationship_11');
        });
    }
}

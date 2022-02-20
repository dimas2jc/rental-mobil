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
            $table->foreign(['ID_CHARGE_VEHICLES'], 'FK_RELATIONSHIP_11')->references(['ID_CHARGE_VEHICLES'])->on('charge_rent');
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
            $table->dropForeign('FK_RELATIONSHIP_11');
        });
    }
}

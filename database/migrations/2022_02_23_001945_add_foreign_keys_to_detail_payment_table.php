<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToDetailPaymentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('detail_payment', function (Blueprint $table) {
            $table->foreign(['id_booking'], 'fk_relationship_9')->references(['id_booking'])->on('booking');
            $table->foreign(['id_payment_rent'], 'fk_relationship_10')->references(['id_payment_rent'])->on('payment_rent');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('detail_payment', function (Blueprint $table) {
            $table->dropForeign('fk_relationship_9');
            $table->dropForeign('fk_relationship_10');
        });
    }
}

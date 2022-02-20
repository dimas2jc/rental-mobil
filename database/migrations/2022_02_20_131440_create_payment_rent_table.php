<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentRentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_rent', function (Blueprint $table) {
            $table->char('ID_PAYMENT_RENT')->primary();
            $table->char('ID_CHARGE_VEHICLES')->nullable()->index('FK_RELATIONSHIP_11');
            $table->integer('TOTAL_PAYMENT');
            $table->date('DATE_PAYMENT');
            $table->boolean('STATUS_PAYMENT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payment_rent');
    }
}

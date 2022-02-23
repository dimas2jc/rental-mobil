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
            $table->char('id_payment_rent')->primary();
            $table->char('id_charge_vehicles')->nullable()->index('relationship_11_fk');
            $table->integer('total_payment');
            $table->date('date_payment');
            $table->boolean('status_payment');
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

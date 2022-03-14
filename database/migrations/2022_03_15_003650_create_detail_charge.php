<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailCharge extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_charge', function (Blueprint $table) {
            $table->string('id_payment_rent');
            $table->string('id_charge_vehicles');
            $table->foreign(['id_payment_rent'], 'fk_payment_rent')->references(['id_payment_rent'])->on('payment_rent');
            $table->foreign(['id_charge_vehicles'], 'fk_charge')->references(['id_charge_vehicles'])->on('charge_rent');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_charge');
    }
}

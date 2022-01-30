<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChargeRentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('charge_rent', function (Blueprint $table) {
            $table->char('ID_CHARGE_VEHICLES')->primary();
            $table->char('NAME_CHARGE_VEHICLES');
            $table->decimal('PRICE_CHARGE_VEHICLES', 8, 0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('charge_rent');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePriceVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('price_vehicles', function (Blueprint $table) {
            $table->char('ID_VEHICLES')->primary();
            $table->decimal('PRICE_VEHICLES', 8, 0);
            $table->date('TIME_RENT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('price_vehicles');
    }
}

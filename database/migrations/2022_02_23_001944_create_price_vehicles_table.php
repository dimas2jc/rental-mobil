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
            $table->char('id_price_vehicles')->primary();
            $table->char('id_vehicles')->nullable()->index('relationship_7_fk');
            $table->decimal('price_vehicles', 8, 0);
            $table->integer('time_rent');
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

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehicleBodiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicle_bodies', function (Blueprint $table) {
            $table->char('ID_VEHICLE_BODIES')->primary();
            $table->char('NAME_VEHICLES_BODIES');
            $table->float('IS_ACTIVE', 10, 0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehicle_bodies');
    }
}

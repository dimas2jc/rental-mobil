<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->char('ID_VEHICLES')->primary();
            $table->char('ID_VENDORS')->nullable()->index('FK_RELATIONSHIP_12');
            $table->char('ID_DOC_VEHICLES')->nullable()->index('FK_RELATIONSHIP_5');
            $table->char('ID_VEHICLE_BODIES')->nullable()->index('FK_RELATIONSHIP_6');
            $table->char('ID_BODY_VEHICLES')->nullable()->index('FK_RELATIONSHIP_4');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehicles');
    }
}

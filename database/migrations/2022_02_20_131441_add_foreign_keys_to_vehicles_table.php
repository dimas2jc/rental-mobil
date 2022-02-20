<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vehicles', function (Blueprint $table) {
            $table->foreign(['ID_VARIAN_VEHICLES'], 'FK_RELATIONSHIP_4')->references(['ID_VARIAN_VEHICLES'])->on('vehicles_varians');
            $table->foreign(['ID_VEHICLE_BODIES'], 'FK_RELATIONSHIP_6')->references(['ID_VEHICLE_BODIES'])->on('vehicle_bodies');
            $table->foreign(['ID_VENDORS'], 'FK_RELATIONSHIP_12')->references(['ID_VENDORS'])->on('vendor');
            $table->foreign(['ID_DOC_VEHICLES'], 'FK_RELATIONSHIP_5')->references(['ID_DOC_VEHICLES'])->on('document_vehicles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vehicles', function (Blueprint $table) {
            $table->dropForeign('FK_RELATIONSHIP_4');
            $table->dropForeign('FK_RELATIONSHIP_6');
            $table->dropForeign('FK_RELATIONSHIP_12');
            $table->dropForeign('FK_RELATIONSHIP_5');
        });
    }
}

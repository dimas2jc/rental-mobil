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
            $table->foreign(['id_varian_vehicles'], 'fk_relationship_4')->references(['id_varian_vehicles'])->on('vehicles_varians');
            $table->foreign(['id_vehicle_bodies'], 'fk_relationship_6')->references(['id_vehicle_bodies'])->on('vehicle_bodies');
            $table->foreign(['id_vendors'], 'fk_relationship_12')->references(['id_vendors'])->on('vendor');
            $table->foreign(['id_doc_vehicles'], 'fk_relationship_5')->references(['id_doc_vehicles'])->on('document_vehicles');
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
            $table->dropForeign('fk_relationship_4');
            $table->dropForeign('fk_relationship_6');
            $table->dropForeign('fk_relationship_12');
            $table->dropForeign('fk_relationship_5');
        });
    }
}

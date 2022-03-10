<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableVehiclesDropIdVehicleBodiesColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vehicles', function (Blueprint $table) {
            $table->dropForeign('fk_relationship_6');
            $table->dropColumn('id_vehicle_bodies');
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
            $table->char('id_vehicle_bodies')->nullable()->index('relationship_6_fk');
            $table->foreign(['id_vehicle_bodies'], 'fk_relationship_6')->references(['id_vehicle_bodies'])->on('vehicle_bodies');

        });
    }
}

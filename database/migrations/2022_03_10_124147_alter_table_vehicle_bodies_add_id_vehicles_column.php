<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableVehicleBodiesAddIdVehiclesColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vehicle_bodies', function (Blueprint $table) {
            $table->char('id_vehicles', 255)->nullable()->index('relationship_6_fk');
            $table->foreign(['id_vehicles'], 'fk_relationship_6')->references(['id_vehicles'])->on('vehicles');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vehicle_bodies', function (Blueprint $table) {
            $table->dropForeign('id_vehicles');
            $table->dropColumn('id_vehicles');
            // $table->dropIndex('fk_relationship_6');

        });
    }
}

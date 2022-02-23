<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToPriceVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('price_vehicles', function (Blueprint $table) {
            $table->foreign(['id_vehicles'], 'fk_relationship_7')->references(['id_vehicles'])->on('vehicles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('price_vehicles', function (Blueprint $table) {
            $table->dropForeign('fk_relationship_7');
        });
    }
}

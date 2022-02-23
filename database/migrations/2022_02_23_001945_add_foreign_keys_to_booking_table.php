<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToBookingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('booking', function (Blueprint $table) {
            $table->foreign(['id_employes'], 'fk_relationship_13')->references(['id_employes'])->on('employes_company');
            $table->foreign(['id_vehicles'], 'fk_relationship_3')->references(['id_vehicles'])->on('vehicles');
            $table->foreign(['id_sales'], 'fk_relationship_1')->references(['id_sales'])->on('sales');
            $table->foreign(['id_custormer'], 'fk_relationship_2')->references(['id_custormer'])->on('customer');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('booking', function (Blueprint $table) {
            $table->dropForeign('fk_relationship_13');
            $table->dropForeign('fk_relationship_3');
            $table->dropForeign('fk_relationship_1');
            $table->dropForeign('fk_relationship_2');
        });
    }
}

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
            $table->foreign(['ID_EMPLOYES'], 'FK_RELATIONSHIP_13')->references(['ID_EMPLOYES'])->on('employes_company');
            $table->foreign(['ID_VEHICLES'], 'FK_RELATIONSHIP_3')->references(['ID_VEHICLES'])->on('vehicles');
            $table->foreign(['ID_SALES'], 'FK_RELATIONSHIP_1')->references(['ID_SALES'])->on('sales');
            $table->foreign(['ID_CUSTORMER'], 'FK_RELATIONSHIP_2')->references(['ID_CUSTORMER'])->on('customer');
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
            $table->dropForeign('FK_RELATIONSHIP_13');
            $table->dropForeign('FK_RELATIONSHIP_3');
            $table->dropForeign('FK_RELATIONSHIP_1');
            $table->dropForeign('FK_RELATIONSHIP_2');
        });
    }
}

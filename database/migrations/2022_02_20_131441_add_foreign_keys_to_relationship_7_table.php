<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToRelationship7Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('relationship_7', function (Blueprint $table) {
            $table->foreign(['ID_VEHICLES'], 'FK_RELATIONSHIP_8')->references(['ID_VEHICLES'])->on('vehicles');
            $table->foreign(['ID_PRICE_VEHICLES'], 'FK_RELATIONSHIP_7')->references(['ID_PRICE_VEHICLES'])->on('price_vehicles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('relationship_7', function (Blueprint $table) {
            $table->dropForeign('FK_RELATIONSHIP_8');
            $table->dropForeign('FK_RELATIONSHIP_7');
        });
    }
}

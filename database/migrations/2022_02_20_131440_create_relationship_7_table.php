<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRelationship7Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('relationship_7', function (Blueprint $table) {
            $table->char('ID_PRICE_VEHICLES');
            $table->char('ID_VEHICLES')->index('FK_RELATIONSHIP_8');

            $table->primary(['ID_PRICE_VEHICLES', 'ID_VEHICLES']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('relationship_7');
    }
}

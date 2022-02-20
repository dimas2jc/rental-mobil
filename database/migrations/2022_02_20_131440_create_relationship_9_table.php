<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRelationship9Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('relationship_9', function (Blueprint $table) {
            $table->char('ID_BOOKING');
            $table->char('ID_PAYMENT_RENT')->index('FK_RELATIONSHIP_10');

            $table->primary(['ID_BOOKING', 'ID_PAYMENT_RENT']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('relationship_9');
    }
}

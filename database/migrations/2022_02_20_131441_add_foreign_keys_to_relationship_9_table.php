<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToRelationship9Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('relationship_9', function (Blueprint $table) {
            $table->foreign(['ID_BOOKING'], 'FK_RELATIONSHIP_9')->references(['ID_BOOKING'])->on('booking');
            $table->foreign(['ID_PAYMENT_RENT'], 'FK_RELATIONSHIP_10')->references(['ID_PAYMENT_RENT'])->on('payment_rent');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('relationship_9', function (Blueprint $table) {
            $table->dropForeign('FK_RELATIONSHIP_9');
            $table->dropForeign('FK_RELATIONSHIP_10');
        });
    }
}

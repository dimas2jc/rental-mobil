<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking', function (Blueprint $table) {
            $table->char('ID_BOOKING')->primary();
            $table->char('ID_CLIENT')->nullable()->index('FK_RELATIONSHIP_2');
            $table->char('ID_VEHICLES')->nullable()->index('FK_RELATIONSHIP_3');
            $table->char('ID_EMPLOYES')->nullable()->index('FK_RELATIONSHIP_13');
            $table->char('ID_SALES')->nullable()->index('FK_RELATIONSHIP_1');
            $table->date('DATE_START');
            $table->date('DATE_FINISH');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('booking');
    }
}

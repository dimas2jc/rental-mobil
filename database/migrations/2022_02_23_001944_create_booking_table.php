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
            $table->char('id_booking')->primary();
            $table->char('id_custormer')->nullable()->index('relationship_2_fk');
            $table->char('id_vehicles')->nullable()->index('relationship_3_fk');
            $table->char('id_employes')->nullable()->index('relationship_13_fk');
            $table->char('id_sales')->nullable()->index('relationship_1_fk');
            $table->date('date_start');
            $table->date('date_finish');
            $table->integer('price_sales');
            $table->integer('dp_sales')->nullable();
            $table->boolean('status_booking');
            $table->integer('komisi_sales')->nullable();
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

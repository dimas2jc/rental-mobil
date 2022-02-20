<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeeSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fee_sales', function (Blueprint $table) {
            $table->char('ID_BOOKING')->nullable();
            $table->integer('FEE_SALES');
            $table->char('NAME_SALES_FEE');
            $table->date('DATETIME_BOOKING');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fee_sales');
    }
}

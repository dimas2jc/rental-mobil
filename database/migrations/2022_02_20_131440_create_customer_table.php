<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer', function (Blueprint $table) {
            $table->char('ID_CUSTORMER')->primary();
            $table->char('NO_KK_CUSTOMER');
            $table->char('NAME_CUSTOMER');
            $table->text('ADDRESS_CUSTOMER');
            $table->string('PHONE_CUSTOMER', 13);
            $table->char('EMAIL_CUSTOMER');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer');
    }
}

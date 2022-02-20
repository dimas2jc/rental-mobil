<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company', function (Blueprint $table) {
            $table->char('ID_COMPANY')->primary();
            $table->char('NAME_COMPANY');
            $table->text('ADDRESS_COMPANY');
            $table->string('PHONE_COMPANY', 13);
            $table->char('EMAIL_COMPANY');
            $table->string('LOGO');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('company');
    }
}

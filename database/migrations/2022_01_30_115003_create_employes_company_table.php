<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployesCompanyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employes_company', function (Blueprint $table) {
            $table->char('ID_EMPLOYES')->primary();
            $table->char('NAME_EMPLOYES');
            $table->text('ADDRESS_EMPLOYES');
            $table->decimal('PHONE_EMPLOYES', 8, 0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employes_company');
    }
}

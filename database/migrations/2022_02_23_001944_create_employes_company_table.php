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
            $table->char('id_employes')->primary();
            $table->char('name_employes');
            $table->text('address_employes');
            $table->decimal('phone_employes', 8, 0);
            $table->boolean('status_employes');
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

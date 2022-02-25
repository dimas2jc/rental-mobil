<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableEmployesUpdateDataTypePhone extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('employes_company', function (Blueprint $table) {
            $table->string('phone_employes', 13)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('employes_company', function (Blueprint $table) {
            $table->decimal('phone_employes')->change();
        });
    }
}

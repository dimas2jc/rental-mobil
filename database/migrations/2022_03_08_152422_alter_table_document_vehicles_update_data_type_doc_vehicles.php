<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableDocumentVehiclesUpdateDataTypeDocVehicles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('document_vehicles', function (Blueprint $table) {
            $table->string('type_doc_vehicles', 255)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('document_vehicles', function (Blueprint $table) {
            $table->integer('type_doc_vehicles')->nullable()->change();
        });
    }
}

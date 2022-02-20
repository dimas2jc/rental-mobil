<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('document_vehicles', function (Blueprint $table) {
            $table->char('ID_DOC_VEHICLES')->primary();
            $table->integer('TYPE_DOC_VEHICLES');
            $table->char('NAME_DOC_VEHICLES');
            $table->char('UPLOAD_DOC_VEHICLES');
            $table->date('EXPIRED_DOC_VEHICLES');
            $table->text('DESCRIPTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('document_vehicles');
    }
}

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
            $table->char('id_doc_vehicles')->primary();
            $table->integer('type_doc_vehicles')->nullable();
            $table->char('name_doc_vehicles')->nullable();
            $table->char('upload_doc_vehicles')->nullable();
            $table->date('expired_doc_vehicles')->nullable();
            $table->text('description')->nullable();
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

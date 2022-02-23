<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->char('id_vehicles')->primary();
            $table->char('id_varian_vehicles')->nullable()->index('relationship_4_fk');
            $table->char('id_vendors')->nullable()->index('relationship_12_fk');
            $table->char('id_vehicle_bodies')->nullable()->index('relationship_6_fk');
            $table->char('id_doc_vehicles')->nullable()->index('relationship_5_fk');
            $table->char('nopol')->nullable();
            $table->char('no_rangka')->nullable();
            $table->char('nomesin')->nullable();
            $table->char('warna')->nullable();
            $table->char('tahun_pembuatan')->nullable();
            $table->char('no_stnk')->nullable();
            $table->char('nama_stnk')->nullable();
            $table->char('masa_sntk')->nullable();
            $table->char('alamat_sntk')->nullable();
            $table->char('no_bpkb')->nullable();
            $table->char('tgl_kir')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehicles');
    }
}

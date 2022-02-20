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
            $table->char('ID_VEHICLES')->primary();
            $table->char('ID_VARIAN_VEHICLES')->nullable()->index('FK_RELATIONSHIP_4');
            $table->char('ID_VENDORS')->nullable()->index('FK_RELATIONSHIP_12');
            $table->char('ID_VEHICLE_BODIES')->nullable()->index('FK_RELATIONSHIP_6');
            $table->char('ID_DOC_VEHICLES')->nullable()->index('FK_RELATIONSHIP_5');
            $table->char('NOPOL');
            $table->char('NO_RANGKA');
            $table->char('NOMESIN');
            $table->char('WARNA');
            $table->char('TAHUN_PEMBUATAN');
            $table->char('NO_STNK');
            $table->char('NAMA_STNK');
            $table->char('MASA_SNTK');
            $table->char('ALAMAT_SNTK');
            $table->char('NO_BPKB');
            $table->char('TGL_KIR');
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

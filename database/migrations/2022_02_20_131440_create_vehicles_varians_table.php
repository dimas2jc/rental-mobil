<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiclesVariansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles_varians', function (Blueprint $table) {
            $table->char('ID_VARIAN_VEHICLES')->primary();
            $table->char('NAMA_VARIAN');
            $table->char('VEHICLES_TYPE');
            $table->char('VEHICLES_PABRIKAN');
            $table->char('SILINDER');
            $table->char('KAPASITAS_CC');
            $table->char('TIPE_BBM');
            $table->char('KAPASITAS_BBM');
            $table->char('RASIO_BBM');
            $table->char('JENIS_TRANSMISI');
            $table->char('KONFIGURASI_AXLE');
            $table->char('JUMLAH_SUMBU');
            $table->char('UKURAN_BAN');
            $table->char('VEHICLES_SIT');
            $table->char('NOTE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehicles_varians');
    }
}

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
            $table->char('id_varian_vehicles')->primary();
            $table->char('nama_varian')->nullable();
            $table->char('vehicles_type')->nullable();
            $table->char('vehicles_pabrikan')->nullable();
            $table->char('silinder')->nullable();
            $table->char('kapasitas_cc')->nullable();
            $table->char('tipe_bbm')->nullable();
            $table->char('kapasitas_bbm')->nullable();
            $table->char('rasio_bbm')->nullable();
            $table->char('jenis_transmisi')->nullable();
            $table->char('konfigurasi_axle')->nullable();
            $table->char('jumlah_sumbu')->nullable();
            $table->char('ukuran_ban')->nullable();
            $table->char('vehicles_sit')->nullable();
            $table->char('note')->nullable();
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

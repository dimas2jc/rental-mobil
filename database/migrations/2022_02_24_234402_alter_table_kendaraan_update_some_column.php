<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableKendaraanUpdateSomeColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vehicles', function (Blueprint $table) {
            $table->dropColumn('masa_sntk');
            $table->dropColumn('alamat_sntk');
            $table->string('masa_stnk', 255)->nullable();
            $table->string('alamat_stnk', 255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vehicles', function (Blueprint $table) {
            $table->dropColumn('masa_stnk');
            $table->dropColumn('alamat_stnk');
            $table->string('masa_sntk', 255)->nullable();
            $table->string('alamat_sntk', 255)->nullable();
        });
    }
}

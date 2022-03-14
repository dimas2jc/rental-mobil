<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTablePaymentRentDropIdChargeVehicles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('payment_rent', function (Blueprint $table) {
            $table->string('id_charge_vehicles')->comment('Tidak di pakai')->change();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
        Schema::table('payment_rent', function (Blueprint $table) {
            $table->string('id_charge_vehicles')->change();
        });
    }
}

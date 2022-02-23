<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailPaymentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_payment', function (Blueprint $table) {
            $table->char('id_booking')->index('relationship_9_fk');
            $table->char('id_payment_rent')->index('relationship_10_fk');
            $table->integer('price');
            $table->string('description')->nullable();
            $table->timestamp('timestamps')->useCurrentOnUpdate()->useCurrent();

            $table->primary(['id_booking', 'id_payment_rent', 'price']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_payment');
    }
}

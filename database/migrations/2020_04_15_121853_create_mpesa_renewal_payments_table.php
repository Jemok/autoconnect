<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMpesaRenewalPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mpesa_renewal_payments', function (Blueprint $table) {
            $table->increments('id');

            $table->string('mpesa_account_number');
            $table->string('univas_car_id');
            $table->integer('vehicle_payment_id');
            $table->string('status')->default('initiated');
            $table->string('type');
            $table->float('amount');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mpesa_renewal_payments');
    }
}

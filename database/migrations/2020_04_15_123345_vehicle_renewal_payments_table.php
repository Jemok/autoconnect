<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class VehicleRenewalPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicle_renewal_payments', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('vehicle_detail_id')->index()->unsigned();
            $table->string('package');
            $table->string('status')->default('not_paid');
            $table->integer('days')->default(30);

            $table->foreign('vehicle_detail_id')
                ->references('id')
                ->on('vehicle_details')
                ->onUpdate('cascade')
                ->onDelete('cascade');

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
        Schema::dropIfExists('vehicle_renewal_payments');
    }
}

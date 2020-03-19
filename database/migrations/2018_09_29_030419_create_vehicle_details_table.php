<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehicleDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicle_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('car_make_id')->index()->unsigned();
            $table->integer('car_model_id')->index()->unsigned();
            $table->integer('year');
            $table->decimal('mileage');
            $table->integer('body_type_id')->index()->unsigned();
            $table->integer('transmission_type_id')->index()->unsigned();
            $table->integer('car_condition_id')->index()->unsigned();
            $table->integer('duty_id')->index()->unsigned();
            $table->decimal('price');
            $table->string('negotiable_price');
            $table->string('fuel_type')->nullable();
            $table->string('engine_size')->nullable();
            $table->string('interior')->nullable();
            $table->integer('colour_type_id')->index()->unsigned();
            $table->text('description')->nullable();
            $table->json('other_features');
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
        Schema::dropIfExists('vehicle_details');
    }
}

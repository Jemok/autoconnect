<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehicleContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicle_contacts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email');
            $table->string('phone_number');
            $table->string('country_code');
            $table->integer('area_id')->index()->unsigned();
            $table->integer('vehicle_detail_id')->index()->unsigned();

            $table->foreign('vehicle_detail_id')
                ->references('id')
                ->on('vehicle_details')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('area_id')
                ->references('id')
                ->on('areas')
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
        Schema::dropIfExists('vehicle_contacts');
    }
}

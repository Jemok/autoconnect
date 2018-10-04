<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehicleImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicle_images', function (Blueprint $table) {
            $table->increments('id');
            $table->string('image_area');
            $table->integer('vehicle_detail_id')->index()->unsigned();
            $table->string('image_name')->unique();

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
        Schema::dropIfExists('vehicle_images');
    }
}

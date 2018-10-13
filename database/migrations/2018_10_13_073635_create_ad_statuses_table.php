<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ad_statuses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('vehicle_payment_id')->index()->unsigned();
            $table->integer('vehicle_detail_id')->index()->unsigned();
            $table->string('status')->default('inactive');
            $table->dateTime('start');
            $table->dateTime('stop');
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
        Schema::dropIfExists('ad_statuses');
    }
}

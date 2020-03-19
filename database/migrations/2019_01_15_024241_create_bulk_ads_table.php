<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBulkAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bulk_ads', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('vehicle_detail_id')->unsigned()->index();
            $table->integer('ad_status_id')->unsigned()->index();
            $table->integer('bulk_import_id')->unsigned()->index();
            $table->integer('user_bulk_import_id')->unsigned()->index();

            $table->foreign('vehicle_detail_id')
                ->references('id')
                ->on('vehicle_details')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('ad_status_id')
                ->references('id')
                ->on('ad_statuses')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('bulk_import_id')
                ->references('id')
                ->on('bulk_imports')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('user_bulk_import_id')
                ->references('id')
                ->on('user_bulk_imports')
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
        Schema::dropIfExists('bulk_ads');
    }
}

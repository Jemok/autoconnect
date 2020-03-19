<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBulkImportImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bulk_import_images', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_bulk_import_id')->index()->unsigned();
            $table->string('image_area');
            $table->string('image_name')->unique();

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
        Schema::dropIfExists('bulk_import_images');
    }
}

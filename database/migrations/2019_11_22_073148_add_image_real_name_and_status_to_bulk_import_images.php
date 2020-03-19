<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddImageRealNameAndStatusToBulkImportImages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bulk_import_images', function (Blueprint $table) {
            $table->string('image_real_name')->nullable();
            $table->string('status')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bulk_import_images', function (Blueprint $table) {
            $table->dropColumn('image_real_name');
            $table->dropColumn('status');
        });
    }
}

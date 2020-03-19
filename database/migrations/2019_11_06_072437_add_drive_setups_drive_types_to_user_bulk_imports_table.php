<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDriveSetupsDriveTypesToUserBulkImportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_bulk_imports', function (Blueprint $table) {
            $table->string('drive_setup')->nullable();
            $table->string('drive_type')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_bulk_imports', function (Blueprint $table) {
            $table->dropColumn('drive_setup');
            $table->dropColumn('drive_type');
        });
    }
}

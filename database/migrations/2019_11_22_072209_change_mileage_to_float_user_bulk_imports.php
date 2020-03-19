<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeMileageToFloatUserBulkImports extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_bulk_imports', function (Blueprint $table) {
            $table->float('mileage')->unsigned()->change();
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
            $table->decimal('mileage')->unsigned()->change();
        });
    }
}

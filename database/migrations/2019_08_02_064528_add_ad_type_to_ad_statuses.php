<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAdTypeToAdStatuses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ad_statuses', function (Blueprint $table) {
            $table->string('ad_type')->default('standard');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ad_statuses', function (Blueprint $table) {
            $table->dropColumn('ad_type');
        });
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserProfileDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_profiles', function (Blueprint $table) {

            $table->string('phone_number')->nullable();
            $table->string('address')->nullable();
            $table->string('business_name')->nullable();
            $table->string('business_registration_number')->nullable();
            $table->string('kra_pin')->nullable();
            $table->string('business_registration_certificate')->nullable();
            $table->string('kra_pin_certificate')->nullable();
            $table->string('cr12_document')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_profiles', function (Blueprint $table) {
            $table->dropColumn('phone_number');
            $table->dropColumn('address');
            $table->dropColumn('business_name');
            $table->dropColumn('business_registration_number');
            $table->dropColumn('kra_pin');
            $table->dropColumn('business_registration_certificate');
            $table->dropColumn('kra_pin_certificate');
            $table->dropColumn('cr12_document');
        });
    }
}

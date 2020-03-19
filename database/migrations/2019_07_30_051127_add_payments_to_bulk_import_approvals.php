<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPaymentsToBulkImportApprovals extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bulk_import_approvals', function (Blueprint $table) {
            $table->string('payment_method')->nullable();
            $table->string('payment_commitment')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bulk_import_approvals', function (Blueprint $table) {
            $table->dropColumn('payment_method');
            $table->dropColumn('payment_commitment');
        });
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBulkMpesaResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bulk_mpesa_results', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('bulk_import_approval_id')->index()->unsigned();
            $table->decimal('transacted_amount')->unsigned();
            $table->decimal('transaction_cost')->unsigned();
            $table->decimal('actual_amount')->unsigned();
            $table->string('payment_id');
            $table->string('account_number');
            $table->string('payment_status');
            $table->string('receipt_number');
            $table->dateTime('transaction_date');
            $table->string('phone_number');

            $table->foreign('bulk_import_approval_id')
                ->references('id')
                ->on('bulk_import_approvals')
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
        Schema::dropIfExists('bulk_mpesa_results');
    }
}

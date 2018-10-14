<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMpesaPaymentResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mpesa_payment_results', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('vehicle_detail_id')->index()->unsigned();
            $table->integer('vehicle_payment_id')->index()->unsigned();
            $table->decimal('transacted_amount')->unsigned();
            $table->decimal('transaction_cost')->unsigned();
            $table->decimal('actual_amount')->unsigned();
            $table->string('payment_id');
            $table->string('account_number');
            $table->string('payment_status');
            $table->string('receipt_number');
            $table->dateTime('transaction_date');
            $table->string('phone_number');

            $table->foreign('vehicle_detail_id')
                ->references('id')
                ->on('vehicle_details')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('vehicle_payment_id')
                ->references('id')
                ->on('vehicle_payments')
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
        Schema::dropIfExists('mpesa_payment_results');
    }
}

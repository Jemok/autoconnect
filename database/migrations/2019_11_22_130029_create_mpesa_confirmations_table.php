<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMpesaConfirmationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mpesa_confirmations', function (Blueprint $table) {
            $table->increments('id');

            $table->string('transaction_type')->nullable();
            $table->string('trans_id');
            $table->dateTime('trans_time');
            $table->decimal('trans_amount');
            $table->string('business_short_code');
            $table->string('bill_ref_number');
            $table->string('invoice_number')->nullable();
            $table->decimal('org_account_balance');
            //ThirdPartyTransId
            $table->text('internal_transaction_id')->nullable();
            $table->string('msisdn');
            $table->string('first_name')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('last_name')->nullable();

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
        Schema::dropIfExists('mpesa_confirmations');
    }
}

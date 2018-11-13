<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBulkImportApprovalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bulk_import_approvals', function (Blueprint $table) {
            $table->increments('id');
            $table->string('approval_status')->default('not_approved');
            $table->string('payment_status')->default('not_paid');
            $table->decimal('amount');
            $table->integer('bulk_import_id')->index()->unsigned();
            $table->integer('period')->unsigned();

            $table->foreign('bulk_import_id')
                ->references('id')
                ->on('bulk_imports')
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
        Schema::dropIfExists('bulk_import_approvals');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBulkUploadDisapprovalReasonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disapproval_reasons', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('user_bulk_import_id')->index()->unsigned();

            $table->text('reason');

            $table->string('status')->default('not_resolved');

            $table->foreign('user_bulk_import_id')
                ->references('id')
                ->on('user_bulk_imports')
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
        Schema::dropIfExists('disapproval_reasons');
    }
}

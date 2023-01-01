<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('academic_year', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('name')->unsigned();
            $table->bigInteger('semester')->unsigned();

            $table->unsignedBigInteger('value_input_time_id');
            $table->foreign('value_input_time_id')->references('id')->on('value_input_time');

            $table->unsignedBigInteger('bidding_time_id');
            $table->foreign('bidding_time_id')->references('id')->on('value_input_time');

            $table->enum('active', ['Y', 'N']);

            $table->bigInteger('created_by');
            $table->bigInteger('updated_by');
            $table->timestamps();
            $table->softDeletes('deleted_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('academic_year');
    }
};

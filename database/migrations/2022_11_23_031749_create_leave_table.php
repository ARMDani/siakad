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
        Schema::create('leave', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('academic_year_id');
            $table->foreign('academic_year_id')->references('id')->on('academic_year');

            $table->text('reason for leave');

            $table->date('SK date');
            $table->bigInteger('SK number')->unsigned();
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
        Schema::dropIfExists('leave');
    }
};

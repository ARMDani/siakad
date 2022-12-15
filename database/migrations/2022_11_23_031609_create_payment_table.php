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
        Schema::create('payment', function (Blueprint $table) {
            $table->id();
            $table->date('payment date');

            $table->unsignedBigInteger('academic_year_id');
            $table->foreign('academic_year_id')->references('id')->on('academic_year');

            $table->string('payment component');
            $table->bigInteger('total_payment')->unsigned();

            $table->unsignedBigInteger('student_id');
            $table->foreign('student_id')->references('id')->on('student');


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
        Schema::dropIfExists('payment');
    }
};

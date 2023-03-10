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
        Schema::create('study_value', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('student_id');
            $table->foreign('student_id')->references('id')->on('student');

            $table->unsignedBigInteger('lecture_schedulings_id');
            $table->foreign('lecture_schedulings_id')->references('id')->on('lecture_schedulings');

            $table->unsignedBigInteger('grade_id');
            $table->foreign('grade_id')->references('id')->on('grade');

            $table->integer('assignment_value');
            $table->integer('uts_value');
            $table->integer('uas_value');
            $table->integer(' final_score');
           


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
        Schema::dropIfExists('study_value');
    }
};

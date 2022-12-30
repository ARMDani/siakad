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
        Schema::create('lecture_schedulings', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('study_program_id');
            $table->foreign('study_program_id')->references('id')->on('study_program');

            $table->unsignedBigInteger('academic_year_id');
            $table->foreign('academic_year_id')->references('id')->on('academic_year');

            $table->unsignedBigInteger('class_id');
            $table->foreign('class_id')->references('id')->on('class');

            $table->unsignedBigInteger('subject_course_id');
            $table->foreign('subject_course_id')->references('id')->on('subject_course');

            $table->unsignedBigInteger('academic_day_id');
            $table->foreign('academic_day_id')->references('id')->on('academic_day');

            $table->time('lecture_hours')->nullable();

            $table->unsignedBigInteger('lecturer_id');
            $table->foreign('lecturer_id')->references('id')->on('lecturer');

            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->timestamps();
            $table->softDeletes($column = 'deleted_at', $precision = 0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lecture_schedulings');
    }
};

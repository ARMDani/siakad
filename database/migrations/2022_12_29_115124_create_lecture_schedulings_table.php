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

            $table->unsignedBigInteger('academic_year_id');
            $table->foreign('academic_year_id')->references('id')->on('academic_year');

            $table->unsignedBigInteger('class_id');
            $table->foreign('class_id')->references('id')->on('class');

            $table->unsignedBigInteger('subject_course_id');
            $table->foreign('subject_course_id')->references('id')->on('subject_course');

            $table->unsignedBigInteger('lecturer_id');
            $table->foreign('lecturer_id')->references('id')->on('lecturer');

            $table->unsignedBigInteger('academic_day_id');
            $table->foreign('academic_day_id')->references('id')->on('academic_day');

            $table->time('start_time');
            $table->time('hour_over');

            $table->unsignedBigInteger('academic_room_id');
            $table->foreign('academic_room_id')->references('id')->on('academic_room');

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

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
        Schema::create('academic_time', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('day_id');
            $table->foreign('day_id')->references('id')->on('academic_day');

            $table->unsignedBigInteger('class_id');
            $table->foreign('class_id')->references('id')->on('class');

            $table->unsignedBigInteger('subject_course_id');
            $table->foreign('subject_course_id')->references('id')->on('subject_course');

            $table->unsignedBigInteger('lecturer_id');
            $table->foreign('lecturer_id')->references('id')->on('lecturer');

            $table->unsignedBigInteger('room_id');
            $table->foreign('room_id')->references('id')->on('academic_room');

            $table->time('start time');
            $table->time('hour is over');


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
        Schema::dropIfExists('academic_time');
    }
};

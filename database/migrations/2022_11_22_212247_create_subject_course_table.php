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
        Schema::create('subject_course', function (Blueprint $table) {
            $table->id();
            $table->char('course_code', 10)->unique();
            $table->string('name');
            $table->integer('sk');
            $table->integer('semester');

            $table->unsignedBigInteger('lecturer_id');
            $table->foreign('lecturer_id')->references('id')->on('lecturer');

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
        Schema::dropIfExists('subject_course');
    }
};

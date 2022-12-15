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
        Schema::create('academic_advisor', function (Blueprint $table) {
            $table->id();
            $table->string('name');

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
        Schema::dropIfExists('academic_advisor');
    }
};

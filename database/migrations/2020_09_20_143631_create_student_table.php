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
        Schema::create('student', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->char('nim', 9);

            $table->enum('gender', ['Laki-Laki', 'Perempuan']);

            $table->enum('religion', ['Islam', 'Hindu', 'Kristen', 'Protestan', 'Katolik', 'Budha', 'Konghucu']);

            $table->unsignedBigInteger('study_program_id');
            $table->foreign('study_program_id')->references('id')->on('study_program');
        
            $table->unsignedBigInteger('districts_id');
            $table->foreign('districts_id')->references('id')->on('districts');

            $table->unsignedBigInteger('class_id');
            $table->foreign('class_id')->references('id')->on('class');

            $table->unsignedBigInteger('generations_id');
            $table->foreign('generations_id')->references('id')->on('generations');

            $table->binary('photo');
            $table->bigInteger('created_by')->nulllable;
            $table->bigInteger('updated_by')->nulllable;
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
        Schema::dropIfExists('student');
    }
};

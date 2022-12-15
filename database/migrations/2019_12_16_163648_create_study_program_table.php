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
        Schema::create('study_program', function (Blueprint $table) {
            $table->id();
            $table->char('code_prodi', 10);
            $table->string('name');

            $table->unsignedBigInteger('study_faculty_id');
            $table->foreign('study_faculty_id')->references('id')->on('study_faculty');

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
        Schema::dropIfExists('study_program');
    }
};

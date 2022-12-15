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
        Schema::create('information', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('category');

            $table->string('username');
            $table->string('information title');
            $table->text('information conten');
            $table->date('date');

            $table->unsignedBigInteger('academic_day_id');
            $table->foreign('academic_day_id')->references('id')->on('academic_day');

            $table->string('gambar');
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
        Schema::dropIfExists('information');
    }
};

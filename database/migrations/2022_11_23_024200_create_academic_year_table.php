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
        Schema::create('academic_year', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('name')->unsigned();
            $table->enum('semester', ['Ganjil', 'Genap']);
            $table->dateTime('start_time_value');
            $table->dateTime('end_of_time_value');
            $table->dateTime('start_time_bidding');
            $table->dateTime('end_of_time_bidding');
            $table->enum('active', ['Y', 'N'])->nullable(true);

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
        Schema::dropIfExists('academic_year');
    }
};

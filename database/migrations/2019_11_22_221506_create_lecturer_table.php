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
        Schema::create('lecturer', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->char('nidn', 9)->unique();
            
            $table->unsignedBigInteger('study_program_id');
            $table->foreign('study_program_id')->references('id')->on('study_program');
        
            $table->enum('gender', ['Laki-Laki', 'Perempuan']);
            $table->enum('religion', ['Islam', 'Hindu', 'Kristen', 'Protestan', 'Katolik', 'Budha', 'Konghucu']);
            $table->text('address');
            $table->binary('photo');
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
        Schema::dropIfExists('lecturer');
    }
};

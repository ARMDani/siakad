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
        Schema::create('admin_prodi', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('gender', ['Laki-Laki', 'Perempuan']);
            $table->string('place_of_birth');
            $table->date('date_of_birth');
            $table->enum('religion', ['Islam', 'Hindu', 'Kristen', 'Protestan', 'Katolik', 'Budha', 'Konghucu']);
            $table->text('address');
            $table->bigInteger('tel_number')->unsigned();
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
        Schema::dropIfExists('admin_prodi');
    }
};

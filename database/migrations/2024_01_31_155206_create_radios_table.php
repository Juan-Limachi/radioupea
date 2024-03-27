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
        Schema::create('radios', function (Blueprint $table) {
            $table->id('id_rad');
            $table->unsignedBigInteger('id_usu')->index('id_usu');
            $table->foreign('id_usu')->references('id')->on('users');
            $table->string('nombre', 50);
            $table->string('descripcion');
            $table->string('ubicacion');
            $table->string('mision');
            $table->string('vision');
            $table->string('logo', 2048)->unique()->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('radios');
    }
};

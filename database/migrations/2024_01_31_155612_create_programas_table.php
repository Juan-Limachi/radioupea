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
        Schema::create('programas', function (Blueprint $table) {
            $table->id('id_pro');
            $table->unsignedBigInteger('id_usu')->index('id_usu')->nullable();
            $table->foreign('id_usu')->references('id')->on('users')->onDelete('set null');
            $table->string('titulo');
            $table->longText('descripcion')->nullable();
            $table->string('dias')->nullable();
            $table->time('hr_inicio')->nullable();
            $table->time('hr_fin')->nullable();
            $table->enum('estado', ['AL AIRE', 'FUERA DE AIRE', 'ELIMINADO'])->default('AL AIRE');
            $table->timestamps();

            $table->enum('formato', ['IMAGEN', 'VIDEO']);
            $table->string('portada', 2048)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropForeign('programas_id_user_foreign');
        Schema::dropIfExists('programas');
    }
};

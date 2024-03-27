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
        Schema::create('integrantes', function (Blueprint $table) {
            $table->id('id_int');
            $table->string('ci', 10);
            $table->string('complemento', 2)->nullable();
            $table->string('nombre', 50);
            $table->string('paterno', 20)->nullable();
            $table->string('materno', 20)->nullable();
            $table->string('cargo', 100)->nullable();
            
            $table->string('name', 20)->nullable()->default('SIN USUARIO');
            $table->enum('estado', ['ACTIVO', 'INACTIVO', 'ELIMINADO'])->default('ACTIVO');

            $table->string('imagen', 200)->nullable();
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
        // Schema::dropForeign('integrantes_id_car_foreign');

        Schema::dropIfExists('integrantes');
    }
};

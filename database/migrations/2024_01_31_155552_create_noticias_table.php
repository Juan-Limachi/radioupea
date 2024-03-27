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
        Schema::create('noticias', function (Blueprint $table) {
            $table->id('id_not');
            $table->unsignedBigInteger('id_usu')->index('id_usu')->nullable();
            $table->foreign('id_usu')->references('id')->on('users')->onDelete('set null');
            $table->enum('tipo', ['INSTITUCIONAL', 'SEGURIDAD', 'POLÍTICA', 'SOCIALES', 'EL ALTO', 'NACIONAL', 'INTERNACIONAL', 'ECONOMÍA', 'DEPORTES']);
            $table->string('titulo');
            $table->text('nota')->nullable();
            $table->date('fecha')->nullable();
            $table->enum('estado', ['SUBIDA', 'ELIMINADA'])->default('SUBIDA');
            $table->timestamps();

            $table->enum('formato', ['IMAGEN', 'VIDEO', 'YouTube']);
            $table->string('portada', 200)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropForeign('noticias_id_user_foreign');
        Schema::dropIfExists('noticias');
    }
};

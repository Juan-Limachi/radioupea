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
        Schema::create('rol_privilegios', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            
            $table->unsignedBigInteger('id_rol')->index('id_rol');
            $table->foreign('id_rol')->references('id_rol')->on('rols')->onDelete('cascade');

            $table->unsignedBigInteger('id_pri')->index('id_pri');
            $table->foreign('id_pri')->references('id_pri')->on('privilegios')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rol_privilegios');
    }
};

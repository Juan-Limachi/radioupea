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
        Schema::create('users', function (Blueprint $table) {
            $table->id('id');
            $table->string('ci', 10);
            // $table->string('complemento', 2)->nullable();
            $table->string('nombre', 50);
            $table->string('paterno', 20)->nullable();
            $table->string('materno', 20)->nullable();
            $table->string('name');
            $table->string('email')->unique();
            $table->enum('estado', ['ACTIVO', 'INACTIVO', 'ELIMINADO'])->default('ACTIVO');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');

            $table->unsignedBigInteger('id_rol')->index('id_rol')->nullable();
            $table->foreign('id_rol')->references('id_rol')->on('rols')->onDelete('set null');

            $table->timestamp('deleted_at')->nullable();
            $table->rememberToken();
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
        // Schema::dropForeign('users_id_rol_foreign');
        
        Schema::dropIfExists('users');
    }
};

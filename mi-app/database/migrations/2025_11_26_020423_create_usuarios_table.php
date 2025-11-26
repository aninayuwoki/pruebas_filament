<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id('id_usuario');
            $table->string('nombre', 100);
            $table->string('apellido', 100);
            $table->string('email', 150)->unique();
            $table->string('contrasena');
            $table->date('fecha_nacimiento')->nullable();
            $table->string('telefono', 20)->nullable();
            $table->string('direccion')->nullable();
            $table->string('ciudad', 100)->nullable();
            $table->string('pais', 100)->nullable();
            $table->string('codigo_postal', 10)->nullable();
            $table->timestamp('fecha_registro')->useCurrent();
            $table->timestamp('fecha_ultima_actualizacion')->useCurrent()->useCurrentOnUpdate();
            $table->enum('estado', ['activo', 'inactivo', 'suspendido'])->default('activo');
            $table->enum('rol', ['usuario', 'administrador', 'moderador'])->default('usuario');
            $table->string('avatar')->nullable();
            $table->boolean('verificado')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * Crea la tabla `unidad_tematicas` con las columnas necesarias.
     */
    public function up(): void
    {
        Schema::create('unidad_tematicas', function (Blueprint $table) {
            $table->string('no_de_unidad', 10); // Número de unidad (hasta 10 caracteres)
            $table->string('materia', 100); // Materia (hasta 100 caracteres)
            $table->string('nombre_unidad', 150); // Nombre de la unidad (hasta 150 caracteres)
            $table->string('objetivo_aprendizaje', 400); // Objetivo de aprendizaje (hasta 400 caracteres)
            $table->timestamps(); // created_at y updated_at

            // Clave primaria compuesta
            $table->primary(['no_de_unidad', 'materia']);
        });
    }

    /**
     * Reverse the migrations.
     * Elimina la tabla `unidad_tematicas` si existe.
     */
    public function down(): void
    {
        Schema::dropIfExists('unidad_tematicas');
    }
};

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
        Schema::create('materias', function (Blueprint $table) {
            $table->string('materia', 7)->primary();
            $table->string('nivel_escolar', 1);
            $table->integer('tipo_materia');
            $table->string('clave_area', 6);
            $table->string('nombre_completo_materia', 100);
            $table->string('nombre_abreviado_materia', 30);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materias');
    }
};

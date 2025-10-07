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
        Schema::create('grupos', function (Blueprint $table) {
            $table->string('periodo', 5)->primary(); // Clave primaria
            $table->string('materia', 7);
            $table->string('grupo', 3);
            $table->string('estatus_grupo', 1);
            $table->integer('capacidad_grupo');
            $table->integer('alumnos_inscritos');
            $table->string('folio_acta', 10);
            $table->string('paralelo_de', 10);
            $table->string('exclusivo_carrera', 3);
            $table->integer('exclusivo_reticula');
            $table->string('rfc', 13);
            $table->string('seleccionado_en_bloque', 1);
            $table->string('tipo_personal', 1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grupos');
    }
};

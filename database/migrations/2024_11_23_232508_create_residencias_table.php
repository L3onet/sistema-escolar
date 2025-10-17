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
        Schema::create('residencias', function (Blueprint $table) {
            $table->id(); // Llave primaria auto-incremental

            // Campos de la tabla
            $table->string('periodo', 5);
            $table->string('no_de_control', 10);
            $table->string('empresa', 255);
            $table->string('asesor_interno', 255);
            $table->integer('estatus_residencia');
            $table->date('fecha_inicio');
            $table->date('fecha_termino');
            $table->string('nombre_proyecto', 255);
            $table->string('nombre_asesor_externo', 255)->nullable();
            $table->integer('calificacion')->nullable();
            $table->string('folio_acta_residencia', 50)->nullable();
            $table->text('observaciones')->nullable();

            $table->timestamps();

            // LLAVES FORÁNEAS

            // FK 1: periodo → periodos_escolares.periodo
            $table->foreign('periodo')
                  ->references('periodo')
                  ->on('periodos_escolares')
                  ->onDelete('restrict')  // No permitir eliminar periodo si tiene residencias
                  ->onUpdate('cascade');  // Si se actualiza el periodo, actualizar en residencias

            // FK 2: no_de_control → alumnos.no_de_control
            $table->foreign('no_de_control')
                  ->references('no_de_control')
                  ->on('alumnos')
                  ->onDelete('restrict')  // No permitir eliminar alumno si tiene residencias
                  ->onUpdate('cascade');  // Si se actualiza el no_de_control, actualizar en residencias

            // Índices para mejorar el rendimiento
            $table->index('periodo');
            $table->index('no_de_control');
            $table->index('estatus_residencia');
            $table->index(['periodo', 'no_de_control']); // Índice compuesto
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('residencias');
    }
};

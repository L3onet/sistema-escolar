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
        Schema::create('evaluacion_alumnos', function (Blueprint $table) {
            
            $table->string('periodo')->nullable();
            $table->string('no_de_control', 10);
            $table->char('materia', 7);
            $table->char('grupo', 3)->nullable();
            $table->char('rfc', 13)->nullable();
            $table->char('clave_area', 6)->nullable();
            $table->char('encuesta', 1)->nullable();
            $table->string('respuestas', 50)->nullable();
            $table->string('resp_abierta', 255)->nullable();
            $table->string('usuario', 30)->nullable();
            $table->dateTime('fecha_hora_evaluacion')->nullable();
            $table->integer('consecutivo');
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evaluacion_alumnos');
    }
};

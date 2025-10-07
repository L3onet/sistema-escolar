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
        Schema::create('carreras', function (Blueprint $table) {
            $table->string('carrera', 3)->primary();
            $table->integer('reticula');
            $table->string('nivel_escolar', 1);
            $table->string('clave_oficial', 20);
            $table->string('nombre_carrera', 80);
            $table->string('nombre_reducido', 30);
            $table->string('siglas', 10);
            $table->integer('carga_maxima');
            $table->integer('carga_minima');
            $table->date('fecha_inicio');
            $table->date('fecha_termino')->nullable();
            $table->char('clave_cosnet', 2)->nullable();
            $table->integer('creditos_totales')->nullable();
            $table->string('id_area_carr', 25)->nullable();
            $table->string('id_sub_area_carr', 25)->nullable();
            $table->string('id_nivel_carr', 25)->nullable();
            $table->string('consecutivo_carrera', 25)->nullable();
            $table->string('nivel', 25)->nullable();
            $table->string('clave', 25)->nullable();
            $table->string('modalidad', 1)->nullable();
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carreras');
    }
};

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
        Schema::create('periodos_escolares', function (Blueprint $table) {
            $table->string('periodo', 5)->primary();
            $table->string('identificacion_larga', 30);
            $table->string('identificacion_corta', 12);
            $table->string('status', 1);
            $table->date('fecha_inicio');
            $table->date('fecha_termino');
            $table->date('inicio_vacacional_ss');
            $table->date('termino_vacacional_ss');
            $table->integer('num_dias_clase');
            $table->date('inicio_especial');
            $table->date('fin_especial');
            $table->string('cierre_horarios', 1);
            $table->string('cierre_seleccion', 1);
            $table->date('inicio_enc_estudiantil');
            $table->date('fin_enc_estudiantil');
            $table->date('inicio_sele_alumnos');
            $table->date('fin_sele_alumnos');
            $table->date('inicio_vacacional');
            $table->date('termino_vacacional');
            $table->date('parcial1_inicio');
            $table->date('parcial1_fin');
            $table->date('parcial2_inicio');
            $table->date('parcial2_fin');
            $table->date('parcial3_inicio');
            $table->date('parcial3_fin');
            $table->string('filtro', 1);
            $table->string('nota_resp', 500);
            $table->text('nota');
            $table->date('inicio_cal_docentes');
            $table->date('fin_cal_docentes');          
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('periodos_escolares');
    }
};

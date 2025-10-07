<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHorariosTable extends Migration
{
    /**
     * Ejecutar la migración para crear la tabla `horarios`.
     */
    public function up()
    {
        Schema::create('horarios', function (Blueprint $table) {
            // Columnas de la tabla
            $table->string('periodo', 5);                     // Ejemplo: "2023A"
            $table->string('rfc', 13)->nullable();            // RFC del personal (opcional)
            $table->string('tipo_horario', 1);                // Ejemplo: "M" (Matutino)
            $table->unsignedTinyInteger('dia_semana');        // Día de la semana (1-7)
            $table->time('hora_inicial');                     // Hora inicial (formato 24 horas: HH:MM)
            $table->time('hora_final')->nullable();           // Hora final (opcional)
            $table->string('materia', 7)->nullable();         // Código de la materia
            $table->string('grupo', 3)->nullable();           // Grupo (Ejemplo: "G01")
            $table->string('aula', 6)->nullable();            // Aula (Ejemplo: "A203")
            $table->string('actividad', 10)->nullable();      // Actividad (Ejemplo: "Clase")
            $table->integer('consecutivo')->nullable();       // Campo opcional
            $table->date('vigencia_inicio')->nullable();      // Fecha de inicio de vigencia (formato: YYYY-MM-DD)
            $table->date('vigencia_fin')->nullable();         // Fecha de fin de vigencia (formato: YYYY-MM-DD)
            $table->integer('consecutivo_admvo')->nullable(); // Consecutivo administrativo (opcional)
            $table->string('tipo_personal', 1)->nullable();   // Tipo de personal (Ejemplo: "A", "B")
            $table->timestamps();                             // Campos created_at y updated_at

            // Definir la clave única compuesta
            $table->unique(['periodo', 'tipo_horario', 'dia_semana'], 'horarios_unique_key');
        });
    }

    /**
     * Revertir la migración.
     */
    public function down()
    {
        Schema::dropIfExists('horarios');
    }
}

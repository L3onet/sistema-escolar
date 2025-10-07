<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMateriasCarrerasTable extends Migration
{
    public function up()
    {
        Schema::create('materias_carreras', function (Blueprint $table) {
            $table->char('carrera', 3);                         // Columna carrera CHAR(3)
            $table->integer('reticula');                       // Columna retícula INT
            $table->char('materia', 7);                        // Columna materia CHAR(7)
            $table->integer('creditos_materia')->nullable();   // Columna créditos INT, permite NULL
            $table->integer('horas_teoricas');                 // Columna horas teóricas INT
            $table->integer('horas_practicas');                // Columna horas prácticas INT
            $table->integer('orden_certificado')->nullable();  // Columna orden certificado INT, permite NULL
            $table->integer('semestre_reticula');              // Columna semestre retícula INT
            $table->integer('creditos_prerrequisito')->nullable(); // Columna créditos prerrequisito INT, permite NULL
            $table->string('especialidad', 5);                 // Columna especialidad VARCHAR(5)
            $table->char('clave_oficial_materia', 10)->nullable(); // Columna clave oficial CHAR(10), permite NULL
            $table->char('estatus_materia_carrera', 1)->nullable(); // Columna estatus CHAR(1), permite NULL
            $table->text('programa_estudios')->nullable();     // Columna programa de estudios TEXT, permite NULL
            $table->integer('renglon')->nullable();            // Columna renglón INT, permite NULL
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('materias_carreras');
    }
}


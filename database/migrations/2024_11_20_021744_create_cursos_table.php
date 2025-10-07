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
        Schema::create('Curso', function (Blueprint $table) {
            $table->char('rfc',13)->primary();                     //clave primaria CHAR(13)
            $table->char('recibo_impartido',1);         //clave primaria CHAR(1)
            $table->dateTime('fecha_curso');            //clave primaria DATETIME
            $table->char('area_especialidad',3);        //area de especialidad CHAR(3)
            $table->char('curso_taller',1);             //curso del taller CHAR(1)
            $table->char('participacion',1);            //participacion CHAR(1)
            $table->string('nombre_curso',100);         //nombre del curso VARCHAR(100)
            $table->integer('duracion_hrs');            //duracion del curso horas INT
            $table->string('institucion_curso',100);    //institucion del curso VARCHAR(100)
            $table->string('domicilio_curso',60);       //domicilio del curso VARCHAR(60)
            $table->char('documento',1);                //documento CHAR(1)
            $table->char('estatus_curso',1);            
            $table->timestamps();
            //estatus del curso CHAR(1)

            //$table->primary(['rfc','recibo_impartido','fecha_curso']);
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Curso');
    }
};


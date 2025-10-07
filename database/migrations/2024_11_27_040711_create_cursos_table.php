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
        Schema::create('cursos', function (Blueprint $table) {
            $table->string('rfc',13)->primary();                     
            $table->string('recibo_impartido',1);
            $table->dateTime('fecha_curso');            
            $table->string('area_especialidad',3);        
            $table->string('curso_taller',1);             
            $table->string('participacion',1);            
            $table->string('nombre_curso',100);         
            $table->integer('duracion_hrs');            
            $table->string('institucion_curso',100);    
            $table->string('domicilio_curso',60);       
            $table->string('documento',1);                
            $table->string('estatus_curso',1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cursos');
    }
};

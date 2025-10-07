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
        Schema::create('reporte_docentes', function (Blueprint $table) {
            $table->string('periodo',5)->primary();                            //clave primaria CHAR(5)
            $table->string('rfc',13);                                //rfc CHAR(13)
            $table->string('clave_area',6);                         //clave area CHAR(6)
            $table->string('materia',255);                            //clave primaria CHAR(7)
            $table->string('grupo',3);                              //clave primaria CHAR(3)
            $table->integer('calificacion');                    //calicicacion INT
            $table->integer('reprobados');                      //reprobados INT
            $table->integer('desertados');                      //desertados INT
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reporte_docentes');
    }
};

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
        Schema::create('crt_programa_oficials', function (Blueprint $table) {
            $table->char('materia', 7)->primary();                    //Clave primaria CHAR(7)
            $table->string('objetivo_materia', 450);                  //Objetivo materia VARCHAR(450)
            $table->char('no_de_unidades', 2);                        //No de unidades CHAR(2)
            $table->string('caracterizacion', 450)->nullable();       //Caracterizacion VARCHAR(450)
            $table->string('competencia', 450)->nullable();           //Competencia VARCHAR(450)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('crt_programa_oficials');
    }
};
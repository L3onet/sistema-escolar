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
        Schema::create('salones', function (Blueprint $table) {
            $table->string('salon',10)->primary();       //  clave primaria CHAR 10
            $table->string('ubicacion',10);          //  ubicacion CHAR 10
            $table->integer('capacidad_aula');      //  capacidad de aula INT
            $table->string('observaciones',255);   //  observaciones  STRING
            $table->string('permite_cruce',1);        //  permite de cruce CHAR 1
            $table->string('estatus',1);             //  Estatus CHAR 1
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('salones');
    }
};

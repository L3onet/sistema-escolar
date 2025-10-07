<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResidenciasTable extends Migration
{
    public function up()
    {
        Schema::create('residencias', function (Blueprint $table) {
            //$table->id(); // Esto es un campo autoincremental para la tabla
            $table->integer('periodo');
            $table->bigInteger('no_de_control')->primary(); // Aquí estableces 'no_de_control' como clave primaria
            $table->string('empresa');
            $table->string('asesor_interno');
            $table->integer('estatus_residencia');
            $table->date('fecha_inicio');
            $table->date('fecha_termino');
            $table->string('nombre_proyecto');
            $table->string('nombre_asesor_externo')->nullable();
            $table->integer('calificacion')->nullable();
            $table->string('folio_acta_residencia')->nullable();
            $table->string('observaciones')->nullable();
            $table->timestamps(); // Crea las columnas 'created_at' y 'updated_at'
        });
    }

    public function down()
    {
        Schema::dropIfExists('residencias');
    }
}

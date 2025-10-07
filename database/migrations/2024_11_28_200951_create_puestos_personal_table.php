<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePuestosPersonalTable extends Migration
{
    public function up()
    {
        Schema::create('puestos_personal', function (Blueprint $table) {
            $table->char('rfc', 13)->primary();
            $table->integer('clave_puesto');
            $table->integer('horas_asignadas')->nullable();
            $table->dateTime('fecha_ingreso_puesto');
            $table->dateTime('fecha_termino_puesto')->nullable();
            $table->dateTime('fecha_de_ratificacion_puesto')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('puestos_personal');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumnosSocioeconomicos', function (Blueprint $table) {
            $table->string('numero_control') -> primary();
            $table->string('nivel_estudios_padre',20);
            $table->string('nivel_estudios_madre',20);
            $table->string('con_quien_vives',20);
            $table->integer('cuartos_casa');
            $table->string('ocupacion_padre',20);
            $table->string('ocupacion_madre',20);
            $table->string('de_quien_dependes',20);
            $table->string('casa_vives',5);
            $table->integer('total_ingresos');
            $table->integer('cuartos_casa_vives');
            $table->integer('personas_casa');
            $table->string('comunicar_con', 80);
            $table->integer('calle_numero');
            $table->string('colonia', 40);
            $table->integer('codigo_postal');
            $table->string('municipio', 50);
            $table->string('entidad_federativa', 50);
            $table->string('telefono',20);
            

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alumnosSocioeconomicos');
    }
};

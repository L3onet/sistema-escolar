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
        Schema::create('periodo_escolar', function (Blueprint $table) {
            $table->string('periodo')->primary('periodo');                //periodo CHAR(5)
            $table->string('identificacion_larga');    //identificacion larga CHAR(30)       
            $table->string('identificacion_corta');    //identificacion corta CHAR(12)
            $table->date('fecha_inicio');            //fecha inicio DATE
            $table->date('fecha_termino');           //fecha termino DATE
            $table->date('inicio_vacacional_ss');    //inicio vacacional ss DATE
            $table->date('termino_vacacional_ss');   //termino vacacional ss DATE
            $table->integer('num_dias_clase');           //num dias clase INT
            $table->date('inicio_especial');             //inicio especial DATE
            $table->date('fin_especial');                //fin especial DATE
            $table->string('cierre_horarios');             //cierre horarios CHAR(1)
            $table->string('cierre_seleccion');            //cierre seleccion CHAR(1)
            $table->date('inicio_enc_estudiantil');  //inicio enc estudiantil DATE
            $table->date('fin_enc_estudiantil');     //fin enc estudiantil DATE
            $table->date('inicio_sele_alumnos');     //inicio sele alumnos DATE
            $table->date('fin_sele_alumnos');        //fin sele alumnos DATE
            $table->date('inicio_vacacional');           //inicio vacacional DATE
            $table->date('termino_vacacional');          //termino vacacional DATE
            $table->date('parcial1_inicio');            //parcial1 inicio DATE
            $table->date('parcial1_fin');                //parcial1 fin DATE
            $table->date('parcial2_inicio');             //parcial2 inicio DATE
            $table->date('parcial2_fin');                //parcial2 fin DATE
            $table->date('parcial3_inicio');             //parcial3 inicio DATE
            $table->date('parcial3_fin');                //parcial3 fin DATE
            $table->string('filtro');                      //filtro CHAR (1)
            $table->string('nota_resp');                 //nota resp VARCHAR(500)
            $table->text('nota');                        //nota TEXT
            $table->date('inicio_cal_docentes');         //inicio cal docentes DATE
            $table->date('fin_cal_docentes');            //fin cal docentes DATE
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('periodo_escolars');
    }
};

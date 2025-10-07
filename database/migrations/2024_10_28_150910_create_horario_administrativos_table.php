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
        Schema::create('horario_administrativos', function (Blueprint $table) {
            $table->string('periodo', 4)->primary();      // clave primaria CHAR 4
            $table->string('rfc', 13);                     // rfc CHAR 4
            $table->date('vigencia_inicio');             // vigencia inicio DATE
            $table->date('vigencia_fin');                // vigencia fin DATE
            $table->integer('consecutivo_admvo');        // consecutivo admvo INTEGER
            $table->string('tipo_control', 1);             // tipo de control CHAR 1
            $table->string('status_horario', 1);           // status horario CHAR 1
            $table->string('descripcion_horario', 100);  // descripcion horario STRING
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('horario_administrativos');
    }
};

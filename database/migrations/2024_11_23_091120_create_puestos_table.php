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
        Schema::create('puestos', function (Blueprint $table) {
            $table->integer('clave_puesto')->primary();      // Clave primaria
            $table->string('descripcion_puesto', 200)       // Descripción del puesto VARCHAR(200)
                ->nullable();
            $table->integer('nivel_puesto')                 // Nivel del puesto INT
                ->nullable();
            $table->char('tipo_puesto', 1)                  // Tipo de puesto CHAR(1)
                ->nullable();
            $table->text('funciones_puesto')                // Funciones del puesto TEXT
                ->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('puestos');
    }
};

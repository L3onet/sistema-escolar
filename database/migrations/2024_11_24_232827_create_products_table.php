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
        Schema::create('products', function (Blueprint $table) {
            $table->char('rfc', 13)->primary(); // Definir RFC como clave primaria
            $table->integer('clave_puesto');
            $table->integer('horas_asignadas');
            $table->dateTime('fecha_ingreso_puesto');
            $table->dateTime('fecha_termino_puesto');
            $table->dateTime('fecha_de_ratificacion_puesto');
            $table->timestamps(); // Opcional: si deseas agregar created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};

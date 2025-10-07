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
        Schema::create('plazas', function (Blueprint $table) {
            $table->string('unidad', 2);
            $table->string('subunidad', 2);
            $table->string('categoria', 7);
            $table->string('horas', 2);
            $table->string('diagonal', 8);
            $table->string('partida', 4)->primary();      // clave primaria CHAR 4
            $table->string('centro_trabajo_creacion', 10)->nullable();
            $table->string('estatus_plaza', 1)->nullable();
            $table->string('efectos_iniciales_plaza', 6)->nullable();
            $table->string('efectos_finales_plaza', 6)->nullable();
            $table->string('documento_de_creacion', 20)->nullable();
            $table->date('fecha_de_creacion')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plazas');
    }
};

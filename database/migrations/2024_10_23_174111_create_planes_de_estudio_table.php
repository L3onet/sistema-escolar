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
        Schema::create('planes_de_estudio', function (Blueprint $table) {
            $table->char('plan_de_estudios', 1)->primary(); // Clave primaria en 'plan_de_estudios'
            $table->string('nombre', 250)->nullable();
            $table->datetime('inicio_plan')->nullable();
            $table->datetime('fin_plan')->nullable();
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_general_ci';
            $table->timestamps(); #este campo se deja, no se borra
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('planes_de_estudios');
    }
};

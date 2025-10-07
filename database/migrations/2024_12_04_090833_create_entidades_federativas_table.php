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
        Schema::create('entidades_federativas', function (Blueprint $table) {
            $table->string('entidad_federativa', 50)->primary();      // clave primaria 
            $table->string('nombre_entidad',50);
            $table->string('clave_entidad',2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entidades_federativas');
    }
};

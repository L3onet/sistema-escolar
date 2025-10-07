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
        Schema::create('organigramas', function (Blueprint $table) {
            $table->string('clave_area', 6)->primary(); // Clave Primaria
            $table->string('descripcion_area', 200);    
            $table->string('area_depende', 6);
            $table->string('nivel', 1);
            $table->string('tipo_area', 1);
            $table->string('p_sustantivos', 20);
            $table->string('pro_sus', 20);
            $table->string('p_sus', 20);
            $table->string('p_s', 20);
            $table->string('extension', 3);
            $table->string('siglas', 3);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('organigramas');
    }
};

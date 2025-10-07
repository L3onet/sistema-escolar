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
        Schema::create('centros_trabajos', function (Blueprint $table) {
            $table->string('clave_centro_seit', 10)->primary(); // Clave primaria CHAR
            $table->string('zona_economica', 1); // Zona Económica CHAR
            $table->string('entidad_federativa', 50); // Entidad Federativa VARCHAR
            $table->string('centro_trabajo', 2); // Centro de Trabajo CHAR
            $table->string('nombre_ct', 50); // Nombre de Centro de Trabajo VARCHAR
            $table->string('domicilio_ct', 60); // Domicilio de Centro de Trabajo VARCHAR
            $table->string('colonia_ct', 40); // Colonia de Centro de Trabajo VARCHAR
            $table->integer('codigo_postal_ct'); // Código Postal de Centro de Trabajo INT
            $table->string('telefono_ct', 30); // Teléfono de Centro de Trabajo VARCHAR
            $table->string('ciudad_ct', 30); // Ciudad de Centro de Trabajo VARCHAR
            $table->datetime('fecha_fundacion'); // Fecha de Fundación DATETIME
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('centros_trabajos');
    }
};
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
        Schema::create('personal', function (Blueprint $table) {
            $table->char('rfc', 13)->primary(); // RFC es la clave primaria
            $table->char('curp_empleado', 18)->nullable();
            $table->integer('no_tarjeta')->nullable();
            $table->string('apellidos_empleado', 100)->nullable();
            $table->string('nombre_empleado', 100)->nullable();
            $table->string('domicilio_empleado', 60)->nullable();
            $table->string('telefono_empleado', 30)->nullable();
            $table->char('sexo_empleado', 1)->nullable();
            $table->char('estado_civil', 1)->nullable();
            $table->dateTime('fecha_titulacion')->nullable();
            $table->string('correo_electronico', 60)->nullable();
            $table->date('fecha_cedula')->nullable();

            // Añade marcas de tiempo si es necesario
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('personal'); // Elimina la tabla completa
    }
};

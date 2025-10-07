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
        Schema::create('alumnos_generales', function (Blueprint $table) {
            $table->string('no_de_control', 10)->primary();        // Clave primaria
            $table->string('lugar_nacimiento', 50)->nullable();    // Lugar de nacimiento
            $table->string('domicilio_calle', 60)->nullable();     // Domicilio calle
            $table->string('domicilio_colonia', 40)->nullable();   // Domicilio colonia
            $table->string('ciudad', 50)->nullable();              // Ciudad
            $table->string('entidad_federativa', 50)->nullable();  // Entidad federativa
            $table->integer('codigo_postal')->nullable();          // Código postal
            $table->string('telefono', 30)->nullable();            // Teléfono
            $table->string('nombre_padre', 60)->nullable();        // Nombre del padre
            $table->string('ocupacion_padre', 50)->nullable();     // Ocupación del padre
            $table->string('domicilio_calle_padre', 60)->nullable(); // Domicilio calle del padre
            $table->string('domicilio_colonia_padre', 40)->nullable(); // Domicilio colonia del padre
            $table->string('domicilio_ciudad_padre', 50)->nullable();  // Domicilio ciudad del padre
            $table->string('domicilio_entidad_fed_padre', 50)->nullable(); // Entidad federativa del padre
            $table->string('domicilio_telefono_padre', 30)->nullable(); // Teléfono del padre
            $table->string('nombre_madre', 60)->nullable();        // Nombre de la madre
            $table->string('ocupacion_madre', 50)->nullable();     // Ocupación de la madre
            $table->string('domicilio_calle_madre', 60)->nullable(); // Domicilio calle de la madre
            $table->string('domicilio_colonia_madre', 40)->nullable(); // Domicilio colonia de la madre
            $table->string('domicilio_ciudad_madre', 50)->nullable();  // Domicilio ciudad de la madre
            $table->string('domicilio_entidad_fed_madre', 50)->nullable(); // Entidad federativa de la madre
            $table->string('domicilio_telefono_madre', 30)->nullable(); // Teléfono de la madre
            $table->string('nombre_empresa', 100)->nullable();    // Nombre de la empresa
            $table->string('cargo_desempenado', 60)->nullable();  // Cargo desempeñado
            $table->decimal('ingreso_mensual', 8, 2)->nullable(); // Ingreso mensual
            $table->integer('turno')->nullable();                 // Turno
            $table->string('antiguedad', 30)->nullable();         // Antigüedad
            $table->string('nombre_jefe', 60)->nullable();        // Nombre del jefe
            $table->string('domicilio_calle_empresa', 60)->nullable(); // Domicilio calle de la empresa
            $table->string('domicilio_colonia_empresa', 40)->nullable(); // Domicilio colonia de la empresa
            $table->string('domicilio_ciudad_empresa', 50)->nullable(); // Domicilio ciudad de la empresa
            $table->string('domicilio_entidad_fed_empresa', 50)->nullable(); // Entidad federativa de la empresa
            $table->string('domicilio_telefono_empresa', 30)->nullable(); // Teléfono de la empresa
            $table->string('nombre_esposa', 60)->nullable();      // Nombre de la esposa
            $table->string('ocupacion_esposa', 50)->nullable();   // Ocupación de la esposa
            $table->integer('no_dependientes')->nullable();       // No. de dependientes
            $table->string('comunidad_indigena', 100)->nullable(); // Comunidad indígena
            $table->string('lengua_indigena', 100)->nullable();   // Lengua indígena
            $table->string('municipio_nac', 50)->nullable();      // Municipio de nacimiento
            $table->string('municipio_dom', 50)->nullable();      // Municipio de domicilio
            $table->string('domicilio_calle_tutor', 60)->nullable(); // Domicilio calle del tutor
            $table->string('nombre_tutor', 60)->nullable();       // Nombre del tutor
            $table->string('domicilio_ciudad_tutor', 50)->nullable(); // Domicilio ciudad del tutor
            $table->string('domicilio_colonia_tutor', 50)->nullable(); // Domicilio colonia del tutor
            $table->string('domicilio_telefono_tutor', 50)->nullable(); // Teléfono del tutor
            $table->integer('domicilio_entidad_federativa_titular')->nullable(); // Entidad federativa del tutor
            $table->char('clave_preparatoria', 15)->nullable();   // Clave de la preparatoria
            $table->string('municipio', 50)->nullable();          // Municipio
            $table->string('entidad_federativa_prepa', 50)->nullable(); // Entidad federativa de la prepa
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alumnos_generales');
    }
};

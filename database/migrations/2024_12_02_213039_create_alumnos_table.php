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
        Schema::create('alumnos', function (Blueprint $table) {
            $table->string('no_de_control', 10)->primary();
            $table->string('carrera', 3)->nullable();
            $table->integer('reticula')->nullable();
            $table->string('especialidad', 5)->nullable();
            $table->string('nivel_escolar', 1)->nullable();
            $table->integer('semestre')->nullable();
            $table->string('clave_interna', 10)->nullable();
            $table->string('estatus_alumno', 3)->default('ACT');
            $table->string('plan_de_estudios', 1);
            $table->string('apellido_paterno', 100)->nullable();
            $table->string('apellido_materno', 100)->nullable();
            $table->string('nombre_alumno', 100);
            $table->string('curp_alumno', 18)->nullable();
            $table->date('fecha_nacimiento')->nullable();
            $table->string('sexo', 1)->nullable();
            $table->string('estado_civil', 1)->nullable();
            $table->decimal('tipo_ingreso', 1, 0);
            $table->string('periodo_ingreso_it', 5);
            $table->string('ultimo_periodo_inscrito', 5)->nullable();
            $table->decimal('promedio_periodo_anterior', 5, 2)->nullable();
            $table->decimal('promedio_aritmetico_acumulado', 5, 2)->nullable();
            $table->integer('creditos_aprobados')->nullable();
            $table->integer('creditos_cursados')->nullable();
            $table->decimal('promedio_final_alcanzado', 5, 2)->nullable();
            $table->string('tipo_servicio_medico', 1)->nullable();
            $table->string('clave_servicio_medico', 20)->nullable();
            $table->string('escuela_procedencia', 50)->nullable();
            $table->integer('tipo_escuela')->nullable();
            $table->string('domicilio_escuela', 60)->nullable();
            $table->string('entidad_procedencia', 50)->nullable();
            $table->string('ciudad_procedencia', 50)->nullable();
            $table->string('correo_electronico', 60)->nullable();
            $table->integer('periodos_revalidacion')->nullable();
            $table->decimal('indice_reprobacion_acumulado', 8, 6)->nullable();
            $table->string('becado_por', 100)->nullable();
            $table->integer('nip')->nullable();
            $table->string('tipo_alumno', 2)->nullable();
            $table->string('nacionalidad', 3)->nullable();
            $table->string('usuario', 30)->nullable();
            $table->dateTime('fecha_actualizacion')->nullable();
            $table->integer('folio')->nullable();
            $table->date('fecha_titulacion')->nullable();
            $table->string('opcion_titulacion', 4)->nullable();
            $table->date('estatus_alumno_fecha')->nullable();
            $table->string('estatus_alumno_usuario', 100)->nullable();
            $table->string('estatus_alumno_anterior', 3)->nullable();
            $table->string('periodo_titulacion', 5)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alumnos');
    }
};

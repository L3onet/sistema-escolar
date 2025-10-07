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
        Schema::create('personals', function (Blueprint $table) {
            $table->string('rfc', 13)->primary(); //clave primaria
            $table->string('clave_centro_seit', 10); //clave de centro seit string
            $table->string ('clave_area', 6);
            $table->string('curp_empleado',18);
            $table->integer('no_tarjeta');
            $table->string('apellidos_empleado', 100);
            $table->string('nombre_empleado', 100);
            $table->integer('horas_nombramiento');
            $table->string ('nombramiento', 1);
            $table->string ('clases', 1);
            $table->string ('ingreso_rama', 6);
            $table->string ('inicio_gobierno', 6);
            $table->string ('inicio_sep', 6);
            $table->string ('inicio_plantel', 6);
            $table->string('domicilio_empleado', 60);
            $table->string('colonia_empleado', 40);
            $table->integer('codigo_postal_empleado');
            $table->string ('localidad', 30);
            $table->string ('telefono_empleado', 30);
            $table->string ('sexo_empleado', 1);
            $table->string ('estado_civil', 20);
            $table->datetime ('fecha_nacimiento');
            $table->integer ('lugar_nacimiento');
            $table->string ('institucion_egreso', 50);
            $table->string ('nivel_estudios', 1);
            $table->string ('grado_maximo_estudios', 1);
            $table->string ('estudios',250);
            $table->datetime ('fecha_titulacion');
            $table->string ('cedula_profesional', 15);
            $table->string ('especializacion', 50);
            $table->string ('idiomas_domina', 60);
            $table->string ('status_empleado', 2);
            $table->string ('correo_electronico', 60);
            $table->string ('padre', 50);
            $table->string ('madre', 50);
            $table->string ('conyuge', 50);
            $table->integer ('hijos');
            $table->string ('titulo_num', 20);
            $table->string ('titulo_num_libro', 20);
            $table->integer ('titulo_num_foja');
            $table->integer ('titulo_num_anio');
            $table->string ('num_cartilla_smn', 15);
            $table->integer ('anio_clase');
            $table->string ('pigmentacion', 20);
            $table->string ('pelo', 20);
            $table->string ('frente', 20);
            $table->string ('cejas', 20);
            $table->string ('ojos', 20);
            $table->string ('nariz', 20);
            $table->string ('boca', 20);
            $table->integer ('estaturamts');
            $table->integer ('pesokg');
            $table->string ('senas_visibles', 255);
            $table->string ('pais', 30);
            $table->integer ('pasport');
            $table->string ('fm', 30);
            $table->string ('entrada_salida', 1);
            $table->string ('observaciones_empleado', 254);
            $table->string ('area_academica', 6);
            $table->string ('tipo_personal', 1);
            $table->string ('tipo_control', 1);
            $table->string ('emergencia', 250);
            $table->string ('entidad_federativa', 50);
            $table->string ('municipio_empleado', 250);
            $table->string ('nacionalidad', 30);
            $table->integer ('acta_nacimiento_numero');
            $table->integer ('acta_nacimiento_foja');
            $table->string ('acta_nacimiento_libro', 10);
            $table->integer ('acta_nacimiento_anio');
            $table->datetime ('pasaporte_vigencia_inicio');
            $table->datetime ('pasaporte_vigencia_fin');
            $table->string ('pasaporte_puesto_autorizado', 250);
            $table->integer ('otros_dependientes');
            $table->string ('instituto_titulacion', 100);
            $table->integer ('anio_inicio_estudios');
            $table->integer ('anio_termino_estudios');
            $table->string ('domicilio_empleado_numero', 10);
            $table->datetime ('fecha_cedula');
            $table->string ('institucion_expide_titulo', 250);
            $table->string ('institucion_expide_cedula', 250);
            $table->string ('inactivo_rc', 1);
            $table->string ('documento_obtenido', 100);
            $table->datetime ('documento_obtenido_fecha');
            $table->string ('documento_obtenido_institucion', 100);
            $table->string ('apellido_paterno', 100);
            $table->string ('apellido_materno', 100);
            $table->string ('tit_abreviado', 10);
            $table->string ('estudios1', 250);
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personals');
    }
};
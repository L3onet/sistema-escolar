<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'alumnos';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'no_de_control';

    /**
     * Indicates if the model's ID is auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * The data type of the primary key ID.
     *
     * @var string
     */
    protected $keyType = 'string';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'no_de_control',
        'carrera',
        'reticula',
        'especialidad',
        'nivel_escolar',
        'semestre',
        'clave_interna',
        'estatus_alumno',
        'plan_de_estudios',
        'apellido_paterno',
        'apellido_materno',
        'nombre_alumno',
        'curp_alumno',
        'fecha_nacimiento',
        'sexo',
        'estado_civil',
        'tipo_ingreso',
        'periodo_ingreso_it',
        'ultimo_periodo_inscrito',
        'promedio_periodo_anterior',
        'promedio_aritmetico_acumulado',
        'creditos_aprobados',
        'creditos_cursados',
        'promedio_final_alcanzado',
        'tipo_servicio_medico',
        'clave_servicio_medico',
        'escuela_procedencia',
        'tipo_escuela',
        'domicilio_escuela',
        'entidad_procedencia',
        'ciudad_procedencia',
        'correo_electronico',
        'periodos_revalidacion',
        'indice_reprobacion_acumulado',
        'becado_por',
        'nip',
        'tipo_alumno',
        'nacionalidad',
        'usuario',
        'fecha_actualizacion',
        'folio',
        'fecha_titulacion',
        'opcion_titulacion',
        'estatus_alumno_fecha',
        'estatus_alumno_usuario',
        'estatus_alumno_anterior',
        'periodo_titulacion',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'reticula' => 'integer',
        'semestre' => 'integer',
        'fecha_nacimiento' => 'date',
        'tipo_ingreso' => 'decimal:0',
        'promedio_periodo_anterior' => 'decimal:2',
        'promedio_aritmetico_acumulado' => 'decimal:2',
        'creditos_aprobados' => 'integer',
        'creditos_cursados' => 'integer',
        'promedio_final_alcanzado' => 'decimal:2',
        'tipo_escuela' => 'integer',
        'periodos_revalidacion' => 'integer',
        'indice_reprobacion_acumulado' => 'decimal:6',
        'nip' => 'integer',
        'fecha_actualizacion' => 'datetime',
        'folio' => 'integer',
        'fecha_titulacion' => 'date',
        'estatus_alumno_fecha' => 'date',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'nip',
    ];
}
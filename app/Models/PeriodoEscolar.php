<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeriodoEscolar extends Model
{
    use HasFactory;

    /**
     * La tabla asociada al modelo.
     *
     * @var string
     */
    protected $table = 'periodos_escolares';

    /**
     * La clave primaria de la tabla.
     *
     * @var string
     */
    protected $primaryKey = 'periodo';

    /**
     * El tipo de la clave primaria.
     *
     * @var string
     */
    protected $keyType = 'string';

    /**
     * Indica si el ID es auto-incremental.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * Los atributos que son asignables en masa.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'periodo',
        'identificacion_larga',
        'identificacion_corta',
        'status',
        'fecha_inicio',
        'fecha_termino',
        'inicio_vacacional_ss',
        'termino_vacacional_ss',
        'num_dias_clase',
        'inicio_especial',
        'fin_especial',
        'cierre_horarios',
        'cierre_seleccion',
        'inicio_enc_estudiantil',
        'fin_enc_estudiantil',
        'inicio_sele_alumnos',
        'fin_sele_alumnos',
        'inicio_vacacional',
        'termino_vacacional',
        'parcial1_inicio',
        'parcial1_fin',
        'parcial2_inicio',
        'parcial2_fin',
        'parcial3_inicio',
        'parcial3_fin',
        'filtro',
        'nota_resp',
        'nota',
        'inicio_cal_docentes',
        'fin_cal_docentes',
    ];

    /**
     * Los atributos que deben ser convertidos a tipos nativos.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'fecha_inicio' => 'date',
        'fecha_termino' => 'date',
        'inicio_vacacional_ss' => 'date',
        'termino_vacacional_ss' => 'date',
        'num_dias_clase' => 'integer',
        'inicio_especial' => 'date',
        'fin_especial' => 'date',
        'inicio_enc_estudiantil' => 'date',
        'fin_enc_estudiantil' => 'date',
        'inicio_sele_alumnos' => 'date',
        'fin_sele_alumnos' => 'date',
        'inicio_vacacional' => 'date',
        'termino_vacacional' => 'date',
        'parcial1_inicio' => 'date',
        'parcial1_fin' => 'date',
        'parcial2_inicio' => 'date',
        'parcial2_fin' => 'date',
        'parcial3_inicio' => 'date',
        'parcial3_fin' => 'date',
        'inicio_cal_docentes' => 'date',
        'fin_cal_docentes' => 'date',
    ];
}

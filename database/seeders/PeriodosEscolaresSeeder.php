<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PeriodosEscolaresSeeder extends Seeder
{
    public function run()
    {
        DB::table('periodos_escolares')->insert([
            [
                'periodo' => '2023A',
                'identificacion_larga' => 'Enero-Junio 2023',
                'identificacion_corta' => 'ENE-JUN23',
                'status' => 'A',
                'fecha_inicio' => '2023-01-15',
                'fecha_termino' => '2023-06-15',
                'inicio_vacacional_ss' => '2023-04-01',
                'termino_vacacional_ss' => '2023-04-15',
                'num_dias_clase' => 90,
                'inicio_especial' => '2023-01-10',
                'fin_especial' => '2023-01-12',
                'cierre_horarios' => 'N',
                'cierre_seleccion' => 'Y',
                'inicio_enc_estudiantil' => '2023-06-01',
                'fin_enc_estudiantil' => '2023-06-10',
                'inicio_sele_alumnos' => '2023-01-05',
                'fin_sele_alumnos' => '2023-01-10',
                'inicio_vacacional' => '2023-06-16',
                'termino_vacacional' => '2023-07-15',
                'parcial1_inicio' => '2023-02-01',
                'parcial1_fin' => '2023-02-10',
                'parcial2_inicio' => '2023-03-01',
                'parcial2_fin' => '2023-03-10',
                'parcial3_inicio' => '2023-05-01',
                'parcial3_fin' => '2023-05-10',
                'filtro' => 'N',
                'nota_resp' => 'Responsable del área académica',
                'nota' => 'Notas adicionales sobre el periodo escolar Enero-Junio 2023.',
                'inicio_cal_docentes' => '2023-06-11',
                'fin_cal_docentes' => '2023-06-15',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'periodo' => '2023B',
                'identificacion_larga' => 'Agosto-Diciembre 2023',
                'identificacion_corta' => 'AGO-DIC23',
                'status' => 'A',
                'fecha_inicio' => '2023-08-01',
                'fecha_termino' => '2023-12-15',
                'inicio_vacacional_ss' => '2023-10-01',
                'termino_vacacional_ss' => '2023-10-15',
                'num_dias_clase' => 85,
                'inicio_especial' => '2023-07-25',
                'fin_especial' => '2023-07-27',
                'cierre_horarios' => 'Y',
                'cierre_seleccion' => 'N',
                'inicio_enc_estudiantil' => '2023-12-01',
                'fin_enc_estudiantil' => '2023-12-10',
                'inicio_sele_alumnos' => '2023-07-20',
                'fin_sele_alumnos' => '2023-07-25',
                'inicio_vacacional' => '2023-12-16',
                'termino_vacacional' => '2024-01-15',
                'parcial1_inicio' => '2023-09-01',
                'parcial1_fin' => '2023-09-10',
                'parcial2_inicio' => '2023-10-01',
                'parcial2_fin' => '2023-10-10',
                'parcial3_inicio' => '2023-11-01',
                'parcial3_fin' => '2023-11-10',
                'filtro' => 'N',
                'nota_resp' => 'Notas del responsable del periodo',
                'nota' => 'Información sobre el periodo Agosto-Diciembre 2023.',
                'inicio_cal_docentes' => '2023-12-11',
                'fin_cal_docentes' => '2023-12-15',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

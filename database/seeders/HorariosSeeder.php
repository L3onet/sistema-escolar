<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class HorariosSeeder extends Seeder
{
    public function run()
    {
        DB::table('horarios')->insert([
            [
                'periodo' => '2023A',
                'rfc' => 'ABCD123456EFG',
                'tipo_horario' => 'M',
                'dia_semana' => 1,
                'hora_inicial' => '08:00:00',
                'hora_final' => '09:30:00',
                'materia' => 'MAT101',
                'grupo' => 'G01',
                'aula' => 'A203',
                'actividad' => 'Clase',
                'consecutivo' => 1,
                'vigencia_inicio' => Carbon::create(2023, 1, 1),
                'vigencia_fin' => Carbon::create(2023, 6, 30),
                'consecutivo_admvo' => 101,
                'tipo_personal' => 'A',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'periodo' => '2023A',
                'rfc' => 'EFGH789012JKL',
                'tipo_horario' => 'V',
                'dia_semana' => 3,
                'hora_inicial' => '10:00:00',
                'hora_final' => '11:30:00',
                'materia' => 'INF202',
                'grupo' => 'G02',
                'aula' => 'B101',
                'actividad' => 'Clase',
                'consecutivo' => 2,
                'vigencia_inicio' => Carbon::create(2023, 1, 1),
                'vigencia_fin' => Carbon::create(2023, 6, 30),
                'consecutivo_admvo' => 102,
                'tipo_personal' => 'B',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'periodo' => '2023B',
                'rfc' => 'IJKL345678OPQ',
                'tipo_horario' => 'N',
                'dia_semana' => 5,
                'hora_inicial' => '18:00:00',
                'hora_final' => '19:30:00',
                'materia' => 'PHY301',
                'grupo' => 'G03',
                'aula' => 'C202',
                'actividad' => 'Clase',
                'consecutivo' => 3,
                'vigencia_inicio' => Carbon::create(2023, 8, 1),
                'vigencia_fin' => Carbon::create(2023, 12, 15),
                'consecutivo_admvo' => 103,
                'tipo_personal' => 'C',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

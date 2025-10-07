<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HorarioAdministrativosSeeder extends Seeder
{
    public function run()
    {
        DB::table('horario_administrativos')->insert([
            [
                'periodo' => '2024',
                'rfc' => 'ABCD123456EFG',
                'vigencia_inicio' => '2024-01-01',
                'vigencia_fin' => '2024-06-30',
                'consecutivo_admvo' => 1,
                'tipo_control' => 'A',
                'status_horario' => 'A',
                'descripcion_horario' => 'Horario matutino administrativo',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'periodo' => '2025',
                'rfc' => 'EFGH789012JKL',
                'vigencia_inicio' => '2024-01-01',
                'vigencia_fin' => '2024-06-30',
                'consecutivo_admvo' => 2,
                'tipo_control' => 'B',
                'status_horario' => 'I',
                'descripcion_horario' => 'Horario vespertino administrativo',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'periodo' => '2027',
                'rfc' => 'IJKL345678OPQ',
                'vigencia_inicio' => '2024-07-01',
                'vigencia_fin' => '2024-12-31',
                'consecutivo_admvo' => 3,
                'tipo_control' => 'A',
                'status_horario' => 'A',
                'descripcion_horario' => 'Horario nocturno administrativo',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GruposSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('grupos')->insert([
            [
                'periodo' => '2024A',
                'materia' => 'MAT101',
                'grupo' => 'A01',
                'estatus_grupo' => 'A',
                'capacidad_grupo' => 30,
                'alumnos_inscritos' => 25,
                'folio_acta' => 'ACT1234567',
                'paralelo_de' => 'N/A',
                'exclusivo_carrera' => 'ISC',
                'exclusivo_reticula' => 2022,
                'rfc' => 'ABC1234567890',
                'seleccionado_en_bloque' => 'N',
                'tipo_personal' => 'D',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'periodo' => '2024B',
                'materia' => 'INF202',
                'grupo' => 'B02',
                'estatus_grupo' => 'A',
                'capacidad_grupo' => 40,
                'alumnos_inscritos' => 35,
                'folio_acta' => 'ACT7654321',
                'paralelo_de' => '2024A',
                'exclusivo_carrera' => 'ITC',
                'exclusivo_reticula' => 2021,
                'rfc' => 'XYZ9876543210',
                'seleccionado_en_bloque' => 'S',
                'tipo_personal' => 'P',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'periodo' => '2025A',
                'materia' => 'PHY301',
                'grupo' => 'A02',
                'estatus_grupo' => 'I',
                'capacidad_grupo' => 20,
                'alumnos_inscritos' => 20,
                'folio_acta' => 'ACT6543210',
                'paralelo_de' => '2024B',
                'exclusivo_carrera' => 'MEC',
                'exclusivo_reticula' => 2020,
                'rfc' => 'DEF4567890123',
                'seleccionado_en_bloque' => 'N',
                'tipo_personal' => 'A',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

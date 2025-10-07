<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ReporteDocentesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('reporte_docentes')->insert([
            [
                'periodo' => '2024A',
                'rfc' => 'ABCD123456EFG',
                'clave_area' => 'INF001',
                'materia' => 'Introducción a la Programación',
                'grupo' => 'A01',
                'calificacion' => 85,
                'reprobados' => 3,
                'desertados' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'periodo' => '2025A',
                'rfc' => 'IJKL789012MNO',
                'clave_area' => 'MAT002',
                'materia' => 'Cálculo Diferencial',
                'grupo' => 'B02',
                'calificacion' => 70,
                'reprobados' => 10,
                'desertados' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'periodo' => '2024B',
                'rfc' => 'EFGH567890QRS',
                'clave_area' => 'PHY003',
                'materia' => 'Física General',
                'grupo' => 'A03',
                'calificacion' => 90,
                'reprobados' => 2,
                'desertados' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

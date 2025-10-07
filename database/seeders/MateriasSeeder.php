<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MateriasSeeder extends Seeder
{
    public function run()
    {
        DB::table('materias')->insert([
            [
                'materia' => 'MAT101',
                'nivel_escolar' => 'L',
                'tipo_materia' => 1,
                'clave_area' => 'MAT001',
                'nombre_completo_materia' => 'Matemáticas Básicas',
                'nombre_abreviado_materia' => 'MatBás',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'materia' => 'INF202',
                'nivel_escolar' => 'L',
                'tipo_materia' => 2,
                'clave_area' => 'INF001',
                'nombre_completo_materia' => 'Estructuras de Datos',
                'nombre_abreviado_materia' => 'EstrucDat',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'materia' => 'PHY301',
                'nivel_escolar' => 'L',
                'tipo_materia' => 1,
                'clave_area' => 'PHY001',
                'nombre_completo_materia' => 'Física General',
                'nombre_abreviado_materia' => 'FisGen',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'materia' => 'ADM400',
                'nivel_escolar' => 'L',
                'tipo_materia' => 3,
                'clave_area' => 'ADM001',
                'nombre_completo_materia' => 'Administración de Empresas',
                'nombre_abreviado_materia' => 'AdmEmp',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'materia' => 'ENG101',
                'nivel_escolar' => 'L',
                'tipo_materia' => 1,
                'clave_area' => 'ENG001',
                'nombre_completo_materia' => 'Inglés Básico',
                'nombre_abreviado_materia' => 'IngBas',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

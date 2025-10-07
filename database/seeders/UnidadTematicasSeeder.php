<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UnidadTematicasSeeder extends Seeder
{
    public function run()
    {
        DB::table('unidad_tematicas')->insert([
            [
                'no_de_unidad' => 'U1',
                'materia' => 'MAT101',
                'nombre_unidad' => 'Introducción a los números reales',
                'objetivo_aprendizaje' => 'Comprender las propiedades fundamentales de los números reales y su aplicación en problemas básicos.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'no_de_unidad' => 'U2',
                'materia' => 'MAT101',
                'nombre_unidad' => 'Operaciones y sus propiedades',
                'objetivo_aprendizaje' => 'Aplicar operaciones matemáticas con números reales en distintos contextos.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'no_de_unidad' => 'U1',
                'materia' => 'INF202',
                'nombre_unidad' => 'Estructuras de datos básicas',
                'objetivo_aprendizaje' => 'Entender y manipular estructuras de datos lineales como listas, pilas y colas.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'no_de_unidad' => 'U2',
                'materia' => 'INF202',
                'nombre_unidad' => 'Estructuras de datos no lineales',
                'objetivo_aprendizaje' => 'Analizar árboles y grafos para resolver problemas computacionales.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'no_de_unidad' => 'U1',
                'materia' => 'PHY301',
                'nombre_unidad' => 'Fundamentos de cinemática',
                'objetivo_aprendizaje' => 'Describir el movimiento de partículas utilizando ecuaciones cinemáticas.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CrtProgramaOficialSeeder extends Seeder
{
    public function run()
    {
        DB::table('crt_programa_oficials')->insert([
            [
                'materia' => 'MAT101',
                'objetivo_materia' => 'Proveer al estudiante una comprensión sólida de los números reales y sus propiedades.',
                'no_de_unidades' => '05',
                'caracterizacion' => 'Esta materia pertenece al área básica de matemáticas.',
                'competencia' => 'Resolver problemas matemáticos básicos aplicados a situaciones reales.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'materia' => 'INF202',
                'objetivo_materia' => 'Familiarizar al estudiante con las estructuras de datos lineales y no lineales.',
                'no_de_unidades' => '06',
                'caracterizacion' => 'Curso fundamental para el desarrollo de habilidades en programación.',
                'competencia' => 'Implementar y manipular estructuras de datos en aplicaciones computacionales.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'materia' => 'PHY301',
                'objetivo_materia' => 'Desarrollar un entendimiento de los conceptos básicos de la cinemática y dinámica.',
                'no_de_unidades' => '04',
                'caracterizacion' => 'Materia central en el área de física para ingenierías.',
                'competencia' => 'Aplicar los principios de la física en problemas de movimiento y fuerza.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'materia' => 'ADM400',
                'objetivo_materia' => 'Capacitar al estudiante en las bases de la administración empresarial moderna.',
                'no_de_unidades' => '03',
                'caracterizacion' => 'Pertenece al área de ciencias económicas y administrativas.',
                'competencia' => 'Planificar y gestionar recursos dentro de una organización.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'materia' => 'ENG101',
                'objetivo_materia' => 'Desarrollar habilidades básicas de comunicación en inglés.',
                'no_de_unidades' => '04',
                'caracterizacion' => 'Curso introductorio al idioma inglés para principiantes.',
                'competencia' => 'Comunicar ideas básicas en inglés en un entorno académico.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

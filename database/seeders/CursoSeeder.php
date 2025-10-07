<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CursoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('Curso')->insert([
            [
                'rfc' => 'ABC1234567890',
                'recibo_impartido' => 'A',
                'fecha_curso' => Carbon::create(2023, 1, 15, 9, 0, 0),
                'area_especialidad' => 'TEC',
                'curso_taller' => 'C',
                'participacion' => 'I',
                'nombre_curso' => 'Curso Avanzado de Laravel',
                'duracion_hrs' => 40,
                'institucion_curso' => 'Instituto de Tecnología Avanzada',
                'domicilio_curso' => 'Av. Tecnológico 123, Ciudad Tech',
                'documento' => 'C',
                'estatus_curso' => 'A',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'rfc' => 'XYZ9876543210',
                'recibo_impartido' => 'B',
                'fecha_curso' => Carbon::create(2023, 5, 10, 14, 0, 0),
                'area_especialidad' => 'ADM',
                'curso_taller' => 'T',
                'participacion' => 'A',
                'nombre_curso' => 'Taller de Liderazgo',
                'duracion_hrs' => 20,
                'institucion_curso' => 'Escuela de Negocios y Liderazgo',
                'domicilio_curso' => 'Calle Negocios 45, Ciudad Líder',
                'documento' => 'T',
                'estatus_curso' => 'C',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'rfc' => 'DEF4567890123',
                'recibo_impartido' => 'C',
                'fecha_curso' => Carbon::create(2024, 3, 20, 10, 30, 0),
                'area_especialidad' => 'INF',
                'curso_taller' => 'C',
                'participacion' => 'I',
                'nombre_curso' => 'Introducción a Python',
                'duracion_hrs' => 30,
                'institucion_curso' => 'Academia de Programación',
                'domicilio_curso' => 'Calle Código 78, Ciudad Software',
                'documento' => 'C',
                'estatus_curso' => 'A',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

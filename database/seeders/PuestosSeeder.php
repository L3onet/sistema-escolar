<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PuestosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('puestos')->insert([
            [
                'clave_puesto' => 1,
                'descripcion_puesto' => 'Gerente General',
                'nivel_puesto' => 5,
                'tipo_puesto' => 'D',
                'funciones_puesto' => 'Responsable de la planificación estratégica, supervisión de equipos y toma de decisiones clave para el éxito de la organización.',
            ],
            [
                'clave_puesto' => 2,
                'descripcion_puesto' => 'Jefe de Departamento',
                'nivel_puesto' => 4,
                'tipo_puesto' => 'M',
                'funciones_puesto' => 'Coordinar las actividades del departamento, supervisar al personal y garantizar el cumplimiento de los objetivos asignados.',
            ],
            [
                'clave_puesto' => 3,
                'descripcion_puesto' => 'Asistente Administrativo',
                'nivel_puesto' => 2,
                'tipo_puesto' => 'A',
                'funciones_puesto' => 'Realizar tareas administrativas y de apoyo, incluyendo gestión de documentos, atención telefónica y organización de reuniones.',
            ],
            [
                'clave_puesto' => 4,
                'descripcion_puesto' => 'Técnico de Mantenimiento',
                'nivel_puesto' => 3,
                'tipo_puesto' => 'T',
                'funciones_puesto' => 'Encargado del mantenimiento preventivo y correctivo de equipos y maquinaria.',
            ],
            [
                'clave_puesto' => 5,
                'descripcion_puesto' => 'Auxiliar de Limpieza',
                'nivel_puesto' => 1,
                'tipo_puesto' => 'S',
                'funciones_puesto' => 'Mantener limpias las áreas asignadas y asegurar un ambiente ordenado y seguro.',
            ],
        ]);
    }
}

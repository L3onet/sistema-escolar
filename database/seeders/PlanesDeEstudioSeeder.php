<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PlanesDeEstudioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('planes_de_estudio')->insert([
            [
                'plan_de_estudios' => 'A',
                'nombre' => 'Ingeniería en Sistemas Computacionales',
                'inicio_plan' => Carbon::create(2022, 1, 1),
                'fin_plan' => Carbon::create(2026, 12, 31),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'plan_de_estudios' => 'B',
                'nombre' => 'Licenciatura en Administración',
                'inicio_plan' => Carbon::create(2021, 9, 1),
                'fin_plan' => Carbon::create(2025, 8, 31),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'plan_de_estudios' => 'C',
                'nombre' => 'Ingeniería Industrial',
                'inicio_plan' => Carbon::create(2023, 2, 15),
                'fin_plan' => Carbon::create(2027, 6, 30),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

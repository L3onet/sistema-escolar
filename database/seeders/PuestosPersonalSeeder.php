<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PuestosPersonalSeeder extends Seeder
{
    public function run()
    {
        DB::table('puestos_personal')->insert([
            [
                'rfc' => 'ABCD123456EFG',
                'clave_puesto' => 101,
                'horas_asignadas' => 40,
                'fecha_ingreso_puesto' => Carbon::create(2021, 1, 15, 9, 0, 0),
                'fecha_termino_puesto' => null,
                'fecha_de_ratificacion_puesto' => Carbon::create(2022, 6, 1, 10, 0, 0),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'rfc' => 'EFGH789012JKL',
                'clave_puesto' => 102,
                'horas_asignadas' => 35,
                'fecha_ingreso_puesto' => Carbon::create(2020, 5, 20, 8, 0, 0),
                'fecha_termino_puesto' => Carbon::create(2023, 5, 20, 17, 0, 0),
                'fecha_de_ratificacion_puesto' => Carbon::create(2021, 5, 20, 9, 0, 0),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'rfc' => 'IJKL345678OPQ',
                'clave_puesto' => 103,
                'horas_asignadas' => 30,
                'fecha_ingreso_puesto' => Carbon::create(2019, 8, 10, 10, 0, 0),
                'fecha_termino_puesto' => Carbon::create(2022, 12, 31, 18, 0, 0),
                'fecha_de_ratificacion_puesto' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

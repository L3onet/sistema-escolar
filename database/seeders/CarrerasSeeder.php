<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CarrerasSeeder extends Seeder
{
    public function run()
    {
        DB::table('carreras')->insert([
            [
                'carrera' => 'ISC',
                'reticula' => 2022,
                'nivel_escolar' => 'L',
                'clave_oficial' => '12345-ISC-2022',
                'nombre_carrera' => 'Ingeniería en Sistemas Computacionales',
                'nombre_reducido' => 'Sistemas',
                'siglas' => 'ISC',
                'carga_maxima' => 50,
                'carga_minima' => 20,
                'fecha_inicio' => Carbon::create(2022, 8, 15),
                'fecha_termino' => null,
                'clave_cosnet' => '01',
                'creditos_totales' => 260,
                'id_area_carr' => 'AREA-TICS',
                'id_sub_area_carr' => 'SUBAREA-TICS',
                'id_nivel_carr' => 'NIVEL-LIC',
                'consecutivo_carrera' => '001',
                'nivel' => 'Licenciatura',
                'clave' => 'CARRERA-ISC',
                'modalidad' => 'E',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'carrera' => 'IIA',
                'reticula' => 2020,
                'nivel_escolar' => 'L',
                'clave_oficial' => '54321-IIA-2020',
                'nombre_carrera' => 'Ingeniería Industrial y Administrativa',
                'nombre_reducido' => 'Industrial',
                'siglas' => 'IIA',
                'carga_maxima' => 45,
                'carga_minima' => 18,
                'fecha_inicio' => Carbon::create(2020, 8, 1),
                'fecha_termino' => null,
                'clave_cosnet' => '02',
                'creditos_totales' => 240,
                'id_area_carr' => 'AREA-INDUSTRIAL',
                'id_sub_area_carr' => 'SUBAREA-INDUSTRIAL',
                'id_nivel_carr' => 'NIVEL-LIC',
                'consecutivo_carrera' => '002',
                'nivel' => 'Licenciatura',
                'clave' => 'CARRERA-IIA',
                'modalidad' => 'E',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'carrera' => 'LAE',
                'reticula' => 2021,
                'nivel_escolar' => 'L',
                'clave_oficial' => '67890-LAE-2021',
                'nombre_carrera' => 'Licenciatura en Administración de Empresas',
                'nombre_reducido' => 'Administración',
                'siglas' => 'LAE',
                'carga_maxima' => 40,
                'carga_minima' => 16,
                'fecha_inicio' => Carbon::create(2021, 1, 10),
                'fecha_termino' => null,
                'clave_cosnet' => '03',
                'creditos_totales' => 220,
                'id_area_carr' => 'AREA-ADMIN',
                'id_sub_area_carr' => 'SUBAREA-ADMIN',
                'id_nivel_carr' => 'NIVEL-LIC',
                'consecutivo_carrera' => '003',
                'nivel' => 'Licenciatura',
                'clave' => 'CARRERA-LAE',
                'modalidad' => 'P',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

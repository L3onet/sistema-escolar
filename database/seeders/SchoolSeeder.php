<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SchoolSeeder extends Seeder
{
    public function run()
    {
        DB::table('School')->insert([
            [
                'clave_escuela' => 101,
                'tipo_escuela' => 1,
                'nombre_escuela' => 'Escuela Primaria Benito Juárez',
                'clave_coepes' => 'COEPES001',
            ],
            [
                'clave_escuela' => 102,
                'tipo_escuela' => 2,
                'nombre_escuela' => 'Secundaria Técnica #5',
                'clave_coepes' => 'COEPES002',
            ],
            [
                'clave_escuela' => 103,
                'tipo_escuela' => 3,
                'nombre_escuela' => 'Preparatoria Federal Lázaro Cárdenas',
                'clave_coepes' => 'COEPES003',
            ],
            [
                'clave_escuela' => 104,
                'tipo_escuela' => 4,
                'nombre_escuela' => 'Instituto Tecnológico Nacional',
                'clave_coepes' => 'COEPES004',
            ],
            [
                'clave_escuela' => 105,
                'tipo_escuela' => 5,
                'nombre_escuela' => 'Universidad Autónoma de México',
                'clave_coepes' => 'COEPES005',
            ],
        ]);
    }
}

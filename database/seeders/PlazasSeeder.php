<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PlazasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('plazas')->insert([
            [
                'unidad' => '01',
                'subunidad' => '02',
                'categoria' => 'A123456',
                'horas' => '40',
                'diagonal' => 'ABC12345',
                'partida' => '1001',
                'centro_trabajo_creacion' => 'CT12345678',
                'estatus_plaza' => 'A',
                'efectos_iniciales_plaza' => '202301',
                'efectos_finales_plaza' => '202412',
                'documento_de_creacion' => 'DOC20231234',
                'fecha_de_creacion' => Carbon::create(2023, 1, 15),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'unidad' => '02',
                'subunidad' => '03',
                'categoria' => 'B765432',
                'horas' => '20',
                'diagonal' => 'DEF54321',
                'partida' => '1002',
                'centro_trabajo_creacion' => 'CT87654321',
                'estatus_plaza' => 'B',
                'efectos_iniciales_plaza' => '202206',
                'efectos_finales_plaza' => '202306',
                'documento_de_creacion' => 'DOC20221234',
                'fecha_de_creacion' => Carbon::create(2022, 6, 1),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'unidad' => '03',
                'subunidad' => '01',
                'categoria' => 'C654321',
                'horas' => '30',
                'diagonal' => 'GHI67890',
                'partida' => '1003',
                'centro_trabajo_creacion' => 'CT12398765',
                'estatus_plaza' => 'C',
                'efectos_iniciales_plaza' => '202109',
                'efectos_finales_plaza' => '202209',
                'documento_de_creacion' => 'DOC20211234',
                'fecha_de_creacion' => Carbon::create(2021, 9, 15),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

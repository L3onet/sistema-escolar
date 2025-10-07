<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubtemasSeeder extends Seeder
{
    public function run()
    {
        DB::table('subtemas')->insert([
            [
                'noDeSubtema' => 'SUB001',
                'noDeUnidad' => '01',
                'materia' => 'MAT101',
                'nombreSubtema' => 'Introducción a los Números Reales',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'noDeSubtema' => 'SUB002',
                'noDeUnidad' => '01',
                'materia' => 'MAT101',
                'nombreSubtema' => 'Propiedades de las Operaciones',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'noDeSubtema' => 'SUB003',
                'noDeUnidad' => '02',
                'materia' => 'INF202',
                'nombreSubtema' => 'Estructuras de Datos Lineales',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'noDeSubtema' => 'SUB004',
                'noDeUnidad' => '02',
                'materia' => 'INF202',
                'nombreSubtema' => 'Árboles Binarios',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'noDeSubtema' => 'SUB005',
                'noDeUnidad' => '03',
                'materia' => 'PHY301',
                'nombreSubtema' => 'Introducción a la Cinemática',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

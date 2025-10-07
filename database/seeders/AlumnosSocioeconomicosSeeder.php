<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AlumnosSocioeconomicosSeeder extends Seeder
{
    public function run()
    {
        DB::table('alumnosSocioeconomicos')->insert([
            [
                'numero_control' => 'A123456789',
                'nivel_estudios_padre' => 'Licenciatura',
                'nivel_estudios_madre' => 'Preparatoria',
                'con_quien_vives' => 'Padres',
                'cuartos_casa' => 5,
                'ocupacion_padre' => 'Ingeniero',
                'ocupacion_madre' => 'Comerciante',
                'de_quien_dependes' => 'Padres',
                'casa_vives' => 'Propi',
                'total_ingresos' => 40000,
                'cuartos_casa_vives' => 5,
                'personas_casa' => 4,
                'comunicar_con' => 'Juan Pérez (Padre)',
                'calle_numero' => 123,
                'colonia' => 'Centro',
                'codigo_postal' => 06600,
                'municipio' => 'Ciudad de México',
                'entidad_federativa' => 'Ciudad de México',
                'telefono' => '555-123-4567',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'numero_control' => 'B987654321',
                'nivel_estudios_padre' => 'Secundaria',
                'nivel_estudios_madre' => 'Secundaria',
                'con_quien_vives' => 'Madre',
                'cuartos_casa' => 3,
                'ocupacion_padre' => 'Desempleado',
                'ocupacion_madre' => 'Ama de casa',
                'de_quien_dependes' => 'Madre',
                'casa_vives' => 'Renta',
                'total_ingresos' => 15000,
                'cuartos_casa_vives' => 3,
                'personas_casa' => 5,
                'comunicar_con' => 'Carmen Torres (Madre)',
                'calle_numero' => 456,
                'colonia' => 'Chapultepec',
                'codigo_postal' => 44100,
                'municipio' => 'Guadalajara',
                'entidad_federativa' => 'Jalisco',
                'telefono' => '333-987-6543',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'numero_control' => 'C123987654',
                'nivel_estudios_padre' => 'Primaria',
                'nivel_estudios_madre' => 'Primaria',
                'con_quien_vives' => 'Abuelos',
                'cuartos_casa' => 4,
                'ocupacion_padre' => 'Campesino',
                'ocupacion_madre' => 'Comerciante',
                'de_quien_dependes' => 'Abuelos',
                'casa_vives' => 'Propi',
                'total_ingresos' => 20000,
                'cuartos_casa_vives' => 4,
                'personas_casa' => 6,
                'comunicar_con' => 'Luis Gómez (Abuelo)',
                'calle_numero' => 789,
                'colonia' => 'San Juan',
                'codigo_postal' => 50000,
                'municipio' => 'Toluca',
                'entidad_federativa' => 'Estado de México',
                'telefono' => '722-456-7890',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

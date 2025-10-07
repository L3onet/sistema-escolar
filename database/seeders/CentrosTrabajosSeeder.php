<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CentrosTrabajosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('centros_trabajos')->insert([
            [
                'clave_centro_seit' => 'CT001',
                'zona_economica' => 'A',
                'entidad_federativa' => 'Ciudad de México',
                'centro_trabajo' => '01',
                'nombre_ct' => 'Centro Educativo Norte',
                'domicilio_ct' => 'Av. Reforma 123',
                'colonia_ct' => 'Juárez',
                'codigo_postal_ct' => 06600,
                'telefono_ct' => '555-123-4567',
                'ciudad_ct' => 'Ciudad de México',
                'fecha_fundacion' => Carbon::create(1995, 6, 15),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'clave_centro_seit' => 'CT002',
                'zona_economica' => 'B',
                'entidad_federativa' => 'Estado de México',
                'centro_trabajo' => '02',
                'nombre_ct' => 'Centro Educativo Oriente',
                'domicilio_ct' => 'Av. López Mateos 456',
                'colonia_ct' => 'Centro',
                'codigo_postal_ct' => 50000,
                'telefono_ct' => '722-987-6543',
                'ciudad_ct' => 'Toluca',
                'fecha_fundacion' => Carbon::create(2000, 10, 1),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'clave_centro_seit' => 'CT003',
                'zona_economica' => 'C',
                'entidad_federativa' => 'Jalisco',
                'centro_trabajo' => '03',
                'nombre_ct' => 'Centro Educativo Occidente',
                'domicilio_ct' => 'Calle Hidalgo 789',
                'colonia_ct' => 'Chapalita',
                'codigo_postal_ct' => 44100,
                'telefono_ct' => '333-222-1111',
                'ciudad_ct' => 'Guadalajara',
                'fecha_fundacion' => Carbon::create(2010, 5, 20),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

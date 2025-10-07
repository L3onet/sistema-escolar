<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrganigramasSeeder extends Seeder
{
    public function run()
    {
        DB::table('organigramas')->insert([
            [
                'clave_area' => 'ADM001',
                'descripcion_area' => 'Dirección General',
                'area_depende' => 'ADM001',
                'nivel' => '1',
                'tipo_area' => 'A',
                'p_sustantivos' => 'Gestión',
                'pro_sus' => 'Planeación',
                'p_sus' => 'Administración',
                'p_s' => 'Estrategia',
                'extension' => '101',
                'siglas' => 'DG',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'clave_area' => 'RH001',
                'descripcion_area' => 'Recursos Humanos',
                'area_depende' => 'ADM001',
                'nivel' => '2',
                'tipo_area' => 'B',
                'p_sustantivos' => 'Reclutamiento',
                'pro_sus' => 'Capacitación',
                'p_sus' => 'Bienestar',
                'p_s' => 'Relaciones',
                'extension' => '102',
                'siglas' => 'RH',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'clave_area' => 'FIN001',
                'descripcion_area' => 'Finanzas',
                'area_depende' => 'ADM001',
                'nivel' => '2',
                'tipo_area' => 'B',
                'p_sustantivos' => 'Presupuestos',
                'pro_sus' => 'Contabilidad',
                'p_sus' => 'Auditoría',
                'p_s' => 'Tesorería',
                'extension' => '103',
                'siglas' => 'FIN',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'clave_area' => 'TEC001',
                'descripcion_area' => 'Tecnología',
                'area_depende' => 'ADM001',
                'nivel' => '2',
                'tipo_area' => 'B',
                'p_sustantivos' => 'Innovación',
                'pro_sus' => 'Sistemas',
                'p_sus' => 'Infraestructura',
                'p_s' => 'Soporte',
                'extension' => '104',
                'siglas' => 'TEC',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'clave_area' => 'LOG001',
                'descripcion_area' => 'Logística',
                'area_depende' => 'ADM001',
                'nivel' => '2',
                'tipo_area' => 'B',
                'p_sustantivos' => 'Distribución',
                'pro_sus' => 'Almacenamiento',
                'p_sus' => 'Suministros',
                'p_s' => 'Transporte',
                'extension' => '105',
                'siglas' => 'LOG',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

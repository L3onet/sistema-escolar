<?php

namespace Database\Seeders;

use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PersonalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('personal')->insert([
            [
                'rfc' => 'ABCD123456EFG',
                'curp_empleado' => 'ABCD890123HGRLNS03',
                'no_tarjeta' => 123456,
                'apellidos_empleado' => 'Pérez Gómez',
                'nombre_empleado' => 'Juan Carlos',
                'domicilio_empleado' => 'Calle Falsa 123, Ciudad Ficticia',
                'telefono_empleado' => '555-1234-567',
                'sexo_empleado' => 'M',
                'estado_civil' => 'S',
                'fecha_titulacion' => Carbon::create(2015, 6, 20, 0, 0, 0),
                'correo_electronico' => 'juan.perez@example.com',
                'fecha_cedula' => Carbon::create(2015, 7, 15),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'rfc' => 'EFGH123456IJK',
                'curp_empleado' => 'EFGH890123MGRLNS05',
                'no_tarjeta' => 789012,
                'apellidos_empleado' => 'Martínez López',
                'nombre_empleado' => 'Ana María',
                'domicilio_empleado' => 'Av. Siempre Viva 456, Ciudad Inventada',
                'telefono_empleado' => '555-5678-910',
                'sexo_empleado' => 'F',
                'estado_civil' => 'C',
                'fecha_titulacion' => Carbon::create(2018, 11, 10, 0, 0, 0),
                'correo_electronico' => 'ana.martinez@example.com',
                'fecha_cedula' => Carbon::create(2018, 12, 5),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'rfc' => 'IJKL123456NOP',
                'curp_empleado' => 'IJKL890123NGRLNS06',
                'no_tarjeta' => 345678,
                'apellidos_empleado' => 'García Torres',
                'nombre_empleado' => 'Luis Alberto',
                'domicilio_empleado' => 'Blvd. Ejemplo 789, Ciudad Modelo',
                'telefono_empleado' => '555-1112-131',
                'sexo_empleado' => 'M',
                'estado_civil' => 'D',
                'fecha_titulacion' => Carbon::create(2012, 3, 25, 0, 0, 0),
                'correo_electronico' => 'luis.garcia@example.com',
                'fecha_cedula' => Carbon::create(2012, 4, 20),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

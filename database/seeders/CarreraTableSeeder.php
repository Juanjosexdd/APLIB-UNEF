<?php

namespace Database\Seeders;

use App\Models\Configuration\Carrera;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CarreraTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Carrera::create([
            'nombre' => 'LICENCIATURAS ADMINISTRACIÓN DE DESASTRES',
        ]);

        Carrera::create([
            'nombre' => 'LICENCIATURAS CONTADURÍA PÚBLICA',
        ]);

        Carrera::create([
            'nombre' => 'LICENCIATURAS ECONOMÍA SOCIAL',
        ]);

        Carrera::create([
            'nombre' => 'LICENCIATURAS EDUCACIÓN INTEGRAL',
        ]);

        Carrera::create([
            'nombre' => 'T.S.U. ENFERMERÍA',
        ]);

        Carrera::create([
            'nombre' => 'INGENIERÍAS AGRONÓMICA',
        ]);

        Carrera::create([
            'nombre' => 'INGENIERÍAS CIVIL',
        ]);

        Carrera::create([
            'nombre' => 'INGENIERÍAS MECÁNICA',
        ]);

        Carrera::create([
            'nombre' => 'INGENIERÍAS SISTEMAS',
        ]);
    }
}

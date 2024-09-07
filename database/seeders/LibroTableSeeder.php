<?php

namespace Database\Seeders;

use App\Models\Configuration\Libro;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LibroTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $carreras = [
            1 => 'L', // LICENCIATURAS ADMINISTRACIÓN DE DESASTRES
            2 => 'C', // LICENCIATURAS CONTADURÍA PÚBLICA
            3 => 'E', // LICENCIATURAS ECONOMÍA SOCIAL
            4 => 'I', // LICENCIATURAS EDUCACIÓN INTEGRAL
            5 => 'E', // T.S.U. ENFERMERÍA
            6 => 'A', // INGENIERÍAS AGRONÓMICA
            7 => 'C', // INGENIERÍAS CIVIL
            8 => 'M', // INGENIERÍAS MECÁNICA
            9 => 'S', // INGENIERÍAS SISTEMAS
        ];

        $procedencias = ['DONACIÓN', 'ADJUDICACIÓN', 'ADQUISICIÓN', 'HERENCIA', 'INTERCAMBIO'];
        $condiciones = ['Bueno', 'Regular', 'Malo'];

        for ($i = 1; $i <= 80; $i++) {
            $carrera_id = rand(1, 9);
            $subcategoria_id = rand(1, 24); // Asumiendo que hay 24 subcategorías
            $nro_ejemplares = rand(1, 5);
            $serial = str_pad(rand(1, 9999), 4, '0', STR_PAD_LEFT);
            $cota = $carreras[$carrera_id] . $serial . $nro_ejemplares;

            Libro::create([
                'titulo' => 'Título del Libro ' . $i,
                'editorial' => 'Editorial ' . rand(1, 10),
                'edicion' => 'Edición ' . rand(1, 5),
                'autor' => 'Autor ' . rand(1, 50),
                'serial' => $serial,
                'cota' => $cota,
                'cota_universal' => 'CU' . rand(1000, 9999),
                'nro_ejemplares' => $nro_ejemplares,
                'procedencia' => $procedencias[array_rand($procedencias)],
                'estatus' => 'activo',
                'condicion' => $condiciones[array_rand($condiciones)],
                'observacion' => 'Ninguna',
                'subcategoria_id' => $subcategoria_id,
                'carrera_id' => $carrera_id,
            ]);
        }
    }
}

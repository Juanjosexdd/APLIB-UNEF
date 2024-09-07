<?php

namespace Database\Seeders;

use App\Models\Configuration\Categoria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Categoria::create([
            'nombre' => 'Literatura',
            'descripcion' => 'Libros de poesía, novela, teatro y otras obras literarias.'
        ]);

        Categoria::create([
            'nombre' => 'Ciencia',
            'descripcion' => 'Libros relacionados con las ciencias naturales, exactas y aplicadas.'
        ]);

        Categoria::create([
            'nombre' => 'Historia',
            'descripcion' => 'Libros sobre eventos históricos, biografías, y estudios culturales.'
        ]);

        Categoria::create([
            'nombre' => 'Tecnología',
            'descripcion' => 'Libros sobre avances tecnológicos, programación, y desarrollo de software.'
        ]);

        Categoria::create([
            'nombre' => 'Arte',
            'descripcion' => 'Libros sobre historia del arte, pintura, escultura y otras formas de arte visual.'
        ]);

        Categoria::create([
            'nombre' => 'Filosofía',
            'descripcion' => 'Libros de filosofía, ética, lógica, y pensamiento crítico.'
        ]);

        Categoria::create([
            'nombre' => 'Psicología',
            'descripcion' => 'Libros sobre la mente humana, comportamiento y salud mental.'
        ]);

        Categoria::create([
            'nombre' => 'Educación',
            'descripcion' => 'Libros sobre teorías educativas, métodos de enseñanza y aprendizaje.'
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\Configuration\Subcategoria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubcategoriaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Subcategorías para la categoría "Literatura"
        Subcategoria::create([
            'nombre' => 'Poesía',
            'descripcion' => 'Libros de poesía y colecciones de poemas.',
            'categoria_id' => 1, // ID de la categoría "Literatura"
        ]);

        Subcategoria::create([
            'nombre' => 'Novela',
            'descripcion' => 'Libros de ficción narrativa en forma de novelas.',
            'categoria_id' => 1, // ID de la categoría "Literatura"
        ]);

        Subcategoria::create([
            'nombre' => 'Teatro',
            'descripcion' => 'Obras dramáticas y guiones teatrales.',
            'categoria_id' => 1, // ID de la categoría "Literatura"
        ]);

        // Subcategorías para la categoría "Ciencia"
        Subcategoria::create([
            'nombre' => 'Física',
            'descripcion' => 'Libros sobre física teórica y experimental.',
            'categoria_id' => 2, // ID de la categoría "Ciencia"
        ]);

        Subcategoria::create([
            'nombre' => 'Biología',
            'descripcion' => 'Libros sobre biología, ecología y ciencias de la vida.',
            'categoria_id' => 2, // ID de la categoría "Ciencia"
        ]);

        Subcategoria::create([
            'nombre' => 'Química',
            'descripcion' => 'Libros sobre química orgánica, inorgánica y análisis químico.',
            'categoria_id' => 2, // ID de la categoría "Ciencia"
        ]);

        // Subcategorías para la categoría "Historia"
        Subcategoria::create([
            'nombre' => 'Historia Antigua',
            'descripcion' => 'Libros sobre civilizaciones antiguas y sus culturas.',
            'categoria_id' => 3, // ID de la categoría "Historia"
        ]);

        Subcategoria::create([
            'nombre' => 'Historia Moderna',
            'descripcion' => 'Libros sobre eventos históricos desde la Edad Media hasta la actualidad.',
            'categoria_id' => 3, // ID de la categoría "Historia"
        ]);

        Subcategoria::create([
            'nombre' => 'Biografías',
            'descripcion' => 'Historias de vida de figuras históricas.',
            'categoria_id' => 3, // ID de la categoría "Historia"
        ]);

        // Subcategorías para la categoría "Tecnología"
        Subcategoria::create([
            'nombre' => 'Programación',
            'descripcion' => 'Libros sobre desarrollo de software y lenguajes de programación.',
            'categoria_id' => 4, // ID de la categoría "Tecnología"
        ]);

        Subcategoria::create([
            'nombre' => 'Redes',
            'descripcion' => 'Libros sobre redes informáticas y telecomunicaciones.',
            'categoria_id' => 4, // ID de la categoría "Tecnología"
        ]);

        Subcategoria::create([
            'nombre' => 'Inteligencia Artificial',
            'descripcion' => 'Libros sobre aprendizaje automático y AI.',
            'categoria_id' => 4, // ID de la categoría "Tecnología"
        ]);

        // Subcategorías para la categoría "Arte"
        Subcategoria::create([
            'nombre' => 'Pintura',
            'descripcion' => 'Libros sobre técnicas de pintura y artistas famosos.',
            'categoria_id' => 5, // ID de la categoría "Arte"
        ]);

        Subcategoria::create([
            'nombre' => 'Escultura',
            'descripcion' => 'Libros sobre escultura y técnicas de modelado.',
            'categoria_id' => 5, // ID de la categoría "Arte"
        ]);

        Subcategoria::create([
            'nombre' => 'Fotografía',
            'descripcion' => 'Libros sobre técnicas de fotografía y fotógrafos notables.',
            'categoria_id' => 5, // ID de la categoría "Arte"
        ]);

        // Subcategorías para la categoría "Filosofía"
        Subcategoria::create([
            'nombre' => 'Ética',
            'descripcion' => 'Libros sobre teorías éticas y moralidad.',
            'categoria_id' => 6, // ID de la categoría "Filosofía"
        ]);

        Subcategoria::create([
            'nombre' => 'Lógica',
            'descripcion' => 'Libros sobre razonamiento lógico y argumentación.',
            'categoria_id' => 6, // ID de la categoría "Filosofía"
        ]);

        Subcategoria::create([
            'nombre' => 'Metafísica',
            'descripcion' => 'Libros sobre la naturaleza de la realidad y existencia.',
            'categoria_id' => 6, // ID de la categoría "Filosofía"
        ]);

        // Subcategorías para la categoría "Psicología"
        Subcategoria::create([
            'nombre' => 'Psicología Clínica',
            'descripcion' => 'Libros sobre diagnósticos y terapias psicológicas.',
            'categoria_id' => 7, // ID de la categoría "Psicología"
        ]);

        Subcategoria::create([
            'nombre' => 'Psicología Social',
            'descripcion' => 'Libros sobre el comportamiento humano en contextos sociales.',
            'categoria_id' => 7, // ID de la categoría "Psicología"
        ]);

        Subcategoria::create([
            'nombre' => 'Neuropsicología',
            'descripcion' => 'Libros sobre la relación entre el cerebro y el comportamiento.',
            'categoria_id' => 7, // ID de la categoría "Psicología"
        ]);

        // Subcategorías para la categoría "Educación"
        Subcategoria::create([
            'nombre' => 'Teorías del Aprendizaje',
            'descripcion' => 'Libros sobre las distintas teorías y enfoques del aprendizaje.',
            'categoria_id' => 8, // ID de la categoría "Educación"
        ]);

        Subcategoria::create([
            'nombre' => 'Metodología Educativa',
            'descripcion' => 'Libros sobre técnicas y métodos de enseñanza.',
            'categoria_id' => 8, // ID de la categoría "Educación"
        ]);

        Subcategoria::create([
            'nombre' => 'Evaluación Educativa',
            'descripcion' => 'Libros sobre sistemas y métodos de evaluación en la educación.',
            'categoria_id' => 8, // ID de la categoría "Educación"
        ]);
    }
}

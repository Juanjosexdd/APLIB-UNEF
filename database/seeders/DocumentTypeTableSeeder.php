<?php

namespace Database\Seeders;

use App\Models\Configuration\DocumentType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DocumentTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DocumentType::create([
            'name'    => 'Venezolano',
            'slug'      => 'venezolano',
            'abbreviation' => 'V'
        ]);

        DocumentType::create([
            'name'    => 'Extranjero',
            'slug'      => 'extranjero',
            'abbreviation' => 'E'
        ]);

        // DocumentType::create([
        //     'name'    => 'Rif',
        //     'slug'      => 'rif',
        //     'abbreviation' => 'R'
        // ]);

        // DocumentType::create([
        //     'name'    => 'Juridico',
        //     'slug'      => 'juridico',
        //     'abbreviation' => 'J'
        // ]);

        // DocumentType::create([
        //     'name'    => 'Gubernamental',
        //     'slug'      => 'gubernamentañ',
        //     'abbreviation' => 'G'
        // ]);
    }
}

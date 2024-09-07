<?php

namespace Database\Seeders;

use App\Models\Security\Statu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Statu::create([
            'name'    => 'Activo',
            'slug'      => 'activo',
        ]);

        Statu::create([
            'name'    => 'Inactivo',
            'slug'      => 'inactivo',
        ]);
    }
}

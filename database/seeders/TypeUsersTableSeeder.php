<?php

namespace Database\Seeders;

use App\Models\Configuration\TypeUser;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TypeUser::create([
            'name'    => 'Admnistrador',
            'slug'      => 'administrador',
        ]);
        TypeUser::create([
            'name'    => 'Bibliotecario',
            'slug'      => 'bibliotecario',
        ]);
        TypeUser::create([
            'name'    => 'Profesor',
            'slug'      => 'profesor',
        ]);
        TypeUser::create([
            'name'    => 'Estudiante',
            'slug'      => 'Estudiante',
        ]);

    }
}

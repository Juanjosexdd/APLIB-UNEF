<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Juan José',
            'lastname' => 'Soto Peña',
            'username' => 'JuanJosexD',
            'slug' => 'juan-jose-soto-peña',
            'sex' => 1,
            'birthdate' => Carbon::now()->subYears(33),
            'phone' => '+58 (412) 520-5105',
            'address' => '12 Octubre, Calle 9 #415',
            'email' => 'JuanJosexD@gmail.com',
            'document_type_id' => 1,
            'type_user_id' => 1,
            'status_id' => 1,
            'identification_card' => '20391877',
            'password' => 'administrador',
        ])->assignRole('Administrador');

        User::create([
            'name' => 'Diogleidis Yuderkis',
            'lastname' => 'Regalado Borges',
            'username' => 'Diogle2213',
            'slug' => 'diogleidis-yuderkis-regalado-borges',
            'sex' => 2,
            'birthdate' => Carbon::now()->subYears(33),
            'phone' => '+58 (414) 559-4914',
            'address' => '12 Octubre, Calle 9 #415',
            'email' => 'Diogle2213@gmail.com',
            'document_type_id' => 1,
            'type_user_id' => 1,
            'status_id' => 1,
            'identification_card' => '20272648',
            'password' => 'Profesor',
        ])->assignRole('Administrador');
    }
}

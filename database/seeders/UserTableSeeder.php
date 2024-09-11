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
            'name' => 'Administrador',
            'lastname' => 'Sistema',
            'username' => 'Administrador',
            'slug' => 'administrador-sistema',
            'sex' => 1,
            'birthdate' => Carbon::now()->subYears(33),
            'phone' => '+58 (412) 000-0000',
            'address' => 'Araure centro',
            'email' => 'administrador@gmail.com',
            'document_type_id' => 1,
            'type_user_id' => 1,
            'status_id' => 1,
            'identification_card' => '25961725',
            'password' => 'administrador',
        ])->assignRole('Administrador');



    }
}

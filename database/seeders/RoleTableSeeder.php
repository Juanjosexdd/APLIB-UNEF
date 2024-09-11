<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role1 = Role::create([
            'name' => 'Administrador',
            'description' => 'Posee acceso a las configuraciones del sistema.',
        ]);
        $role2 = Role::create([
            'name' => 'Basico',
            'description' => 'En espera de asignacion de roles y permisos.'
        ]);

        // 1
        Permission::create([
            'name' => 'home',
            'description' => 'Ver el dashboard'
        ])->syncRoles([$role1, $role2]);


        //Configuración

        //2
        Permission::create([
            'name'        => 'admin.usuarios.index',
            'description' => 'Ver listado de usuarios'
        ])->syncRoles([$role1]);
        //3
        Permission::create([
            'name'        => 'admin.usuarios.create',
            'description' => 'Crear usuarios'
        ])->syncRoles([$role1]);
        //4
        Permission::create([
            'name'        => 'admin.usuarios.edit',
            'description' => 'Eliminar usuarios'
        ])->syncRoles([$role1]);
        //5
        Permission::create([
            'name'        => 'admin.usuarios.destroy',
            'description' => 'Cambiar estatus de usuarios'
        ])->syncRoles([$role1]);

        ################################····ROLES Y PERMISOS····########################################
        //7
        Permission::create([
            'name'        => 'admin.roles.index',
            'description' => 'Ver listado de Roles'
        ])->syncRoles([$role1]);
        //8
        Permission::create([
            'name'        => 'admin.roles.create',
            'description' => 'Crear Roles'
        ])->syncRoles([$role1]);
        //9
        Permission::create([
            'name'        => 'admin.roles.edit',
            'description' => 'Eliminar Roles'
        ])->syncRoles([$role1]);
        //10
        Permission::create([
            'name'        => 'admin.roles.destroy',
            'description' => 'Cambiar estatus de Roles'
        ])->syncRoles([$role1]);
        
    }
}

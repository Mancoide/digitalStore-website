<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FirstDatasSeeds extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statusAdmin = \App\Models\Status::create(
            [
                'name' => 'Activo',
                'badge' => 'primary',
                'data_model' => 'App\\Models\\User'
            ],
        );

       \App\Models\Status::create(
            [
                'name' => 'Inactivo',
                'badge' => 'danger',
                'data_model' => 'App\\Models\\User'
            ],
        );

        \App\Models\Status::create(
            [
                'name' => 'Activo',
                'badge' => 'primary',
                'data_model' => 'App\\Models\\Currency'
            ],
        );

        \App\Models\Status::create(
            [
                'name' => 'Inactivo',
                'badge' => 'danger',
                'data_model' => 'App\\Models\\Currency'
            ],
        );

        $userAdmin = \App\Models\User::create([
            'document_number'     => '0',
            'fullname'            => 'Admin',
            'username'            => 'admin',
            'phone'               => '5959983456789',
            'email'               => 'admin@mail',
            'password'            => '12345',
            'status_id'           => $statusAdmin->id
        ]);

        // Insert starter roles
        $roles = [
            'name' => 'Admin',
            'display_name' => 'Administrador',
            'description' => 'Acceso de control maestro'
        ];

        $newRoles [] = \App\Models\Role::create($roles);

        $userAdmin->attachRole($newRoles[0]);

        $permissions = \App\Models\Permission::get()->pluck('id')->toArray();

        $newRoles[0]->attachPermissions($permissions);
    }
}

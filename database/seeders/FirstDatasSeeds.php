<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FirstDatasSeeds extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
        $arrayStatuses = [
            [
                'name' => 'Activo', // 1
                'badge' => 'primary',
                'data_model' => 'App\\Models\\User'
            ],
            [
                'name' => 'Inactivo', // 2
                'badge' => 'danger',
                'data_model' => 'App\\Models\\User'
            ],
            [
                'name' => 'Activo', // 3
                'badge' => 'primary',
                'data_model' => 'App\\Models\\Currency'
            ],
            [
                'name' => 'Inactivo', // 4
                'badge' => 'danger',
                'data_model' => 'App\\Models\\Currency'
            ],
            [
                'name' => 'Activo', // 5
                'badge' => 'primary',
                'data_model' => 'App\\Models\\Category'
            ],
            [
                'name' => 'Inactivo', // 6
                'badge' => 'danger',
                'data_model' => 'App\\Models\\Category'
            ],
        ];

        foreach($arrayStatuses as $statuses) 
        {
            Status::create($statuses);
        }

        $userAdmin = \App\Models\User::create([
            'document_number'     => '0',
            'fullname'            => 'Admin',
            'username'            => 'admin',
            'phone'               => '5959983456789',
            'email'               => 'admin@mail',
            'password'            => '12345',
            'status_id'           => 1
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

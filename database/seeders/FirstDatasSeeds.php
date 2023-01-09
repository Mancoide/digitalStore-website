<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Package;
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
            [
                'name' => 'Activo', // 7
                'badge' => 'primary',
                'data_model' => 'App\\Models\\Package'
            ],
            [
                'name' => 'Inactivo', // 8
                'badge' => 'danger',
                'data_model' => 'App\\Models\\Package'
            ],
            [
                'name' => 'Activo', // 9
                'badge' => 'primary',
                'data_model' => 'App\\Models\\Product'
            ],
            [
                'name' => 'Inactivo', // 10
                'badge' => 'danger',
                'data_model' => 'App\\Models\\Product'
            ],
            [
                'name' => 'Activo', // 11
                'badge' => 'primary',
                'data_model' => 'App\\Models\\Movement'
            ],
            [
                'name' => 'Inactivo', // 12
                'badge' => 'danger',
                'data_model' => 'App\\Models\\Movement'
            ],

            [
                'name' => 'Activo', // 13
                'badge' => 'primary',
                'data_model' => 'App\\Models\\Account'
            ],
            [
                'name' => 'Agotado', // 14
                'badge' => 'danger',
                'data_model' => 'App\\Models\\Account'
            ],

            [
                'name' => 'Borrado', // 15
                'badge' => 'danger',
                'data_model' => 'App\\Models\\Account'
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

        $packages = [
            'Plan Familiar',
            'Plan Individual'
        ];

        foreach($packages as $package) 
        {
            Package::create([
                'name' => $package,
                'cost' => 9.99, 
                'status_id' => 7
            ]);
        }

        Category::create([
            'name' => 'Cuentas Online',
            'status_id' => 5
        ]);
    }
}

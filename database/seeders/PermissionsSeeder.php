<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

            DB::table('permissions')->truncate();

            DB::table('permissions')->insert([
                [
                    'name' => 'users.index',
                    'display_name' => 'Ver Usuarios',
                    'description' => 1,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'users.create',
                    'display_name' => 'Crear Usuarios',
                    'description' => 1,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'users.editar',
                    'display_name' => 'Editar Usuarios',
                    'description' => 1,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'roles.index',
                    'display_name' => 'Ver Roles',
                    'description' => 2,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'roles.create',
                    'display_name' => 'Crear Roles',
                    'description' => 2,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'roles.editar',
                    'display_name' => 'Editar Roles',
                    'description' => 2,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
            ]);

            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}

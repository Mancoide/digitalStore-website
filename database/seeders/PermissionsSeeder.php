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
                [
                    'name'         => 'clients.index',
                    'display_name' => 'Ver Clientes',
                    'description'  => 3,
                    'created_at'   => date('Y-m-d H:i:s'),
                    'updated_at'   => date('Y-m-d H:i:s'),
                ],
                [
                    'name'         => 'clients.create',
                    'display_name' => 'Crear Clientes',
                    'description'  => 3,
                    'created_at'   => date('Y-m-d H:i:s'),
                    'updated_at'   => date('Y-m-d H:i:s'),
                ],
                [
                    'name'         => 'clients.editar',
                    'display_name' => 'Editar Clientes',
                    'description'  => 3,
                    'created_at'   => date('Y-m-d H:i:s'),
                    'updated_at'   => date('Y-m-d H:i:s'),
                ],
                [
                    'name'         => 'currencies.index',
                    'display_name' => 'Ver Monedas',
                    'description'  => 4,
                    'created_at'   => date('Y-m-d H:i:s'),
                    'updated_at'   => date('Y-m-d H:i:s'),
                ],
                [
                    'name'         => 'currencies.create',
                    'display_name' => 'Crear Monedas',
                    'description'  => 4,
                    'created_at'   => date('Y-m-d H:i:s'),
                    'updated_at'   => date('Y-m-d H:i:s'),
                ],
                [
                    'name'         => 'currencies.editar',
                    'display_name' => 'Editar Monedas',
                    'description'  => 4,
                    'created_at'   => date('Y-m-d H:i:s'),
                    'updated_at'   => date('Y-m-d H:i:s'),
                ],
                [
                    'name'         => 'products.index',
                    'display_name' => 'Ver Productos',
                    'description'  => 5,
                    'created_at'   => date('Y-m-d H:i:s'),
                    'updated_at'   => date('Y-m-d H:i:s'),
                ],
                [
                    'name'         => 'products.create',
                    'display_name' => 'Crear Productos',
                    'description'  => 5,
                    'created_at'   => date('Y-m-d H:i:s'),
                    'updated_at'   => date('Y-m-d H:i:s'),
                ],
                [
                    'name'         => 'products.editar',
                    'display_name' => 'Editar Productos',
                    'description'  => 5,
                    'created_at'   => date('Y-m-d H:i:s'),
                    'updated_at'   => date('Y-m-d H:i:s'),
                ],
                [
                    'name'         => 'packages.index',
                    'display_name' => 'Ver Plan',
                    'description'  => 6,
                    'created_at'   => date('Y-m-d H:i:s'),
                    'updated_at'   => date('Y-m-d H:i:s'),
                ],
                [
                    'name'         => 'packages.create',
                    'display_name' => 'Crear Plan',
                    'description'  => 6,
                    'created_at'   => date('Y-m-d H:i:s'),
                    'updated_at'   => date('Y-m-d H:i:s'),
                ],
                [
                    'name'         => 'packages.editar',
                    'display_name' => 'Editar Plan',
                    'description'  => 6,
                    'created_at'   => date('Y-m-d H:i:s'),
                    'updated_at'   => date('Y-m-d H:i:s'),
                ],
                [
                    'name'         => 'transacctions.index',
                    'display_name' => 'Ver transacciones',
                    'description'  => 7,
                    'created_at'   => date('Y-m-d H:i:s'),
                    'updated_at'   => date('Y-m-d H:i:s'),
                ],
                [
                    'name'         => 'transacctions.create',
                    'display_name' => 'Crear transacciones',
                    'description'  => 7,
                    'created_at'   => date('Y-m-d H:i:s'),
                    'updated_at'   => date('Y-m-d H:i:s'),
                ],
                [
                    'name'         => 'transacctions.editar',
                    'display_name' => 'Editar transacciones',
                    'description'  => 7,
                    'created_at'   => date('Y-m-d H:i:s'),
                    'updated_at'   => date('Y-m-d H:i:s'),
                ],
                [
                    'name'         => 'accounts.index',
                    'display_name' => 'Ver cuentas',
                    'description'  => 8,
                    'created_at'   => date('Y-m-d H:i:s'),
                    'updated_at'   => date('Y-m-d H:i:s'),
                ],
                [
                    'name'         => 'accounts.create',
                    'display_name' => 'Crear cuentas',
                    'description'  => 8,
                    'created_at'   => date('Y-m-d H:i:s'),
                    'updated_at'   => date('Y-m-d H:i:s'),
                ],
                [
                    'name'         => 'accounts.editar',
                    'display_name' => 'Editar cuentas',
                    'description'  => 8,
                    'created_at'   => date('Y-m-d H:i:s'),
                    'updated_at'   => date('Y-m-d H:i:s'),
                ],
                [
                    'name'         => 'category.index',
                    'display_name' => 'Ver categorias',
                    'description'  => 9,
                    'created_at'   => date('Y-m-d H:i:s'),
                    'updated_at'   => date('Y-m-d H:i:s'),
                ],
                [
                    'name'         => 'category.create',
                    'display_name' => 'Crear categorias',
                    'description'  => 9,
                    'created_at'   => date('Y-m-d H:i:s'),
                    'updated_at'   => date('Y-m-d H:i:s'),
                ],
                [
                    'name'         => 'category.editar',
                    'display_name' => 'Editar categorias',
                    'description'  => 9,
                    'created_at'   => date('Y-m-d H:i:s'),
                    'updated_at'   => date('Y-m-d H:i:s'),
                ],
            ]);

            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}

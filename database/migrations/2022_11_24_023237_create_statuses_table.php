<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('statuses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('badge');
            $table->string('data_model');
        });

        Schema::table('users', function (Blueprint $table) {
            $table->foreignId('status_id')->constrained('statuses');
        });

        $this->starterData();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('statuses');
    }

    private function starterData()
    {
        $statusAdmin = \App\Models\Status::create([
            'name' => 'Activo',
            'badge' => 'badge bg-primary',
            'data_model' => 'App\\Models\\User'
        ]);

        $userAdmin = \App\Models\User::create([
            'document_number'     => '0',
            'fullname'            => 'Admin',
            'username'            => 'admin',
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
    }
};

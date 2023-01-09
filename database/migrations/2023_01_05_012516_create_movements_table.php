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
        Schema::create('movements', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->foreignId('account_id');
            $table->integer('type_movement');
            $table->decimal('unitary_cost', 14, 2);
            $table->decimal('package_cost', 14, 2);
            $table->integer('quantity_profiles');
            $table->foreignId('createdBy')->constrained('users', 'id');
            $table->foreignId('status_id')->default(11);
            $table->foreignId('deletedBy')->nullable()->constrained('users', 'id');
            $table->longText('motive')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movements');
    }
};

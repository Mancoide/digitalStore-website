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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('type');

            $table->foreignId('user_id');
            
            $table->decimal('before', 15, 2)->default(0);
            $table->decimal('amount', 15, 2)->default(0);
            $table->decimal('after', 15, 2)->default(0);
            $table->longText('observation')->nullable();
            $table->foreignId('createdBy')->constrained('users', 'id');
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
        Schema::dropIfExists('transactions');
    }
};

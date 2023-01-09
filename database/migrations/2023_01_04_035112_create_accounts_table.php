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
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->date('subscription_date');
            $table->string('email');
            $table->string('password');
            $table->foreignId('product_id');
            $table->foreignId('package_id');
            $table->integer('accounts_available');
            $table->decimal('cost', 14, 2);
            $table->longText('description');
            $table->foreignId('status_id')->default(13);
            $table->foreignId('createdBy')->constrained('users', 'id');
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
        Schema::dropIfExists('accounts');
    }
};

<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('api_token', 60)->nullable();
            $table->date('lastLogin')->default('2024-01-01');
            $table->tinyInteger('permission')->default(2);
            $table->rememberToken();
            $table->timestamps();
        });

        User::create(['name' => 'admin', 'email' => 'admin@admin.com', 'password' => 'Aa123', 'permission' => 0]);
        User::create(['name' => 'manager', 'email' => 'manager@manager.com', 'password' => 'Aa123', 'permission' => 1]);
        User::create(['name' => 'user', 'email' => 'user@user.com', 'password' => 'Aa123', 'permission' => 2]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};

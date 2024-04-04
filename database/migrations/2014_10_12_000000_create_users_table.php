<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
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
            $table->string('logo_path')->nullable(true);
            $table->string('phone')->nullable(true);
            $table->string('site_url')->nullable(true);
            $table->text('description')->nullable(true);
            $table->rememberToken();
            $table->timestamps();
        });

        DB::table('users')->insert([
            'id' => '1',
            'name' => 'admin' ,
            'password' => password_hash('adminadmin' , PASSWORD_BCRYPT) ,
            'email' => 'admin@admin.com' ,
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};

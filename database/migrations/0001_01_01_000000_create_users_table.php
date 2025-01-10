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
        // Tạo bảng roles
        Schema::create('roles', function (Blueprint $table) {
            $table->id(); // id (primary key, auto increment)
            $table->string('name', 20); // name (varchar 20)
            $table->timestamps(); // created_at and updated_at
        });

        // Tạo bảng users
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // id (primary key, auto increment)
            $table->string('username', 50); // fullname (varchar 50)
            $table->string('fullname', 50); // fullname (varchar 50)
            $table->string('email', 150)->unique(); // email (varchar 150, unique)
            $table->string('phone_number', 20); // phone_number (varchar 20)
            $table->string('address', 200); // address (varchar 200)
            $table->string('password', 255); // password (varchar 32)
            $table->unsignedBigInteger('role_id'); // role_id (foreign key)
            $table->integer('status')->default(1);
            $table->timestamps(); // created_at and updated_at
            $table->softDeletes(); // deleted_at (soft delete)
            $table->rememberToken();
            $table->boolean('deleted')->default(false); // deleted (int)

            // Khóa ngoại
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
        });
        

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};

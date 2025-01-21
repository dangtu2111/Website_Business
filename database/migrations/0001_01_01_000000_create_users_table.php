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
        Schema::create('categories', function (Blueprint $table) {
            $table->id(); // Tạo cột id (khóa chính, tự tăng)
            $table->string('name'); // Tên danh mục
            $table->string('slug')->unique(); // Đường dẫn duy nhất
            $table->text('iframe')->nullable(); // Mã nhúng iframe
            $table->string('icon')->nullable(); // Icon (tên file hoặc đường dẫn)
            $table->string('cover_image')->nullable(); // Ảnh bìa
            $table->text('description')->nullable(); // Mô tả
            $table->integer('sort_order')->default(0); // Thứ tự sắp xếp
            $table->boolean('status')->default(1); // Trạng thái (1 = On, 0 = Off)
            $table->boolean('require_login')->default(0); // Yêu cầu đăng nhập (1 = Có, 0 = Không)
            $table->timestamps(); // Thời gian tạo và cập nhật
        });
        Schema::create('posts', function (Blueprint $table) {
            $table->id(); // Khóa chính, tự động tăng
            $table->string('title'); // Tiêu đề bài viết
            $table->string('slug')->unique(); // Đường dẫn thân thiện với SEO
            $table->string('download')->nullable(); // Link tải (nếu có)
            $table->text('description')->nullable(); // Mô tả ngắn gọn về bài viết
            $table->longText('content')->nullable(); // Nội dung bài viết
            $table->boolean('status')->default(true); // Trạng thái, mặc định là true
            $table->string('cover_image')->nullable(); // Ảnh bìa của bài viết
            $table->foreignId('category_id')->nullable()->constrained()->onDelete('set null'); // Khóa ngoại tới bảng `categories`, set null nếu category bị xóa
            $table->string('focus_keywords')->nullable(); // Từ khóa trọng tâm cho SEO
            $table->string('meta_title')->nullable(); // Meta title cho SEO
            $table->string('meta_keywords')->nullable(); // Meta keyword cho SEO
            $table->string('meta_description')->nullable(); // Meta description cho SEO
            $table->timestamps(); // Thời gian tạo và cập nhật
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('roles');
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
        Schema::dropIfExists('categorys');
        Schema::dropIfExists('posts');
    }
};

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Tạo người dùng đầu tiên (Admin)
        User::create([
            'username' => 'AdminUser1',
            'fullname' => 'Admin User',
            'email' => 'admin@example.com',
            'phone_number' => '1234567890',
            'address' => '123 Admin Street',
            'password' => Hash::make('password'), // Mã hóa mật khẩu
            'role_id' => 1, // Admin
            'deleted' => false,
            'status' => 1, // Active
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Tạo người dùng thứ hai (Editor)
        User::create([
            'username' => 'EditorUser1',
            'fullname' => 'Editor User',
            'email' => 'editor@example.com',
            'phone_number' => '0987654321',
            'address' => '456 Editor Lane',
            'password' => Hash::make('password'), // Mã hóa mật khẩu
            'role_id' => 2, // Editor
            'deleted' => false,
            'status' => 1, // Active
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Tạo người dùng thứ ba (Viewer)
        User::create([
            'username' => 'ViewerUser1',
            'fullname' => 'Viewer User',
            'email' => 'viewer@example.com',
            'phone_number' => '1122334455',
            'address' => '789 Viewer Road',
            'password' => Hash::make('password'), // Mã hóa mật khẩu
            'role_id' => 3, // Viewer
            'deleted' => false,
            'status' => 0, // Inactive
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}

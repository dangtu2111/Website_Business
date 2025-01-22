<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\UserFormRequest;
use Illuminate\Support\Facades\Hash;


class AccountController extends Controller
{
    public function user()
    {
        $template = 'backend.account.user';
        $config['method'] = 'create';
        $users = User::all();
        // Trả về view 'backend.layout.layout' và truyền biến 'config' và 'template'
        return view('backend.layout.layout', compact('template', 'config', 'users'));
    }
    public function createUser()
    {
        $template = 'backend.account.store';
        $config['method'] = 'create';
        // Trả về view 'backend.layout.layout' và truyền biến 'config' và 'template'
        return view('backend.layout.layout', compact('template', 'config'));
    }
    public function createUserPost(UserFormRequest $request)
    {
        // Tạo mới user
        $user = User::create([
            'username' => $request->input('username'),
            'fullname' => $request->input('fullname'),
            'email' => $request->input('email'),
            'phone_number' => $request->input('phone'),
            'address' => $request->input('address'),
            'password' => Hash::make($request->input('password')), // Mã hóa mật khẩu
            'role_id' => 1, // Admin
            'deleted' => false,
            'status' => 1, // Active
            'created_at' => now(),
            'updated_at' => now(),
        ]);

      

        // Kiểm tra nếu user được tạo thành công
        if ($user) {
            // Trả về view hoặc chuyển hướng
            return redirect()
                ->route('admin.account.accountUser') // Thay 'users.index' bằng tên route danh sách user
                ->with('success', 'User created successfully!');
        }

        // Xử lý nếu có lỗi
        return back()->withErrors(['error' => 'Failed to create user!'])->withInput();
    }
}

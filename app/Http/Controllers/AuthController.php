<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AuthRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function index()
    {
        return view("backend.auth.login");
    }
    public function login(AuthRequest $request)
    {
        $usernameOrEmail = $request->input('username');
        $password = $request->input('password');

        // Tìm người dùng bằng cả username hoặc email
        $user = User::where('username', $usernameOrEmail)
            ->orWhere('email', $usernameOrEmail)
            ->first();

        if ($user) {
            // Kiểm tra mật khẩu
            if (Hash::check($password, $user->password)) {
                // Kiểm tra xem người dùng có phải là admin không
                if ($user->role_id == 1) { // Giả sử role_id = 1 là admin
                    // Đăng nhập thành công và chuyển hướng tới trang admin
                    Auth::login($user); // Đăng nhập người dùng
                    return redirect()->route('admin.home')->with('success', 'Login successful');
                } else {
                    // Nếu không phải admin, trả về thông báo lỗi
                    return back()->withErrors(['error' => 'You do not have admin access'])->withInput();
                }
            } else {
                // Mật khẩu không đúng
                return back()->withErrors(['error' => 'Invalid username or password'])->withInput();
            }
        } else {
            // Không tìm thấy người dùng
            return back()->withErrors(['error' => 'Invalid username or password'])->withInput();
        }
    }


    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login');
    }
}

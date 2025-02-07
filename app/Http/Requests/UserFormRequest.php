<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserFormRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'username' => 'required|string|min:3|max:50',
            'email' => 'required|email',
            'password' => 'required|string|min:8',
            'confirm_password' => 'required|same:password',
            'address' => 'nullable|string|max:255',
            'phone_number' => 'nullable|string|regex:/^(\+84|0)[0-9]{9,10}$/',
        ];
    }

    public function messages()
    {
        return [
            'username.required' => 'Tên người dùng không được để trống.',
            'username.min' => 'Tên người dùng phải có ít nhất 3 ký tự.',
            'email.required' => 'Email là bắt buộc.',
            'email.email' => 'Email không hợp lệ.',
            'password.required' => 'Mật khẩu là bắt buộc.',
            'password.min' => 'Mật khẩu phải có ít nhất 8 ký tự.',
            'confirm_password.same' => 'Mật khẩu xác nhận không khớp.',
            'phone_number.regex' => 'Số điện thoại không hợp lệ.',
        ];
    }
}

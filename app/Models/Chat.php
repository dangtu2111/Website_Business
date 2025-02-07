<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;

    // Tên bảng (không bắt buộc nếu tên model trùng với bảng)
    protected $table = 'chats';

    // Các trường có thể điền được
    protected $fillable = ['user_one_id', 'user_two_id', 'description','from_ip'];

    /**
     * Định nghĩa mối quan hệ với User (người dùng 1)
     */
    public function userOne()
    {
        return $this->belongsTo(User::class, 'user_one_id');
    }
    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    /**
     * Định nghĩa mối quan hệ với Customer (người dùng 2)
     */
    public function userTwo()
    {
        return $this->belongsTo(Customer::class, 'user_two_id');
    }
}


<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    // Đặt tên bảng nếu không theo chuẩn Laravel (tự động: messages)
    protected $table = 'messages';

    // Định nghĩa các trường có thể được gán hàng loạt (mass assignable)
    protected $fillable = [
        'chat_id', 
        'from_user_id', 
        'from_user_type', 
        'message'
    ];

    /**
     * Quan hệ với model Chat.
     * Một tin nhắn thuộc về một cuộc trò chuyện.
     */
    public function chat()
    {
        return $this->belongsTo(Chat::class);
    }

    /**
     * Quan hệ với model User (người gửi).
     * Một tin nhắn thuộc về một người gửi (User).
     */
    public function fromUser()
    {
        return $this->morphTo();
    }
}

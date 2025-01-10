<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    // Đặt tên bảng nếu không tuân theo chuẩn
    protected $table = 'roles';

    // Các thuộc tính có thể gán hàng loạt (mass assignable)
    protected $fillable = [
        'name',
    ];

    // Quan hệ với bảng users (1-n)
    public function users()
    {
        return $this->hasMany(User::class, 'role_id');
    }
}

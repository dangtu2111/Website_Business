<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    /**
     * Bảng liên kết với model.
     *
     * @var string
     */
    protected $table = 'categories';

    /**
     * Các cột có thể gán giá trị hàng loạt.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'slug',
        'iframe',
        'icon',
        'cover_image',
        'description',
        'sort_order',
        'status',
        'require_login',
    ];

    /**
     * Các cột sẽ được chuyển đổi sang kiểu dữ liệu khác.
     *
     * @var array
     */
    protected $casts = [
        'status' => 'boolean',
        'require_login' => 'boolean',
    ];
    public function post()
    {
        return $this->hasMany(Post::class);
    }

    /**
     * Định nghĩa mối quan hệ (nếu có).
     * Ví dụ:
     * Một category có thể có nhiều bài viết:
     * 
     * public function posts()
     * {
     *     return $this->hasMany(Post::class);
     * }
     */
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class Post extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'slug',
        'download',
        'description',
        'content',
        'status',
        'cover_image',
        'category_id',
        'focus_keywords',
        'meta_title',
        'meta_keywords',
        'meta_description',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'status' => 'boolean',
    ];

    /**
     * Relationship with the Category model.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    protected static function boot()
    {
        parent::boot();

        // Sự kiện saving: xử lý trước khi lưu (áp dụng cho cả create và update)
        static::saving(function ($post) {
            if (is_null($post->category_id)) {
                $post->status = false; // Đặt status = false nếu category_id là null
            }
        });

        // Sự kiện updated: xử lý sau khi bản ghi đã được cập nhật
        static::updated(function ($post) {
            // Thực hiện logic bổ sung nếu cần sau khi cập nhật
            if (is_null($post->category_id)) {
                Log::info("Post ID {$post->id}: Category ID is null, status set to false.");
            }
        });
    }
}

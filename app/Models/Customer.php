<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    // Tên bảng (không bắt buộc nếu tên model trùng với bảng)
    protected $table = 'customers';

    // Các trường có thể điền được (fillable)
    protected $fillable = ['name', 'email', 'phone'];

    /**
     * Định nghĩa mối quan hệ nếu có (ví dụ: đơn hàng của khách hàng)
     */
    public function messages()
    {
        return $this->morphMany(Message::class, 'from_user');
    }
    
}

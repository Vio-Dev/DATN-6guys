<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $table = 'notifications'; // Nếu bảng của bạn không theo quy tắc Laravel

    // Đảm bảo chỉ các thuộc tính trong $fillable có thể được gán thông qua mass-assignment
    protected $fillable = [
        'user_id',          // Thêm 'user_id' vào đây để mass assignment hoạt động
        'message',          // Các trường khác của bảng Notification
        'order_return_id',  // Các trường khác nếu có
    ];

    // Quan hệ với người dùng (User) - Mỗi thông báo sẽ có một người gửi
    public function user()
    {
        return $this->belongsTo(User::class); // Mỗi thông báo thuộc về một người dùng
    }
}

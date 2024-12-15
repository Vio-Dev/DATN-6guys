<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderReturn extends Model
{
    use HasFactory;

    // Bảng sử dụng trong cơ sở dữ liệu
    protected $table = 'order_returns';

    // Các cột có thể gán hàng loạt (mass assignable)
    protected $fillable = [
        'order_id',
        'reason',
        'image'
    ];

    // Quan hệ với bảng orders
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    // Quan hệ với bảng notifications
    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }
}
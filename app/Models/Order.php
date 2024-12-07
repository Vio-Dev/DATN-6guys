<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    // Thêm thuộc tính fillable để cho phép mass assignment
    protected $fillable = [
        'user_id',      // Cho phép gán giá trị cho trường user_id
        'name',
        'email',
        'address',
        'phone',
        'payment_method',
        'total_price',
        'discount_value',
    ];

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class, 'order_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\admin\Product;

class OrderDetail extends Model
{
    // Đảm bảo thêm các cột vào thuộc tính fillable để cho phép mass assignment
    protected $fillable = [
        'order_id',   // Đảm bảo thêm 'order_id' vào đây
        'product_id',
        'quantity',
        'price',
    ];

    // Mối quan hệ giữa OrderDetail và Product (một chi tiết đơn hàng thuộc về một sản phẩm)
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}

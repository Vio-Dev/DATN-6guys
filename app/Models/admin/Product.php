<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\OrderDetail;


class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'category_id',
        'content',
        'image', // Lưu chuỗi JSON chứa các ảnh
        'quantity',
        'sale',
        'sale_percentage' // Nếu có

    ];
    public $timestamps = false;

    function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function orders()
    {
        return $this->belongsToMany(Orders::class, 'order_product')->withPivot('quantity', 'price');
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class, 'product_id');
    }
    public function getFinalPriceAttribute()
    {
        if ($this->sale && $this->sale_percentage) {
            return $this->price - ($this->price * $this->sale_percentage / 100);
        }
        return $this->price;
    }
}

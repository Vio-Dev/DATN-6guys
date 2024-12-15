<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\admin\Product;
// Model Wishlist
class Wishlist extends Model
{
    protected $fillable = ['user_id', 'product_id'];

    // Mối quan hệ với User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Mối quan hệ với Product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function favorites()
    {
        // Giả sử bảng `wishlists` lưu trữ sản phẩm yêu thích của người dùng
        return $this->hasMany(Wishlist::class);
    }
}


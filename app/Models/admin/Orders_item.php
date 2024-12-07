<?php

namespace App\Models\admin;

use App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders_item extends Model
{
    use HasFactory;
    protected $table = "orders_item";
    protected $fillable = [
        'id',
        'order_id',
        'product_id',
        'quantity',
        'price'
    ];
    public $timestamps = false;
    function order()
    {
        return $this->belongsTo(Orders::class, 'order_id');
    }
    function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}

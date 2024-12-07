<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    // Danh sách các cột có thể được điền dữ liệu hàng loạt
    protected $fillable = [
        'code',               // Mã giảm giá
        'start_date',         // Ngày bắt đầu
        'end_date',           // Ngày kết thúc
        'usage_limit',        // Số lần sử dụng tối đa
        'minimum_order_value',// Giá trị đơn hàng tối thiểu
        'discount_value',     // Giá trị giảm giá (số tiền hoặc phần trăm)
    ];

    // Tùy chỉnh định dạng cho các trường ngày
    protected $dates = [
        'start_date',
        'end_date',
    ];

    // Hàm kiểm tra xem mã giảm giá còn hiệu lực không
    public function isActive()
    {
        $currentDate = now();
        return $this->start_date <= $currentDate && $this->end_date >= $currentDate;
    }

    // Hàm kiểm tra nếu mã giảm giá còn số lần sử dụng
    public function hasUsageLeft()
    {
        return $this->usage_limit > 0;
    }

    // Hàm áp dụng mã giảm giá, trả về giá trị giảm giá
    public function applyDiscount($orderTotal)
    {
        if ($orderTotal < $this->minimum_order_value) {
            return 0; // Không áp dụng nếu không đạt giá trị đơn hàng tối thiểu
        }

        return $this->discount_value;
    }
}

<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    // Hiển thị danh sách mã giảm giá
    public function index()
    {
        $coupons = Coupon::all();  // Lấy tất cả các mã giảm giá
        return view('admin.coupons.index', compact('coupons')); // Trả về view với danh sách mã giảm giá
    }

    // Hiển thị form tạo mã giảm giá mới
    public function create()
    {
        return view('admin.coupons.create'); // Trả về form tạo mã giảm giá
    }

    // Lưu mã giảm giá mới vào cơ sở dữ liệu
    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|string|max:50|unique:coupons,code',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'usage_limit' => 'required|integer|min:1',
            'minimum_order_value' => 'required|numeric|min:0',
            'discount_value' => 'required|numeric|min:0',
        ]);

        // Tạo mã giảm giá mới
        Coupon::create([
            'code' => $request->code,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'usage_limit' => $request->usage_limit,
            'minimum_order_value' => $request->minimum_order_value,
            'discount_value' => $request->discount_value,
        ]);

        return redirect()->route('admin.coupons.index')->with('success', 'Mã giảm giá đã được tạo.');
    }

    // Hiển thị form chỉnh sửa mã giảm giá
    public function edit($id)
    {
        $coupon = Coupon::findOrFail($id);  // Tìm mã giảm giá theo ID
        return view('admin.coupons.edit', compact('coupon')); // Trả về form chỉnh sửa mã giảm giá
    }

    // Cập nhật mã giảm giá
    public function update(Request $request, $id)
    {
        $request->validate([
            'code' => 'required|string|max:50|unique:coupons,code,' . $id,
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'usage_limit' => 'required|integer|min:1',
            'minimum_order_value' => 'required|numeric|min:0',
            'discount_value' => 'required|numeric|min:0',
        ]);

        $coupon = Coupon::findOrFail($id);
        $coupon->update([
            'code' => $request->code,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'usage_limit' => $request->usage_limit,
            'minimum_order_value' => $request->minimum_order_value,
            'discount_value' => $request->discount_value,
        ]);

        return redirect()->route('admin.coupons.index')->with('success', 'Mã giảm giá đã được cập nhật.');
    }

    // Xóa mã giảm giá
    public function destroy($id)
    {
        $coupon = Coupon::findOrFail($id);
        $coupon->delete(); // Xóa mã giảm giá

        return redirect()->route('admin.coupons.index')->with('success', 'Mã giảm giá đã bị xóa.');
    }
}

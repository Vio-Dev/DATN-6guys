<?php

namespace App\Http\Controllers\admin;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\User;
use App\Models\admin\Orders;
use App\Models\admin\Orders_item;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{

    public function index()
    {
        // Lấy tất cả đơn hàng của user hiện tại
        $orders = Order::where('user_id', Auth::id())->get();

        // Trả về view cùng với dữ liệu đơn hàng
        return view('user.orders.index', compact('orders'));
    }

    public function list()
    {
        // Lấy tất cả đơn hàng và các chi tiết liên quan
        $orders = Order::where('user_id', auth()->id())->get(); // Lấy danh sách đơn hàng của người dùng

        return view('admin.oders.list', compact('orders'));
    }
    public function show($id)
    {
        // Tìm đơn hàng theo id và trả về view hiển thị chi tiết
        $order = Order::find($id);

        if (!$order) {
            return redirect()->route('user.orders')->with('error', 'Đơn hàng không tồn tại.');
        }

        return view('user.orders.show', compact('order'));
    }

    public function updateStatus(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->status = $request->input('status');
        $order->save();

        return redirect()->back()->with('success', 'Trạng thái đơn hàng đã được cập nhật.');
    }
    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return redirect()->back()->with('success', 'Đơn hàng đã được xóa thành công.');
    }
}

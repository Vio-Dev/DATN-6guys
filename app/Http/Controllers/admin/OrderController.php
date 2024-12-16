<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\User;
use App\Models\Admin\Orders;
use App\Models\Admin\Orders_item;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Models\Notification; 
use App\Models\OrderReturn;

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
    $notifications = Notification::all(); // Lấy tất cả thông báo

    // Truyền cả orders và notifications vào view
    return view('admin.oders.list', compact('orders', 'notifications'));
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
    public function cancelOrder(Request $request, $id)
{
    $order = Order::where('id', $id)->where('user_id', Auth::id())->first();

    if (!$order) {
        return redirect()->back()->with('error', 'Đơn hàng không tồn tại hoặc bạn không có quyền hủy đơn hàng này.');
    }

    if ($order->status !== 'pending') {
        return redirect()->back()->with('error', 'Đơn hàng đã được xác nhận và không thể hủy.');
    }

    $order->status = 'canceled';
    $order->save();

    return redirect()->route('user.orders')->with('success', 'Đơn hàng đã được hủy thành công.');
}
public function processReturn(Request $request, $orderId)
{
    // Kiểm tra sự tồn tại của đơn hàng
    $order = Order::findOrFail($orderId);

    // Kiểm tra nếu đơn hàng không phải là đã giao
    if ($order->status !== 'delivered') {
        return redirect()->route('user.orders.index')->with('error', 'Chỉ có đơn hàng đã giao mới có thể yêu cầu đổi trả.');
    }

    // Xác thực lý do đổi trả
    $validated = $request->validate([
        'reason' => 'required|string|max:255',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    // Lưu yêu cầu đổi trả
    $orderReturn = OrderReturn::create([
        'order_id' => $orderId,
        'reason' => $validated['reason'],
        'image' => $request->file('image') ? $request->file('image')->store('order_returns') : null,
    ]);

    // Tạo thông báo liên quan đến yêu cầu đổi trả
    $notification = Notification::create([
        'user_id' => auth()->id(),
        'message' => 'Bạn có một yêu cầu đổi trả cho đơn hàng #' . $orderId,
        'order_return_id' => $orderReturn->id,  // Liên kết với order_return
    ]);

    // Cập nhật trạng thái đơn hàng thành 'returning'
    $order->status = 'returning';
    $order->save();

    // Chuyển hướng hoặc thông báo
    return redirect()->route('user.orders.index')->with('success', 'Yêu cầu đổi trả đã được gửi.');
}


public function showReturnForm($orderId)
{
    $order = Order::findOrFail($orderId); // Lấy đơn hàng theo ID
    return view('user.orders.return', compact('order')); // Trả về view để người dùng nhập yêu cầu đổi trả
}
}

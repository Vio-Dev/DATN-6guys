<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Coupon;
use App\Models\Admin\Product;
use App\Mail\OrderConfirmationMail;
use Illuminate\Support\Facades\Mail;

class CheckoutController extends Controller  
{
    // Thêm middleware kiểm tra đăng nhập
    public function __construct()
    {
        $this->middleware('auth')->only(['showConfirmCheckout', 'applyDiscount', 'processCheckout', 'success', 'viewOrder']);
    }

    public function showConfirmCheckout()
    {
        // Kiểm tra nếu người dùng đã đăng nhập
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Bạn cần phải đăng nhập để thực hiện hành động này.');
        }

        $cart = session('cart');
        if (!$cart || count($cart) == 0) {
            return redirect()->route('cart.index')->with('error', 'Giỏ hàng của bạn đang trống.');
        }

        // Tính tổng giá trị giỏ hàng
        $totalPrice = array_sum(array_map(function ($item) {
            return $item['price'] * $item['quantity'];
        }, $cart));

        // Nếu có giá giảm trong session, dùng giá đó
        $discountedPrice = session('discounted_price', $totalPrice);

        return view('confirm_checkout', compact('cart', 'totalPrice', 'discountedPrice'));
    }

    public function applyDiscount(Request $request)
    {
        // Kiểm tra nếu người dùng đã đăng nhập
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Bạn cần phải đăng nhập để áp dụng mã giảm giá.');
        }

        // Kiểm tra nếu giỏ hàng trống
        $cart = session('cart');
        if (!$cart || count($cart) == 0) {
            return redirect()->route('cart.index')->with('error', 'Giỏ hàng của bạn đang trống.');
        }

        // Kiểm tra mã giảm giá
        $coupon = Coupon::where('code', $request->input('coupon_code'))->first();

        if (!$coupon) {
            return redirect()->back()->with('discount_error', 'Mã giảm giá không hợp lệ!');
        }

        if ($coupon->usage_limit <= 0) {
            return redirect()->back()->with('discount_error', 'Mã giảm giá đã hết lượt sử dụng!');
        }

        if ($coupon->end_date < now()) {
            return redirect()->back()->with('discount_error', 'Mã giảm giá đã hết hạn!');
        }

        // Kiểm tra xem đơn hàng có đạt giá trị tối thiểu không
        $totalPrice = array_sum(array_map(function ($item) {
            return $item['price'] * $item['quantity'];
        }, $cart));

        if ($totalPrice < $coupon->minimum_order_value) {
            return redirect()->back()->with('discount_error', 'Giá trị đơn hàng không đủ để áp dụng mã giảm giá!');
        }

        // Áp dụng giảm giá
        $discountValue = $coupon->discount_value;  // Giảm giá cố định
        $discountedPrice = $totalPrice - $discountValue;

        // Lưu giá trị giảm vào session
        session(['discounted_price' => $discountedPrice]);

        // Giảm số lần sử dụng mã giảm giá
        $coupon->usage_limit -= 1;
        $coupon->save();

        return redirect()->back()->with('discount_success', 'Mã giảm giá đã được áp dụng thành công!');
    }

    public function processCheckout(Request $request)
{
    // Kiểm tra nếu người dùng đã đăng nhập
    if (!Auth::check()) {
        return redirect()->route('login')->with('error', 'Bạn cần phải đăng nhập để đặt hàng.');
    }

    // Lấy thông tin giỏ hàng từ session
    $cart = session('cart');
    if (!$cart || count($cart) == 0) {
        return redirect()->route('cart.index')->with('error', 'Giỏ hàng của bạn đang trống.');
    }

    // Lấy thông tin khách hàng từ request
    $name = $request->input('name');
    $address = $request->input('address');
    $email = $request->input('email');
    $phone = $request->input('phone');

    // Tính tổng giá trị giỏ hàng
    $totalPrice = array_sum(array_map(function ($item) {
        return $item['price'] * $item['quantity'];
    }, $cart));

    // Kiểm tra nếu có mã giảm giá thì áp dụng
    $discountedPrice = session('discounted_price', $totalPrice);

    // Tạo đơn hàng
    $order = Order::create([
        'user_id' => auth()->id(),
        'name' => $name,
        'address' => $address,
        'email' => $email,
        'phone' => $phone,
        'total_price' => $discountedPrice,
    ]);

    // Duyệt qua giỏ hàng và giảm số lượng sản phẩm
    foreach ($cart as $item) {
        $product = Product::find($item['id']);
        if ($product) {
            if ($product->quantity >= $item['quantity']) {
                $product->quantity -= $item['quantity'];
                $product->save();
            } else {
                return redirect()->route('cart.index')->with('error', 'Sản phẩm ' . $product->name . ' không đủ số lượng trong kho.');
            }
        }
    }

    // Gửi email xác nhận
    try {
        Mail::to($email)->send(new OrderConfirmationMail($order));
    } catch (\Exception $e) {
        return redirect()->route('checkout.success', ['orderId' => $order->id])->with('error', 'Đặt hàng thành công nhưng không thể gửi email xác nhận.');
    }

    // Xóa giỏ hàng và session giảm giá
    session()->forget(['cart', 'discounted_price']);

    // Chuyển hướng đến trang success với mã đơn hàng
    return redirect()->route('checkout.success', ['orderId' => $order->id])->with('success', 'Đơn hàng của bạn đã được đặt thành công!');
}



public function success(Request $request)
{
    // Lấy ID đơn hàng từ route
    $orderId = $request->query('orderId');

    // Tìm đơn hàng trong cơ sở dữ liệu
    $order = Order::find($orderId);

    $user = auth()->user(); // Lấy thông tin user đã đăng nhập
    // Kiểm tra nếu không tìm thấy đơn hàng
    if (!$order) {
        return redirect()->route('index')->with('error', 'Không tìm thấy thông tin đơn hàng.');
    }

    // Trả về View với thông tin đơn hàng
    return view('user.success', compact('order'));
}

    public function viewOrder($orderId)
    {
        // Kiểm tra nếu người dùng đã đăng nhập
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Bạn cần phải đăng nhập để xem đơn hàng.');
        }

        // Lấy người dùng hiện tại
        $user = Auth::user();

        // Lấy đơn hàng của người dùng
        $order = Order::where('user_id', $user->id)->where('id', $orderId)->first();

        // Nếu không tìm thấy đơn hàng
        if (!$order) {
            return redirect()->route('user.orders')->with('error', 'Đơn hàng không tồn tại hoặc bạn không có quyền truy cập.');
        }

        // Trả về view xem đơn hàng
        return view('order.view', compact('order'));
    }
}
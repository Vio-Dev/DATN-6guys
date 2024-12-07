<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Coupon;

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

        // Lấy thông tin khách hàng từ session hoặc request
        $customerInfo = session('customer_info', []);
        $name = $customerInfo['name'] ?? $request->input('name');
        $address = $customerInfo['address'] ?? $request->input('address');
        $email = $customerInfo['email'] ?? $request->input('email');
        $phone = $customerInfo['phone'] ?? $request->input('phone');

        // Tính tổng giá trị giỏ hàng (giả sử mỗi sản phẩm có trường 'price' và 'quantity')
        $totalPrice = array_sum(array_map(function ($item) {
            return $item['price'] * $item['quantity'];
        }, $cart));

        // Kiểm tra nếu có mã giảm giá thì áp dụng, nếu không có thì giữ nguyên tổng giá trị
        $discountedPrice = $totalPrice;

        if ($request->has('coupon_code')) {
            $coupon = Coupon::where('code', $request->input('coupon_code'))->first();

            if ($coupon) {
                // Kiểm tra nếu mã giảm giá hợp lệ
                if ($coupon->usage_limit <= 0) {
                    return redirect()->back()->with('discount_error', 'Mã giảm giá đã hết lượt sử dụng!');
                }

                if ($coupon->end_date < now()) {
                    return redirect()->back()->with('discount_error', 'Mã giảm giá đã hết hạn!');
                }

                // Kiểm tra giá trị tối thiểu đơn hàng để áp dụng giảm giá
                if ($totalPrice < $coupon->minimum_order_value) {
                    return redirect()->back()->with('discount_error', 'Giá trị đơn hàng không đủ để áp dụng mã giảm giá!');
                }

                // Áp dụng giảm giá
                $discountValue = $coupon->discount_value;  // Giảm giá cố định hoặc tính theo phần trăm
                $discountedPrice = $totalPrice - $discountValue;
// Lưu giá trị giảm vào session
                session(['discounted_price' => $discountedPrice]);

                // Giảm số lần sử dụng mã giảm giá
                $coupon->usage_limit -= 1;
                $coupon->save();
            } else {
                return redirect()->back()->with('discount_error', 'Mã giảm giá không hợp lệ!');
            }
        }

        // Tạo đơn hàng
        $order = Order::create([
            'user_id' => auth()->id(),
            'name' => $name,
            'address' => $address,
            'email' => $email,
            'phone' => $phone,
            'total_price' => $discountedPrice,
        ]);

        // Xóa giỏ hàng và session giảm giá
        session()->forget(['cart', 'discounted_price', 'customer_info']);

        return redirect()->route('checkout.success')->with('success', 'Đơn hàng của bạn đã được đặt thành công!');
    }

    public function success()
    {
        return view('user.success'); // Đổi tên view nếu cần
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
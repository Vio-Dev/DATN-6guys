<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin\Product;
use App\Models\Cart;

class CartController extends Controller
{
    // Hiển thị giỏ hàng
    public function index()
    {
        $cart = session()->get('cart', []);
        $cartItemCount = count($cart); // Đếm số lượng sản phẩm trong cart
        $totalPrice = 0;

        foreach ($cart as $item) {
            $totalPrice += $item['price'] * $item['quantity'];
        }

        return view('user.cart', compact('cart', 'cartItemCount', 'totalPrice'));
    }

    // Thêm sản phẩm vào cart
    public function add(Request $request, $itemId)
    {
        // Lấy thông tin sản phẩm từ database 
        $product = Product::findOrFail($itemId);

        // Lấy giỏ hàng từ session
        $cart = session()->get('cart', []);

        // Lấy giá trị số lượng từ request
        $quantity = $request->input('quantity', 1); // Mặc định là 1 nếu không có số lượng

        // Giải mã hình ảnh nếu nó là một chuỗi JSON
        $images = json_decode($product->image);

        // Lấy hình ảnh đầu tiên (hoặc sử dụng mặc định nếu không có)
        $imagePath = is_array($images) && count($images) > 0 ? $images[0] : 'path/to/default-image.jpg';
        // Lấy giá trị số lượng từ request
        $quantity = $request->input('quantity', 1); // Mặc định là 1 nếu không có số lượng
        // Kiểm tra số lượng sản phẩm trong kho
        if ($product->quantity < $quantity) {
            return redirect()->route('cart.index')->with('error', 'Số lượng sản phẩm trong kho không đủ.');
        }

        // Kiểm tra xem sản phẩm đã có trong giỏ hàng hay chưa
        if (isset($cart[$itemId])) {
            // Kiểm tra tổng số lượng khi cộng thêm
            if ($product->quantity < $cart[$itemId]['quantity'] + $quantity) {
                return redirect()->route('cart.index')->with('error', 'Số lượng sản phẩm trong kho không đủ.');
            }
            $cart[$itemId]['quantity'] += $quantity;
        } else {
            // Thêm sản phẩm mới vào giỏ hàng
            $cart[$itemId] = [
                'id' => $itemId,
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => $quantity,
                'image' => $product->image,
            ];
        }

        // Cập nhật giỏ hàng vào session
        session()->put('cart', $cart);

        return redirect()->route('cart.index')->with('success', 'Sản phẩm đã được thêm vào giỏ hàng!');
    }

    // Xóa sản phẩm khỏi giỏ hàng
    public function remove($productId)
    {
        // Lấy giỏ hàng từ session
        $cart = session()->get('cart', []);

        // Kiểm tra xem sản phẩm có trong giỏ không
        if (isset($cart[$productId])) {
            unset($cart[$productId]); // Xóa sản phẩm khỏi giỏ
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.index')->with('success', 'Xóa thành công!');
    }
    
    // Cập nhật số lượng sản phẩm trong giỏ hàng
    public function update(Request $request, $id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $product = Product::findOrFail($id);
            $newQuantity = $request->input('quantity');
    
            if ($product->quantity < $newQuantity) {
                return redirect()->route('cart.index')->with('error', 'Số lượng sản phẩm trong kho không đủ.');
            }
    
            $cart[$id]['quantity'] = $newQuantity;
            session()->put('cart', $cart);
    
            return redirect()->route('cart.index')->with('success', 'Cập nhật số lượng sản phẩm thành công!');
        }
    
        return redirect()->route('cart.index')->with('error', 'Sản phẩm không tồn tại trong giỏ hàng.');
    }
    public function checkout(Request $request)
    {
        return redirect()->route('cart.index')->with('success', 'Đặt hàng thành công!');
    }
}

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
        $cart = session()->get('cart', []);  // Lấy giỏ hàng từ session
        $cartItemCount = count($cart);  // Đếm số lượng sản phẩm trong cart
        $totalPrice = 0;  // Khởi tạo biến tổng giá tiền
    
        foreach ($cart as $item) {
            // Lấy chi tiết sản phẩm từ database dựa trên ID trong giỏ hàng
            $product = Product::find($item['id']);
            if ($product) {
                // Tính giá sau khi giảm giá nếu có
                $price = $product->price;
                if ($product->sale) {
                    $price = $product->price - ($product->price * ($product->sale_percentage / 100));
                }
                $totalPrice += $price * $item['quantity'];  // Tính tổng tiền
            }
        }
    
        // Trả về view giỏ hàng với thông tin sản phẩm và tổng giá
        return view('user.cart', compact('cart', 'cartItemCount', 'totalPrice'));
    }
    // Thêm sản phẩm vào cart
    public function add(Request $request, $itemId)
{
    // Lấy thông tin sản phẩm từ database
    $product = Product::findOrFail($itemId);

    // Lấy giỏ hàng từ session
    $cart = session()->get('cart', []);

    // Lấy số lượng sản phẩm từ request
    $quantity = (int) $request->input('quantity', 1); // Ép kiểu để đảm bảo nhận số lượng đúng

    // Kiểm tra số lượng sản phẩm trong kho
    if ($product->quantity < $quantity) {
        return redirect()->route('cart.index')->with('error', 'Số lượng sản phẩm trong kho không đủ.');
    }

    // Tính giá sản phẩm sau khi giảm giá nếu có
    $price = $product->price;
    if ($product->sale) {
        $price = $product->price - ($product->price * ($product->sale_percentage / 100));
    }

    // Kiểm tra xem sản phẩm đã có trong giỏ hàng chưa
    if (isset($cart[$itemId])) {
        // Kiểm tra số lượng trong giỏ hàng có vượt quá số lượng trong kho không
        if ($product->quantity < $cart[$itemId]['quantity'] + $quantity) {
            return redirect()->route('cart.index')->with('error', 'Số lượng sản phẩm trong kho không đủ.');
        }
        $cart[$itemId]['quantity'] += $quantity; // Cộng dồn số lượng
    } else {
        // Thêm sản phẩm vào giỏ hàng nếu chưa có
        $cart[$itemId] = [
            'id' => $itemId,
            'name' => $product->name,
            'price' => $price,
            'quantity' => $quantity, // Thêm số lượng chính xác từ form
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

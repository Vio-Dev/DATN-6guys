<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wishlist;
use App\Models\admin\Product;

class WishlistController extends Controller
{
    /**
     * Hiển thị danh sách sản phẩm yêu thích của người dùng.
     */
    public function index()
    {
        $wishlists = Wishlist::where('user_id', auth()->id())
            ->with('product') // Lấy thông tin sản phẩm liên kết
            ->get();

        return view('user.wishlist.index', compact('wishlists'));
    }

    /**
     * Thêm sản phẩm vào danh sách yêu thích.
     */
    public function store(Request $request, $productId)
    {
        // Kiểm tra nếu người dùng đã đăng nhập
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Bạn cần đăng nhập để thêm vào yêu thích.');
        }

        // Kiểm tra xem sản phẩm có tồn tại không
        $product = Product::find($productId);

        if (!$product) {
            return redirect()->route('wishlist.index')->with('error', 'Sản phẩm không tồn tại.');
        }

        // Kiểm tra xem sản phẩm đã có trong danh sách yêu thích của người dùng chưa
        $existingWishlist = Wishlist::where('user_id', auth()->id())
            ->where('product_id', $productId)
            ->first();

        if ($existingWishlist) {
            return redirect()->route('wishlist.index')->with('error', 'Sản phẩm này đã có trong danh sách yêu thích!');
        }

        // Thêm sản phẩm vào danh sách yêu thích
        Wishlist::create([
            'user_id' => auth()->id(),
            'product_id' => $productId,
        ]);

        return redirect()->route('wishlist.index')->with('success', 'Sản phẩm đã được thêm vào danh sách yêu thích!');
    }

    /**
     * Xóa sản phẩm khỏi danh sách yêu thích.
     */
    public function destroy($id)
    {
        // Tìm sản phẩm yêu thích thuộc về người dùng hiện tại
        $wishlist = Wishlist::where('user_id', auth()->id())
            ->where('id', $id)
            ->first();

        if (!$wishlist) {
            return back()->with('error', 'Sản phẩm không tồn tại trong danh sách yêu thích!');
        }

        // Xóa sản phẩm khỏi danh sách yêu thích
        $wishlist->delete();

        return back()->with('success', 'Sản phẩm đã được xóa khỏi danh sách yêu thích!');
    }
}

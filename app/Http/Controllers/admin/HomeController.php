<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Product;
use App\Http\Controllers\Controller;
use App\Models\Admin\Orders;
use App\Models\Admin\Orders_item;
use App\Models\Admin\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Lấy tất cả sản phẩm
        $products = Product::take(12)->get();
        // $products = Product::orderBy('id', 'desc')->take(12)->get(); dòng này không được xóa nhé

        // Lấy tất cả danh mục
        $categories = Category::take(4)->get();

        // Lấy 5 bài viết mới nhất
        $posts = Post::latest()->take(5)->get(); 
        // Lấy sản phẩm theo từng danh mục

        $productsByCategory = [];
        foreach ($categories as $category) {
            $productsByCategory[$category->id] = Product::where('category_id', $category->id)->get();
        }

        // Trả về view với cả sản phẩm và sản phẩm theo danh mục
        return view('index', compact('products', 'categories', 'productsByCategory','posts'));
    }
    public function showAll()
    {
        $products = Product::all(); // hoặc lấy sản phẩm theo cách bạn cần
        return view('user.products.showall', compact('product'));
    }
    public function home()
    {
        // Lấy tất cả bài viết
        $posts = Post::all();

        // Trả về view với danh sách bài viết
        return view('index', compact('posts'));  // Tên view có thể là 'index', nếu không hãy đổi theo tên view của bạn
    }
    public function addCart($productId, $quantity)
    {
        $product = Product::findOrFail($productId);
        if (!$product) {
            abort(404, 'Không tìm thấy sản phẩm');
        }
        $order = Orders::firstOrCreate([
            'users_id' => '1',
            'status' => 'no',
        ], [
            'order_date' => now(),
            'tolal' => 0,
        ]);
        $orderDetail = new Orders_item([
            'product_id' => $product->id,
            'quantity' => $quantity,
            'price' => $product->price
        ]);
        $order->order_details()->save($orderDetail);
        $order->update([
            'tolal' => $product->price * $quantity,
        ]);
        return redirect()->route('index')->with('success', 'Thêm sản phẩm thành công');
    }
}

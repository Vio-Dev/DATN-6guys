<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Category;
use App\Models\admin\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }
    public function view()
    {
        $products = $this->product->latest()->paginate(5);
        return view('index', compact('products'));
    }
    public function index()
    {
        $product = Product::all();
        return view('admin.products.index', compact('product'));
    }
    public function add()
    {
        $category = Category::get(['id', 'name']);
        return view('admin.products.add', compact('category'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'price' => 'required|numeric',
            'content' => 'required|string',
            'quantity' => 'required|integer|min:1',
            'category_id' => 'required|exists:categories,id',
            'image.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Kiểm tra định dạng ảnh
        ]);

        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->content = $request->content;
        $product->quantity = $request->quantity;
        $product->category_id = $request->category_id;

        // Lưu nhiều ảnh
        if ($request->hasfile('image')) {
            $images = [];
            foreach ($request->file('image') as $image) {
                $path = $image->store('products', 'public'); // Lưu ảnh vào thư mục public/storage/products
                $images[] = $path; // Lưu đường dẫn vào mảng
            }
            $product->image = json_encode($images); // Chuyển đổi mảng thành JSON để lưu vào CSDL
        }

        $product->save();

        return redirect()->route('admin.products.index')->with('success', 'Product added successfully.');
    }

    public function show($id) // Phương thức hiển thị chi tiết sản phẩm
    {
        // Tìm sản phẩm theo ID
        $product = Product::find($id);
        if (!$product) {
            // Nếu sản phẩm không tồn tại, có thể trả về lỗi 404 hoặc redirect
            return abort(404, 'Sản phẩm không tồn tại');
        }

        // Giải mã chuỗi JSON thành mảng
        $images = json_decode($product->image);
        // Lấy giỏ hàng từ session
        $cart = session()->get('cart', []);

        // Tính số lượng sản phẩm trong giỏ
        $cartItemCount = array_sum(array_column($cart, 'quantity'));

        // Tính tổng giá tiền
        $totalPrice = array_sum(array_map(function ($item) {
            return $item['price'] * $item['quantity'];
        }, $cart));
        $relatedProducts = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)  // Không lấy chính sản phẩm hiện tại
            ->limit(4)  // Hiển thị tối đa 4 sản phẩm liên quan
            ->get();
        // Trả về view với sản phẩm, ảnh, số lượng sản phẩm và tổng giá
        return view('user.products.detail', compact('product', 'images', 'cartItemCount', 'totalPrice', 'relatedProducts'));
    }

    public function edit($id)
    {

        $category = Category::get(['id', 'name']);
        $product = Product::findOrFail($id);
        return view('admin.products.edit', compact('category', 'product'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'price' => 'required|numeric',
            'content' => 'required|string',
            'quantity' => 'required|integer|min:1',
            'category_id' => 'required|exists:categories,id',
            'sale_percentage' => 'nullable|numeric|min:0|max:100', // Kiểm tra tỷ lệ sale
            'image.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Kiểm tra định dạng ảnh
        ]);

        $product = Product::findOrFail($id);
        $product->name = $request->name;
        $product->price = $request->price;
        $product->content = $request->content;
        $product->quantity = $request->quantity;
        $product->category_id = $request->category_id;

        // Kiểm tra và áp dụng tỷ lệ sale
        if ($request->has('sale')) {
            $product->sale = 1; // Đánh dấu sản phẩm đang sale
            $product->sale_percentage = $request->sale_percentage;

            // Tính giá sau giảm
        } else {
            $product->sale = 0; // Không áp dụng sale
            $product->sale_percentage = null; // Xóa tỷ lệ sale
        }

        // Lưu nhiều ảnh (nếu có)
        if ($request->hasfile('image')) {
            $images = [];
            foreach ($request->file('image') as $image) {
                $path = $image->store('products', 'public');
                $images[] = $path;
            }
            $product->image = json_encode($images);
        }

        $product->save();

        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy(string $id)
    {
        $category = Product::destroy($id);
        return redirect()->route('admin.products.index');
    }

    public function layouts(string $id)
    {
        $product = Product::all();
        return redirect()->route('admin.products.index');
    }
    public function stock()
    {
        $products = Product::select('image', 'id', 'name', 'quantity', 'price')->paginate(10); // Hiển thị tên, số lượng và giá
        return view('admin.products.stock', compact('products'));
    }
    public function search(Request $request)
    {
        $query = $request->input('query'); // Lấy từ khóa tìm kiếm từ input của người dùng
        $products = Product::where('name', 'LIKE', "%{$query}%") // Tìm sản phẩm có tên chứa từ khóa
            ->orWhere('content', 'LIKE', "%{$query}%")
            ->get();

        return view('admin.products.search', compact('products', 'query')); // Trả về view với kết quả tìm kiếm
    }
    public function reduceProductQuantity($productId, $quantity)
    {
        $product = Product::find($productId);

        if ($product) {
            if ($product->quantity >= $quantity) {
                $product->quantity -= $quantity; // Giảm số lượng sản phẩm
                $product->save(); // Lưu lại thay đổi
            } else {
                // Nếu số lượng sản phẩm không đủ, có thể thông báo lỗi hoặc xử lý khác
                throw new \Exception("Không đủ sản phẩm trong kho.");
            }
        }
    }
}

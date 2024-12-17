<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use App\Models\Admin\Product;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    protected $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }
    public function view()
    {
        $products = Product::latest()->take(6)->get();
        return view('index', compact('products'));
    }
    public function index()
    {
        $product = Product::all();
        // $product = Product::orderBy('id', 'desc')->get(); // dòng này không được xóa 
        return view('admin.products.index', compact('product'));
    }
    public function add()
    {
        $category = Category::get(['id', 'name']);
        return view('admin.products.add', compact('category'));
    }
    public function store(ProductRequest $request)
    {
        try {
            // Dữ liệu đã được validate tự động thông qua ProductRequest
            $validatedData = $request->validated();

            $product = new Product();
            $product->name = $validatedData['name'];
            $product->price = $validatedData['price'];
            $product->content = $validatedData['content'];
            $product->quantity = $validatedData['quantity'];
            $product->category_id = $validatedData['category_id'];
            $product->sale = $request->has('sale');
            $product->sale_percentage = $request->has('sale') ? $validatedData['sale_percentage'] : null;

            // Xử lý upload nhiều ảnh
            if ($request->hasFile('image')) {
                $images = [];
                foreach ($request->file('image') as $image) {
                    $path = $image->store('products', 'public');
                    $images[] = $path;
                }
                $product->image = json_encode($images);
            }

            $product->save();

            return redirect()
                ->route('admin.products.index')
                ->with('success', 'Thêm sản phẩm thành công');

        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Có lỗi xảy ra khi thêm sản phẩm: ' . $e->getMessage());
        }
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

    public function update(ProductRequest $request, $id)
    {
        try {
            $validatedData = $request->validated();

            $product = Product::findOrFail($id);
            $product->name = $validatedData['name'];
            $product->price = $validatedData['price'];
            $product->content = $validatedData['content'];
            $product->quantity = $validatedData['quantity'];
            $product->category_id = $validatedData['category_id'];

            // Xử lý sale
            if ($request->has('sale')) {
                $product->sale = true;
                $product->sale_percentage = $validatedData['sale_percentage'];
            } else {
                $product->sale = false;
                $product->sale_percentage = null;
            }

            // Xử lý upload ảnh mới (nếu có)
            if ($request->hasFile('image')) {
                // Xóa ảnh cũ
                $oldImages = json_decode($product->image, true);
                if ($oldImages) {
                    foreach ($oldImages as $oldImage) {
                        Storage::disk('public')->delete($oldImage);
                    }
                }

                // Upload ảnh mới
                $images = [];
                foreach ($request->file('image') as $image) {
                    $path = $image->store('products', 'public');
                    $images[] = $path;
                }
                $product->image = json_encode($images);
            }

            $product->save();

            return redirect()
                ->route('admin.products.index')
                ->with('success', 'Cập nhật sản phẩm thành công');

        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Có lỗi xảy ra khi cập nhật sản phẩm: ' . $e->getMessage());
        }
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
    public function showAll(Request $request)
    {

        $products = Product::paginate(6); // Hiển thị 12 sản phẩm mỗi trang
        return view('user.products.showall', compact('products'));
    }
}

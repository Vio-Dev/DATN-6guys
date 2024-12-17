<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use App\Models\Admin\Product;
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
    public function store(Request $request)

{
    $request->validate([
        'name' => 'required|string|max:100|unique:products,name',
        'price' => 'required|numeric',
        'content' => 'required|string',
        'quantity' => 'required|integer|min:1',
        'category_id' => 'required|exists:categories,id',
        'image.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        'sale_percentage' => 'nullable|integer|min:1|max:100',
    ], [
        // Tùy chỉnh thông báo lỗi
        'name.unique' => 'Tên sản phẩm đã tồn tại, vui lòng chọn tên khác.',
        'name.required' => 'Vui lòng nhập tên sản phẩm.',
        'price.required' => 'Vui lòng nhập giá sản phẩm.',
        'content.required' => 'Vui lòng nhập nội dung mô tả sản phẩm.',
        'quantity.required' => 'Vui lòng nhập số lượng sản phẩm.',
        'category_id.required' => 'Vui lòng chọn danh mục sản phẩm.',
    ]);

    $product = new Product();
    $product->name = $request->name;
    $product->price = $request->price;
    $product->content = $request->content;
    $product->quantity = $request->quantity;
    $product->category_id = $request->category_id;
    $product->sale = $request->has('sale'); // true nếu "Đang Sale" được chọn
    $product->sale_percentage = $request->input('sale_percentage') ?? null;

    // Lưu nhiều ảnh
    if ($request->hasfile('image')) {
        $images = [];
        foreach ($request->file('image') as $image) {
            $path = $image->store('products', 'public'); // Lưu ảnh vào thư mục public/storage/products
            $images[] = $path; // Lưu đường dẫn vào mảng

    {
        // Xác thực dữ liệu
        $validatedData = $request->validate([
            'name' => 'required|string|max:100',
            'price' => 'required|numeric',
            'content' => 'required|string',
            'quantity' => 'required|integer|min:1',
            'category_id' => 'required|exists:categories,id',
            'image.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'sale_percentage' => 'nullable|integer|min:1|max:100',
        ], [
            'required' => ':attribute không được để trống.',
            'string' => ':attribute phải là chuỗi ký tự.',
            'numeric' => ':attribute phải là số.',
            'integer' => ':attribute phải là số nguyên.',
            'min' => ':attribute phải lớn hơn hoặc bằng :min.',
            'max' => ':attribute không được vượt quá :max.',
            'exists' => ':attribute không hợp lệ.',
            'image' => ':attribute phải là một tệp hình ảnh.',
            'mimes' => ':attribute phải có định dạng: :values.',
        ], [
            'name' => 'Tên sản phẩm',
            'price' => 'Giá',
            'content' => 'Nội dung',
            'quantity' => 'Số lượng',
            'category_id' => 'Danh mục',
            'image' => 'Hình ảnh',
            'sale_percentage' => 'Phần trăm giảm giá',
        ]);


        $product = new Product();
        $product->name = $validatedData['name'];
        $product->price = $validatedData['price'];
        $product->content = $validatedData['content'];
        $product->quantity = $validatedData['quantity'];
        $product->category_id = $validatedData['category_id'];
        $product->sale = $request->has('sale');
        $product->sale_percentage = $request->has('sale') ? $validatedData['sale_percentage'] : null;

        // Lưu nhiều ảnh
        if ($request->hasfile('image')) {
            $images = [];
            foreach ($request->file('image') as $image) {
                $path = $image->store('products', 'public');
                $images[] = $path;
            }
            $product->image = json_encode($images);

        }
        $product->image = json_encode($images); // Chuyển đổi mảng thành JSON để lưu vào CSDL
    }


    $product->save();

    return redirect()->route('admin.products.index')->with('success', 'Sản phẩm đã được thêm thành công.');
}


        $product->save();
        session()->flash('success', 'Thêm sản phẩm thành công');
        return redirect()->route('admin.products.index', compact('product'));
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

        return redirect()->route('admin.products.index')->with('success', 'Sản phẩm đã được cập nhật thành công.');
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

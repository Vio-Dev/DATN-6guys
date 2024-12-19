<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use App\Models\Admin\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    protected $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    // Display latest 6 products
    public function view()
    {
        $products = Product::latest()->take(6)->get();  
        return view('index', compact('products'));
    }

    // Display all products
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    // Show form to add a product
    public function add()
    {
        // $categories = Category::select('id', 'name')->get();
        // $categories = Category::select('id', 'name')->get();
        $categories = Category::get(['id', 'name']);

        return view('admin.products.add', compact('categories'));
    }

    // Store a new product
    public function store(Request $request)
    {
        try {
            $validatedData = $this->validateRequest($request);

            $product = new Product($validatedData);
            $product->sale = $request->has('sale');
            $product->sale_percentage = $request->has('sale') ? $validatedData['sale_percentage'] : null;

            if ($request->hasFile('image')) {
                $product->image = json_encode($this->uploadImages($request->file('image')));
            }

            $product->save();

            return redirect()->route('admin.products.index')->with('success', 'Sản phẩm đã được thêm thành công.');
        } catch (\Exception $e) {
            return back()->withInput()->with('error', 'Lỗi: ' . $e->getMessage());
        }
    }

    // Show product details
    public function show($id)
    {
        $product = Product::findOrFail($id);
        $images = json_decode($product->image, true);

        $cart = session()->get('cart', []);
        $cartItemCount = array_sum(array_column($cart, 'quantity'));
        $totalPrice = array_sum(array_map(fn($item) => $item['price'] * $item['quantity'], $cart));

        $relatedProducts = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->limit(4)->get();

        return view('user.products.detail', compact('product', 'images', 'cartItemCount', 'totalPrice', 'relatedProducts'));
    }

    // Show form to edit a product
    public function edit($id)
    {
        $categories = Category::select('id', 'name')->get();
        $product = Product::findOrFail($id);

        return view('admin.products.edit', compact('categories', 'product'));
    }

    // Update a product
    public function update(Request $request, $id)
    {
        try {
            $validatedData = $this->validateRequest($request);
$product = Product::findOrFail($id);
            $product->fill($validatedData);
            $product->sale = $request->has('sale');
            $product->sale_percentage = $request->has('sale') ? $validatedData['sale_percentage'] : null;

            if ($request->hasFile('image')) {
                $this->deleteOldImages($product->image);
                $product->image = json_encode($this->uploadImages($request->file('image')));
            }

            $product->save();

            return redirect()->route('admin.products.index')->with('success', 'Cập nhật sản phẩm thành công.');
        } catch (\Exception $e) {
            return back()->withInput()->with('error', 'Lỗi: ' . $e->getMessage());
        }
    }

    // Delete a product
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $this->deleteOldImages($product->image);
        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Sản phẩm đã được xóa thành công.');
    }

    // Display stock of products
    public function stock()
    {
        $products = Product::select('id', 'name', 'quantity', 'price', 'image')->paginate(10);
        return view('admin.products.stock', compact('products'));
    }

    // Search products
    public function search(Request $request)
    {
        $query = $request->input('query');
        $products = Product::where('name', 'LIKE', "%{$query}%")
            ->orWhere('content', 'LIKE', "%{$query}%")
            ->get();

        return view('admin.products.search', compact('products', 'query'));
    }

    // Display all products (paginated)
    public function showAll()
    {
        $products = Product::paginate(6);
        return view('user.products.showall', compact('products'));
    }

    // Utility: Validate request data
    private function validateRequest(Request $request)
    {
        return $request->validate([
            'name' => 'required|string|max:100|unique:products,name,' . ($request->id ?? ''),
            'price' => 'required|numeric',
            'content' => 'required|string',
            'quantity' => 'required|integer|min:1',
            'category_id' => 'required|exists:categories,id',
            'image.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'sale_percentage' => 'nullable|integer|min:1|max:100',
        ]);
    }

    // Utility: Upload multiple images
    private function uploadImages($images)
    {
        return array_map(fn($image) => $image->store('products', 'public'), $images);
    }

    // Utility: Delete old images
    private function deleteOldImages($imagesJson)
    {
        $images = json_decode($imagesJson, true);
        if ($images) {
            foreach ($images as $image) {
                Storage::disk('public')->delete($image);
            }
        }
    }
}
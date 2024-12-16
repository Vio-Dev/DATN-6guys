<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Post;


class PostController extends Controller
{
    // Hiển thị danh sách bài viết cho admin
    public function index()
    {
        $posts = Post::all();
        return view('admin.blog.index', compact('posts'));
    }
    // Hiển thị danh sách bài viết cho người dùng
    public function list()
    {
        $posts = Post::all();
        return view('user.blog.index', compact('posts'));
    }
    // Hiển thị chi tiết bài viết
    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('user.blog.show', compact('post'));
    }

    // Hiển thị form tạo bài viết mới
    public function create()
    {
        return view('admin.blog.add');
    }

    // Xử lý lưu bài viết mới
    public function store(Request $request)
<<<<<<< Updated upstream
    {
        // Validate the incoming request
        $this->validatePost($request);

        // Xử lý ảnh bìa (cover image)
        $featured_image = $this->uploadImage($request, 'cover_image', 'featured_images');

        // Xử lý ảnh trong nội dung
        $image_in_content = $this->uploadImage($request, 'image_in_content', 'images_in_content');

        // Lưu bài viết mới vào database
        Post::create([
            'title' => $request->title,
            'short_description' => $request->short_description,
            'content' => $request->content,
            'author' => $request->author,
            'featured_image' => $featured_image, // Nếu không có ảnh thì sẽ lưu null
            'image_in_content' => $image_in_content, // Nếu không có ảnh thì sẽ lưu null
        ]);
=======
{
    $this->validatePost($request);

    // Xử lý ảnh bìa
    $featured_image = $this->uploadImage($request, 'featured_image', 'featured_images');
    
    // Xử lý ảnh trong nội dung
    $image_in_content = $this->uploadImage($request, 'image_in_content', 'images_in_content');

    // Lưu bài viết mới vào database
    $post = Post::create([
        'title' => $request->title,
        'short_description' => $request->short_description,
        'content' => $request->content,
        'author' => $request->author,
        'featured_image' => $featured_image ?: '',
        'image_in_content' => $image_in_content ?: ''
    ]);
>>>>>>> Stashed changes

    // Chuyển hướng về danh sách bài viết hoặc trang chi tiết bài viết
    return redirect()->route('admin.blog.index')->with('success', 'Bài viết đã được thêm!');
}


    // Hiển thị form sửa bài viết
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('admin.blog.edit', compact('post'));
    }

    // Xử lý cập nhật bài viết
    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);

        $this->validatePost($request);

        // Xử lý ảnh bìa
<<<<<<< Updated upstream
        $featured_image = $this->uploadImage($request, 'featured_image', 'featured_images', $post->featured_image);

=======
        $featured_image = $this->uploadImage($request, 'featured_image', 'featured_images');
        
>>>>>>> Stashed changes
        // Xử lý ảnh trong nội dung
        $image_in_content = $this->uploadImage($request, 'image_in_content', 'images_in_content', $post->image_in_content);

        // Cập nhật bài viết
        $post->update([
            'title' => $request->title,
            'short_description' => $request->short_description, // Mô tả ngắn
            'content' => $request->content,
            'author' => $request->author,
            'featured_image' => $featured_image,
            'image_in_content' => $image_in_content
        ]);

        return redirect()->route('admin.blog.index')->with('success', 'Bài viết đã được cập nhật!');
    }

    // Xử lý xóa bài viết
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->route('admin.blog.index')->with('success', 'Bài viết đã được xóa!');
    }

    // Phương thức validate bài viết
    private function validatePost(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:3000',  // Tiêu đề bắt buộc, là chuỗi và không vượt quá 3000 ký tự
            'short_description' => 'nullable|string|max:50000',  // Mô tả ngắn không bắt buộc, nếu có thì phải là chuỗi và không quá 50000 ký tự
            'content' => 'required',  // Nội dung bắt buộc
            'author' => 'required|string|max:255',  // Tác giả bắt buộc, là chuỗi và không quá 255 ký tự
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',  // Hình ảnh bìa không bắt buộc, phải là ảnh với định dạng jpeg, png, jpg, gif, svg và dung lượng không quá 2MB
            'image_in_content' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',  // Hình ảnh trong nội dung không bắt buộc, phải là ảnh với định dạng jpeg, png, jpg, gif, svg và dung lượng không quá 2MB
            'images' => 'nullable|array',  // Các hình ảnh trong bài viết không bắt buộc, nếu có phải là mảng
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',  // Kiểm tra từng hình ảnh trong mảng có định dạng hợp lệ
        ], [
            'required' => ':attribute không được để trống',  // Thông báo khi trường không được điền
            'string' => ':attribute phải là chuỗi ký tự',  // Thông báo khi trường không phải là chuỗi
            'max' => ':attribute không được vượt quá :max ký tự',  // Thông báo khi trường vượt quá giới hạn ký tự
            'image' => ':attribute phải là một file hình ảnh hợp lệ',  // Thông báo khi file không phải là hình ảnh
            'mimes' => ':attribute phải có định dạng: :values',  // Thông báo khi định dạng file không hợp lệ
            'array' => ':attribute phải là một mảng',  // Thông báo khi trường không phải là mảng
        ], [
            'title' => 'Tiêu đề',  // Tên trường hiển thị khi thông báo lỗi
            'short_description' => 'Mô tả ngắn',  // Tên trường hiển thị khi thông báo lỗi
            'content' => 'Nội dung',  // Tên trường hiển thị khi thông báo lỗi
            'author' => 'Tác giả',  // Tên trường hiển thị khi thông báo lỗi
            'cover_image' => 'Hình ảnh bìa',  // Tên trường hiển thị khi thông báo lỗi
            'image_in_content' => 'Hình ảnh trong bài viết',  // Tên trường hiển thị khi thông báo lỗi
            'images' => 'Các hình ảnh trong bài viết',  // Tên trường hiển thị khi thông báo lỗi
        ]);
    }

<<<<<<< Updated upstream

    // Phương thức xử lý upload ảnh
    private function uploadImage(Request $request, $fieldName, $folder, $default = null)
    {
        if ($request->hasFile($fieldName)) {
            // Lưu file với tên duy nhất
            $fileName = time() . '_' . $request->file($fieldName)->getClientOriginalName();
            $filePath = $request->file($fieldName)->storeAs("public/{$folder}", $fileName);

            // Trả về đường dẫn tương đối (bỏ 'public/')
            return str_replace('public/', '', $filePath);
        }

        // Nếu không có ảnh mới, trả về giá trị mặc định (hoặc null)
        return $default;
=======
// Phương thức xử lý upload ảnh
private function uploadImage(Request $request, $fieldName, $folder, $default = null)
{
    if ($request->hasFile($fieldName)) {
        // Lưu file với tên duy nhất
        $fileName = time() . '_' . $request->file($fieldName)->getClientOriginalName();
        $filePath = $request->file($fieldName)->storeAs("public/{$folder}", $fileName);
        
        // Trả về đường dẫn tương đối (bỏ 'public/')
        return str_replace('public/', '', $filePath);
>>>>>>> Stashed changes
    }

    // Nếu không có ảnh mới, trả về giá trị mặc định (hoặc null)
    return $default;
}
}

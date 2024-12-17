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

        // Chuyển hướng về danh sách bài viết hoặc trang chi tiết bài viết
        return redirect()->route('admin.blog.index', compact('post'))->with('success', 'Bài viết đã được thêm!');
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
        $featured_image = $this->uploadImage($request, 'featured_image', 'featured_images');

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
        $request->validate(
            [
                'title' => 'required|string|max:3000',
                'short_description' => 'nullable|string|max:50000', // Mô tả ngắn
                'content' => 'required',
                'author' => 'required|string|max:255',
                'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'image_in_content' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ],
            [
                'required' => ':attribute không được để trống.',
                'string' => ':attribute phải là chuỗi ký tự.',
                'max' => ':attribute không được vượt quá :max ký tự.',
                'image' => ':attribute phải là một tệp hình ảnh.',
                'mimes' => ':attribute phải có định dạng: :values.',
            ],
            [
                'title' => 'Tiêu đề',
                'short_description' => 'Mô tả ngắn',
                'content' => 'Nội dung',
                'author' => 'Tác giả',
                'featured_image' => 'Hình ảnh nổi bật',
                'image_in_content' => 'Hình ảnh trong nội dung',
            ]
        );
    }

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
    }
}

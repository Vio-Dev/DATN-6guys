<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Post;

// class PostController extends Controller
// {
//     public function index()
//     {
//         $posts = Post::all();
//         return view('admin.blog.index', compact('posts'));
//     }
//     public function list()
//     {
//         // Lấy tất cả bài viết
//         $posts = Post::all();

//         // Trả về view danh sách bài viết
//         return view('user.blog.index', compact('posts'));
//     }
//     public function show($id)
//     {
//         // Lấy bài viết theo id
//         $post = Post::findOrFail($id);

//         // Trả về view chi tiết bài viết
//         return view('user.blog.show', compact('post'));
//     }
//     public function create()
//     {
//         return view('admin.blog.add');
//     }

//     public function store(Request $request)
//     {
//         $request->validate([
//             'title' => 'required|string|max:255',
//             'content' => 'required',
//             'author' => 'required|string|max:255',
//             'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
//             'image_in_content' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
//         ]);

//         $featured_image = $request->file('featured_image') ? $request->file('featured_image')->store('public/featured_images') : null;
//         $image_in_content = $request->file('image_in_content') ? $request->file('image_in_content')->store('public/images_in_content') : null;

//         Post::create([
//             'title' => $request->title,
//             'content' => $request->content,
//             'author' => $request->author,
//             'featured_image' => $featured_image,
//             'image_in_content' => $image_in_content
//         ]);

//         return redirect()->route('admin.blog.index');
//     }
//     public function edit($id)
//     {
//         $post = Post::findOrFail($id);
//         return view('admin.blog.edit', compact('post'));
//     }

//     public function update(Request $request, $id)
//     {
//         $post = Post::findOrFail($id);

//         $request->validate([
//             'title' => 'required|string|max:255',
//             'content' => 'required',
//             'author' => 'required|string|max:255',
//             'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
//             'image_in_content' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
//         ]);

//         // Xử lý ảnh bìa
//         $featured_image = $request->file('featured_image') ? $request->file('featured_image')->store('public/featured_images') : $post->featured_image;

//         // Xử lý các hình ảnh trong nội dung
//         $image_in_content = $request->file('image_in_content')
//             ? $request->file('image_in_content')->store('public/images_in_content')
//             : $post->image_in_content;

//         // Cập nhật bài viết
//         $post->update([
//             'title' => $request->title,
//             'content' => $request->content,
//             'author' => $request->author,
//             'featured_image' => $featured_image,
//             'image_in_content' => $image_in_content
//         ]);

//         return redirect()->route('admin.blog.index')->with('success', 'Bài viết đã được cập nhật!');
//     }
//     public function destroy($id)
//     {
//         $post = Post::findOrFail($id);
//         $post->delete();
//         return redirect()->route('admin.blog.index');
//     }
// }
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
        Post::create([
            'title' => $request->title,
            'short_description' => $request->short_description, // Mô tả ngắn
            'content' => $request->content,
            'author' => $request->author,
            'featured_image' => $featured_image,
            'image_in_content' => $image_in_content
        ]);

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
        $featured_image = $this->uploadImage($request, 'featured_image', 'featured_images', $post->featured_image);
        
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
            'title' => 'required|string|max:255',
            'short_description' => 'nullable|string|max:500', // Mô tả ngắn
            'content' => 'required',
            'author' => 'required|string|max:255',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image_in_content' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    }

    // Phương thức xử lý upload ảnh
    private function uploadImage(Request $request, $fieldName, $folder, $default = null)
    {
        if ($request->hasFile($fieldName)) {
            // Nếu có ảnh mới, lưu ảnh và trả về đường dẫn
            return $request->file($fieldName)->store("public/{$folder}");
        }

        // Nếu không có ảnh mới, trả về giá trị mặc định (hoặc null)
        return $default;
    }
}


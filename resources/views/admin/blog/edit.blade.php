<!-- resources/views/admin/blog/edit.blade.php -->
@extends('admin.layouts.app')
@section('content')

<div class="page-body">

    <div class="container">
        <h2>Chỉnh Sửa Bài Viết</h2>
        <form action="{{ route('admin.blog.update', $post->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')


                    <!-- Tiêu Đề -->
                    <div class="mb-4 row align-items-center">
                        <label class="form-label-title col-sm-2 mb-0">Tiêu Đề</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="title" placeholder="Nhập tiêu đề bài viết" value="{{ old('title', $post->title) }}" required>
                        </div>
                    </div>

                    <!-- Mô tả ngắn -->
                    <div class="mb-4 row align-items-center">
                        <label class="form-label-title col-sm-2 mb-0">Mô Tả Ngắn</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="short_description" rows="2"
                                placeholder="Nhập mô tả ngắn bài viết" required>{{ old('short_description', $post->short_description) }}</textarea>
                        </div>
                    </div>

                    <!-- Nội Dung -->
                    <div class="mb-4 row align-items-center">
                        <label class="form-label-title col-sm-2 mb-0">Nội Dung</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="content" rows="5"
                                placeholder="Nhập nội dung bài viết" required>{{ old('content', $post->content) }}</textarea>
                        </div>
                    </div>

                    <!-- Tên Tác Giả -->
                    <div class="mb-4 row align-items-center">
                        <label class="form-label-title col-sm-2 mb-0">Tên Tác Giả</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="author"
                                placeholder="Nhập tên tác giả" value="{{ old('author', $post->author) }}" required>
                        </div>
                    </div>

                    
                    <!-- Hình Ảnh Bìa -->
                    <div class="mb-4 row align-items-center">
                        <label class="form-label-title col-sm-2 mb-0">Hình Ảnh Bìa</label>
                        <div class="col-sm-10">
                            @if ($post->featured_image)
                                <div class="mb-2">
                                    <!-- Hiển thị ảnh cũ nếu có -->
                                    <img src="{{ Storage::url($post->featured_image) }}" alt="Cover Image" 
                                        style="width: 150px; height: auto; object-fit: cover;" class="rounded">
                                </div>
                            @endif
                            <!-- Input file cho việc chọn ảnh mới -->
                            <input type="file" class="form-control" name="featured_image" accept="image/*" onchange="previewCoverImage()">
                        </div>
                    </div>

                    <!-- Xem Trước Ảnh Bìa -->
                    <div class="mb-4 row align-items-center">
                        <label class="form-label-title col-sm-2 mb-0">Xem Trước Ảnh Bìa</label>
                        <div class="col-sm-10" id="coverImagePreview">
                            <!-- Ảnh xem trước sẽ hiển thị ở đây khi người dùng chọn ảnh mới -->
                        </div>
                    </div>

                    <!-- Hình Ảnh Trong Bài Viết -->
                    <div class="mb-4 row align-items-center">
                        <label class="form-label-title col-sm-2 mb-0">Hình Ảnh Trong Bài Viết</label>
                        <div class="col-sm-10">
                            @if (!empty($post->image_in_content) && is_array(json_decode($post->image_in_content, true)))
                                <div class="d-flex flex-wrap mb-2">
                                    @foreach (json_decode($post->image_in_content) as $image)
                                        <div class="preview-image-wrapper" style="position: relative; margin: 5px;">
                                            <img src="{{ Storage::url($image) }}" alt="Post Image"
                                                style="width: 100px; height: auto; object-fit: cover; border: 1px solid #ccc;">
                                            <button type="button"
                                                class="btn btn-danger btn-sm remove-image"
                                                style="position: absolute; top: -5px; right: -5px;"
                                                data-image-id="{{ $image }}">X</button>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <p>Chưa có hình ảnh nào được tải lên.</p>
                            @endif
                            <input type="file" class="form-control" name="image_in_content[]" multiple accept="image/*"
                                onchange="previewImages()">
                        </div>
                    </div>

                    <!-- Nút Lưu -->
                    <div class="text-center mt-3">
                        <button type="submit" class="btn btn-primary px-4 py-2">Cập Nhật Bài Viết</button>
                    </div>
                </form>

            </div>
                <!-- mô tả ngắn -->
                <div class="form-group">
                    <label for="short_description">mô tả ngắn</label>
                    <textarea class="form-control" id="short_description" name="short_description" rows="5" required>{{ old('short_description', $post->short_description) }}</textarea>
                </div>
            <!-- Nội Dung -->
            <div class="form-group">
                <label for="content">Nội Dung</label>
                <textarea class="form-control" id="content" name="content" rows="5" required>{{ old('content', $post->content) }}</textarea>
            </div>

    <div class="container-fluid">
    <div class="container my-5">
        <h2 class="text-center mb-4">Chỉnh Sửa Bài Viết</h2>
        <div class="card shadow-sm">
            <div class="card-body">
                <form action="{{ route('admin.blog.update', $post->id) }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                    @csrf
                    @method('PUT')

                    <!-- Tiêu Đề -->
                    <div class="mb-4 row align-items-center">
                        <label class="form-label-title col-sm-2 mb-0">Tiêu Đề</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="title" placeholder="Nhập tiêu đề bài viết" value="{{ old('title', $post->title) }}" required>
                        </div>
                    </div>

                    <!-- Mô tả ngắn -->
                    <div class="mb-4 row align-items-center">
                        <label class="form-label-title col-sm-2 mb-0">Mô Tả Ngắn</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="short_description" rows="2"
                                placeholder="Nhập mô tả ngắn bài viết" required>{{ old('short_description', $post->short_description) }}</textarea>
                        </div>
                    </div>

                    <!-- Nội Dung -->
                    <div class="mb-4 row align-items-center">
                        <label class="form-label-title col-sm-2 mb-0">Nội Dung</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="content" rows="5"
                                placeholder="Nhập nội dung bài viết" required>{{ old('content', $post->content) }}</textarea>
                        </div>
                    </div>

                    <!-- Tên Tác Giả -->
                    <div class="mb-4 row align-items-center">
                        <label class="form-label-title col-sm-2 mb-0">Tên Tác Giả</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="author"
                                placeholder="Nhập tên tác giả" value="{{ old('author', $post->author) }}" required>
                        </div>
                    </div>

                    
                    <!-- Hình Ảnh Bìa -->
                    <div class="mb-4 row align-items-center">
                        <label class="form-label-title col-sm-2 mb-0">Hình Ảnh Bìa</label>
                        <div class="col-sm-10">
                            @if ($post->featured_image)
                                <div class="mb-2">
                                    <!-- Hiển thị ảnh cũ nếu có -->
                                    <img src="{{ Storage::url($post->featured_image) }}" alt="Cover Image" 
                                        style="width: 150px; height: auto; object-fit: cover;" class="rounded">
                                </div>
                            @endif
                            <!-- Input file cho việc chọn ảnh mới -->
                            <input type="file" class="form-control" name="featured_image" accept="image/*" onchange="previewCoverImage()">
                        </div>
                    </div>

                    <!-- Xem Trước Ảnh Bìa -->
                    <div class="mb-4 row align-items-center">
                        <label class="form-label-title col-sm-2 mb-0">Xem Trước Ảnh Bìa</label>
                        <div class="col-sm-10" id="coverImagePreview">
                            <!-- Ảnh xem trước sẽ hiển thị ở đây khi người dùng chọn ảnh mới -->
                        </div>
                    </div>

                    <!-- Hình Ảnh Trong Bài Viết -->
                    <div class="mb-4 row align-items-center">
                        <label class="form-label-title col-sm-2 mb-0">Hình Ảnh Trong Bài Viết</label>
                        <div class="col-sm-10">
                            @if (!empty($post->image_in_content) && is_array(json_decode($post->image_in_content, true)))
                                <div class="d-flex flex-wrap mb-2">
                                    @foreach (json_decode($post->image_in_content) as $image)
                                        <div class="preview-image-wrapper" style="position: relative; margin: 5px;">
                                            <img src="{{ Storage::url($image) }}" alt="Post Image"
                                                style="width: 100px; height: auto; object-fit: cover; border: 1px solid #ccc;">
                                            <button type="button"
                                                class="btn btn-danger btn-sm remove-image"
                                                style="position: absolute; top: -5px; right: -5px;"
                                                data-image-id="{{ $image }}">X</button>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <p>Chưa có hình ảnh nào được tải lên.</p>
                            @endif
                            <input type="file" class="form-control" name="image_in_content[]" multiple accept="image/*"
                                onchange="previewImages()">
                        </div>
                    </div>

                    <!-- Nút Lưu -->
                    <div class="text-center mt-3">
                        <button type="submit" class="btn btn-primary px-4 py-2">Cập Nhật Bài Viết</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
</div>


@endsection
<script>
    // JavaScript để xem trước ảnh khi người dùng chọn
    function previewCoverImage() {
        const file = document.querySelector('input[name="featured_image"]').files[0]; // Lấy file ảnh đã chọn
        const previewContainer = document.getElementById('coverImagePreview'); // Vùng xem trước ảnh

        if (file) {
            const reader = new FileReader(); // Đọc file ảnh

            reader.onloadend = function () {
                // Tạo một phần tử img và hiển thị ảnh xem trước
                let imgElement = document.createElement('img');
                imgElement.src = reader.result; // Đặt đường dẫn cho ảnh xem trước
                imgElement.style.width = '150px';
                imgElement.style.height = 'auto';
                imgElement.style.objectFit = 'cover';
                imgElement.classList.add('rounded');
                previewContainer.innerHTML = ''; // Xóa nội dung cũ trong vùng xem trước
                previewContainer.appendChild(imgElement); // Thêm ảnh vào vùng xem trước
            }

            reader.readAsDataURL(file); // Đọc file ảnh
        }
    }
</script>
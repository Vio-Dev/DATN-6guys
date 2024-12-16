@extends('admin.layouts.app')
{"hello"}
@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="title-header">
                <h5>Thêm Bài Viết</h5>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                               
                                <div class="card-body">
                                    <form action="{{ route('admin.blog.store') }}" method="POST"
                                        enctype="multipart/form-data" class="theme-form theme-form-2 mega-form">
                                        @csrf
                                        <!-- Tiêu Đề -->
                                        <div class="mb-4 row align-items-center">
                                            <label class="form-label-title col-sm-2 mb-0">Tiêu Đề</label>
                                            <div class="col-sm-10">
                                                <input class="form-control @error('title') is-invalid @enderror"
                                                    type="title" name="title" placeholder="Nhập tiêu đề bài viết"
                                                    value="{{ old('title') }}" required>
                                                @error('title')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- Mô Tả Ngắn -->
                                        <div class="mb-4 row align-items-center">
                                            <label class="form-label-title col-sm-2 mb-0">Mô tả ngắn</label>
                                            <div class="col-sm-10">
                                                <input class="form-control @error('short_description') is-invalid @enderror"
                                                    type="text" name="short_description"
                                                    placeholder="Nhập mô tả bài viết"
                                                    value="{{ old('short_description') }}">
                                                @error('short_description')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- Nội Dung -->
                                        <div class="mb-4 row align-items-center">
                                            <label class="form-label-title col-sm-2 mb-0">Nội Dung</label>
                                            <div class="col-sm-10">
                                                <textarea class="form-control @error('content') is-invalid @enderror" name="content" rows="5"
                                                    placeholder="Nhập nội dung bài viết">{{ old('content') }}</textarea>
                                                @error('content')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- Tên Tác Giả -->
                                        <div class="mb-4 row align-items-center">
                                            <label class="form-label-title col-sm-2 mb-0">Tên Tác Giả</label>
                                            <div class="col-sm-10">
                                                <input class="form-control @error('author') is-invalid @enderror"
                                                    type="text" name="author" placeholder="Nhập tên tác giả"
                                                    value="{{ old('author') }}" required>
                                                @error('author')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- Hình Ảnh Bìa -->
                                        <div class="mb-4 row align-items-center">
                                            <label class="form-label-title col-sm-2 mb-0">Hình Ảnh Bìa</label>
                                            <div class="col-sm-10">
                                                <input class="form-control @error('cover_image') is-invalid @enderror"
                                                    type="file" name="cover_image" accept="image/*"
                                                    onchange="previewCoverImage()">
                                                @error('cover_image')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror


                                                @if (old('featured_image') || (isset($post) && $post->featured_image))
                                                    <div class="mb-2">
                                                        <img src="{{ isset($post) && $post->featured_image ? Storage::url($post->featured_image) : old('featured_image') }}" 
                                                            alt="Cover Image" style="width: 150px; height: auto; object-fit: cover;" class="rounded">
                                                    </div>
                                                @endif
                                                <input type="file" class="form-control" name="featured_image" accept="image/*" onchange="previewCoverImage()">
                                            </div>
                                        </div>

                                        <!-- Xem Trước Ảnh Bìa -->
                                        <div class="mb-4 row align-items-center">
                                            <label class="form-label-title col-sm-2 mb-0">Xem Trước Ảnh Bìa</label>
                                            <div class="col-sm-10" id="coverImagePreview">
                                                <!-- Xem trước hình ảnh sẽ hiển thị ở đây -->
                                            </div>
                                        </div>

                                        <!-- Hình Ảnh Trong Bài Viết -->
                                        <div class="mb-4 row align-items-center">
                                            <label class="form-label-title col-sm-2 mb-0">Hình Ảnh Trong Bài Viết</label>
                                            <div class="col-sm-10">
                                                <input
                                                    class="form-control form-choose @error('images') is-invalid @enderror"
                                                    type="file" name="images[]" multiple accept="image/*"
                                                    onchange="previewPostImages()">
                                                @error('images')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- Xem Trước Ảnh Trong Bài Viết -->
                                        <div class="mb-4 row align-items-center">
                                            <label class="form-label-title col-sm-2 mb-0">Xem Trước Hình Ảnh</label>
                                            <div class="col-sm-10" id="postImagesPreview">
                                                <!-- Xem trước các ảnh trong bài viết sẽ hiển thị ở đây -->
                                            </div>
                                        </div>

                                        <!-- Submit Button -->
                                        <div class="mb-4 row">
                                            <div class="col-sm-10 offset-sm-2">
                                                <button type="submit" class="btn btn-primary">Lưu Bài Viết</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid">
                <footer class="footer">
                    <div class="row">
                        <div class="col-md-12 footer-copyright text-center">
                            <p class="mb-0">Copyright 2021 © Voxo theme by pixelstrap</p>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </div>

    <script>
        // Xem trước ảnh bìa
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

        // Xem trước các ảnh trong bài viết
        function previewPostImages() {
            const files = document.querySelector('input[name="images[]"]').files;
            const preview = document.getElementById('postImagesPreview');
            preview.innerHTML = ''; // Clear the preview area

            for (let i = 0; i < files.length; i++) {
                const file = files[i];
                const reader = new FileReader();

                reader.onloadend = function() {
                    const img = document.createElement('img');
                    img.src = reader.result;
                    img.alt = "Preview Post Image";
                    img.width = 100;
                    preview.appendChild(img);
                };

                if (file) {
                    reader.readAsDataURL(file);
                }
            }
        }
    </script>
@endsection

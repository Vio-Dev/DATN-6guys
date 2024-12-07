<!-- resources/views/admin/blog/edit.blade.php -->
@extends('admin.layouts.app')
@section('content')
{{-- <div class="page-body">
    <div class="container">
        <h2>Chỉnh Sửa Bài Viết</h2>
        <form action="{{ route('admin.blog.update', $post->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Tiêu Đề</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $post->title) }}" required>
            </div>

            <div class="form-group">
                <label for="content">Nội Dung</label>
                <textarea class="form-control" id="content" name="content" rows="5" required>{{ old('content', $post->content) }}</textarea>
            </div>

            <div class="form-group">
                <label for="cover_image">Hình Ảnh Bìa</label>
                @if($post->cover_image)
                    <img src="{{ Storage::url($post->cover_image) }}" alt="Cover Image" width="100">
                @endif
                <input type="file" class="form-control" id="cover_image" name="cover_image" accept="image/*">
            </div>

            <div class="form-group">
                <label for="images">Hình Ảnh Trong Bài Viết</label>
                @if($post->images)
                    @foreach(json_decode($post->images) as $image)
                        <img src="{{ Storage::url($image) }}" alt="Post Image" width="100">
                    @endforeach
                @endif
                <input type="file" class="form-control" id="images" name="images[]" multiple accept="image/*">
            </div>

            <button type="submit" class="btn btn-primary">Cập Nhật Bài Viết</button>
        </form>
    </div>
</div> --}}
<div class="page-body">
    <div class="container">
        <h2>Chỉnh Sửa Bài Viết</h2>
        <form action="{{ route('admin.blog.update', $post->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Tiêu Đề -->
            <div class="form-group">
                <label for="title">Tiêu Đề</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $post->title) }}" required>
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

            <!-- Tên Tác Giả -->
            <div class="form-group">
                <label for="author">Tên Tác Giả</label>
                <input type="text" class="form-control" id="author" name="author" value="{{ old('author', $post->author) }}" required>
            </div>

            <!-- Hình Ảnh Bìa -->
            <div class="form-group">
                <label for="featured_image">Hình Ảnh Bìa</label>
                @if($post->featured_image)
                    <div>
                        <img src="{{ Storage::url($post->featured_image) }}" alt="Cover Image" width="100">
                    </div>
                @endif
                <input type="file" class="form-control" id="featured_image" name="featured_image" accept="image/*">
            </div>

            <!-- Hình Ảnh Trong Bài Viết -->
            <div class="form-group">
                <label for="image_in_content">Hình Ảnh Trong Bài Viết</label>
                @if($post->image_in_content)
                    <div>
                        @foreach(json_decode($post->image_in_content) as $image)
                            <img src="{{ Storage::url($image) }}" alt="Post Image" width="100" class="m-2">
                        @endforeach
                    </div>
                @endif
                <input type="file" class="form-control" id="image_in_content" name="image_in_content[]" multiple accept="image/*">
            </div>

            <button type="submit" class="btn btn-primary">Cập Nhật Bài Viết</button>
        </form>
    </div>
</div>

@endsection

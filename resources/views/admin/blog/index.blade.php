@extends('admin.layouts.app')

@section('content')
    {{-- <div class="page-body">
        <div class="title-header">
            <h5>Danh Sách Bài Viết</h5>
        </div>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div>
                                <div class="table-responsive table-desi table-blog">
                                    <table class="table table-1d all-package">
                                        <thead>
                                            <tr>
                                                <th>Hình Ảnh Bìa</th>
                                                <th>Tiêu Đề</th>
                                                <th>Nội Dung</th>
                                                <th>Hành Động</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($posts as $post)
                                                <tr>
                                                    <!-- Hình Ảnh Bìa -->
                                                    <td>
                                                        @if ($post->cover_image)
                                                            <img src="{{ asset('storage/' . $post->cover_image) }}"
                                                                class="img-fluid" alt="Cover Image"
                                                                style="max-width: 100px; margin: 5px;">
                                                        @else
                                                            <p>No cover image</p>
                                                        @endif
                                                    </td>

                                                    <!-- Tiêu Đề -->
                                                    <td>
                                                        {{ $post->title }}
                                                    </td>

                                                    <!-- Nội Dung -->
                                                    <td>
                                                        {{ Str::limit(strip_tags($post->content), 50, '...') }}
                                                    </td>

                                                    <!-- Hành Động -->
                                                    <td>
                                                        <ul class="action-list">
                                                            <li>
                                                                <a href="{{ route('admin.blog.edit', $post->id) }}"
                                                                    title="Chỉnh sửa">
                                                                    <span class="lnr lnr-pencil"></span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <form action="{{ route('admin.blog.destroy', $post->id) }}"
                                                                    method="POST"
                                                                    onsubmit="return confirm('Bạn có chắc chắn muốn xóa bài viết này không?');">
                                                                    @csrf
                                                                    @method('delete')
                                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                                        title="Xóa">
                                                                        <span class="lnr lnr-trash"></span>
                                                                    </button>
                                                                </form>
                                                            </li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="pagination-box">
                            <nav class="ms-auto me-auto" aria-label="Pagination">
                                <ul class="pagination pagination-primary">

                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <div class="page-body">
        <div class="title-header">
            <h5>Danh Sách Bài Viết</h5>
        </div>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div>
                                <div class="table-responsive table-desi table-blog">
                                    <table class="table table-1d all-package">
                                        <thead>
                                            <tr>
                                                <th>Hình Ảnh Bìa</th>
                                                <th>Tiêu Đề</th>
                                                <th>Mô tả ngắn</th>
                                                <th>Tác giả</th>
                                                <th>Nội Dung</th>
                                                <th>Ngày</th>
                                                <th>Hành Động</th>

                                            </tr>
                                        </thead>
    
                                        <tbody>
                                            @foreach ($posts as $post)
                                                <tr>
                                                    <!-- Hình Ảnh Bìa -->
                                                    <td>
                                                        @if ($post->featured_image)
                                                            <img src="{{ asset('storage/' . $post->featured_image) }}" class="img-fluid" alt="Cover Image" style="max-width: 100px; margin: 5px;">
                                                        @else
                                                            <p>No cover image</p>
                                                        @endif
                                                    </td>
    
                                                    <!-- Tiêu Đề -->
                                                    <td>
                                                        {{ $post->title }}
                                                    </td>
                                                    <td>
                                                        {{ Str::limit(strip_tags($post->short_description), 50, '...') }}
                                                    </td>
                                                    <td>
                                                        {{ $post->author }}
                                                    </td>
                                                    <!-- Nội Dung -->
                                                    <td>
                                                        {{ Str::limit(strip_tags($post->content), 50, '...') }}
                                                    </td>
                                                    <td>
                                                        {{ $post->created_at->format('d/m/Y') }}
                                                    </td>
                                                    <!-- Hành Động -->
                                                    <td>
                                                        <ul class="action-list">
                                                            <li>
                                                                <a href="{{ route('admin.blog.edit', $post->id) }}" title="Chỉnh sửa">
                                                                    <span class="lnr lnr-pencil"></span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <form action="{{ route('admin.blog.destroy', $post->id) }}" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn xóa bài viết này không?');">
                                                                    @csrf
                                                                    @method('delete')
                                                                    <button type="submit" class="btn btn-danger btn-sm" title="Xóa">
                                                                        <span class="lnr lnr-trash"></span>
                                                                    </button>
                                                                </form>
                                                            </li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
    
                        <!-- Phân Trang -->
                        <div class="pagination-box">
                            <nav class="ms-auto me-auto" aria-label="Pagination">
                                <ul class="pagination pagination-primary">
                                     <!-- Hiển thị các nút phân trang -->
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection

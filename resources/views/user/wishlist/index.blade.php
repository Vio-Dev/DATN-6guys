@extends('layout')

@section('content')
@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

@if (session('info'))
    <div class="alert alert-info">{{ session('info') }}</div>
@endif

@if (session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif

{{-- <div class="container my-5">
    <h1>Danh sách yêu thích của bạn</h1>
    @if ($wishlists->isEmpty())
        <p>Danh sách yêu thích của bạn đang trống.</p>
    @else
        <div class="table-responsive">
            <table class="table table-bordered align-middle">
                <thead class="table-dark text-center">
                    <tr>
                        <th>Ảnh</th>
                        <th>Tên sản phẩm</th>
                        <th>Giá</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($wishlists as $wishlist)
                        <tr>
                            <!-- Hiển thị ảnh sản phẩm -->
                            <td class="text-center">
                                @if(isset($wishlist->product->image))
                                    @php
                                        $images = json_decode($wishlist->product->image, true);
                                    @endphp
                                    @if(is_array($images) && count($images) > 0)
                                        <img src="{{ asset('storage/' . $images[0]) }}" alt="{{ $wishlist->product->name }}" style="width: 80px; height: 80px; object-fit: cover;" class="img-thumbnail">
                                    @else
                                        <img src="{{ asset('path/to/default-image.jpg') }}" alt="Ảnh không có" style="width: 80px; height: 80px; object-fit: cover;" class="img-thumbnail">
                                    @endif
                                @else
                                    <img src="{{ asset('path/to/default-image.jpg') }}" alt="Ảnh không có" style="width: 80px; height: 80px; object-fit: cover;" class="img-thumbnail">
                                @endif
                            </td>

                            <!-- Hiển thị tên sản phẩm -->
                            <td>{{ $wishlist->product->name }}</td>

                            <!-- Hiển thị giá sản phẩm -->
                            <td class="text-center">{{ number_format($wishlist->product->price, 0, ',', '.') }} VNĐ</td>

                            <!-- Nút xóa -->
                            <td class="text-center">
                                <a href="{{ route('wishlist.destroy', $wishlist->id) }}" 
                                   onclick="event.preventDefault(); document.getElementById('delete-form-{{ $wishlist->id }}').submit();" 
                                   class="btn btn-sm btn-danger">Xóa</a>

                                <form id="delete-form-{{ $wishlist->id }}" action="{{ route('wishlist.destroy', $wishlist->id) }}" method="POST" style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div> --}}
<div class="container my-5">
    <h1 class="text-center">Danh sách yêu thích của bạn</h1>

    @if ($wishlists->isEmpty())
        <div class="alert alert-info text-center mt-4">
            Danh sách yêu thích của bạn đang trống.
        </div>
    @else
        <div class="table-responsive mt-4">
            <table class="table table-bordered align-middle">
                <thead class="table-light text-center">
                    <tr>
                        <th>#</th>
                        <th>Ảnh</th>
                        <th>Tên sản phẩm</th>
                        <th>Giá</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($wishlists as $index => $wishlist)
                        <tr>
                            <!-- Số thứ tự -->
                            <td class="text-center">{{ $index + 1 }}</td>

                            <!-- Hiển thị ảnh sản phẩm -->
                            <td class="text-center">
                                @if(isset($wishlist->product->image))
                                    @php
                                        $images = json_decode($wishlist->product->image, true);
                                    @endphp
                                    @if(is_array($images) && count($images) > 0)
                                        <img src="{{ asset('storage/' . $images[0]) }}" alt="{{ $wishlist->product->name }}" style="width: 80px; height: 80px; object-fit: cover;" class="img-thumbnail">
                                    @else
                                        <img src="{{ asset('path/to/default-image.jpg') }}" alt="Ảnh không có" style="width: 80px; height: 80px; object-fit: cover;" class="img-thumbnail">
                                    @endif
                                @else
                                    <img src="{{ asset('path/to/default-image.jpg') }}" alt="Ảnh không có" style="width: 80px; height: 80px; object-fit: cover;" class="img-thumbnail">
                                @endif
                            </td>

                            <!-- Hiển thị tên sản phẩm -->
                            <td>{{ $wishlist->product->name }}</td>

                            <!-- Hiển thị giá sản phẩm -->
                            <td class="text-center">
                                <span class="fw-bold text-danger">
                                    {{ number_format($wishlist->product->price, 0, ',', '.') }} VNĐ
                                </span>
                            </td>

                            <!-- Nút hành động -->
                            <td class="text-center">
                                <!-- Nút thêm vào giỏ hàng -->
                                <form action="{{ route('cart.add', $wishlist->product->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-success">
                                        <i class="bi bi-cart-plus"></i> Thêm vào giỏ hàng
                                    </button>
                                </form>

                                <!-- Nút xóa khỏi danh sách yêu thích -->
                                <a href="{{ route('wishlist.destroy', $wishlist->id) }}" 
                                   onclick="event.preventDefault(); document.getElementById('delete-form-{{ $wishlist->id }}').submit();" 
                                   class="btn btn-sm btn-danger">
                                    <i class="bi bi-trash"></i> Xóa
                                </a>

                                <form id="delete-form-{{ $wishlist->id }}" action="{{ route('wishlist.destroy', $wishlist->id) }}" method="POST" style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>


@endsection

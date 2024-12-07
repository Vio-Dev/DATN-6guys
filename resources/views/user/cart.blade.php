@extends('layout')

@section('content')
@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
{{-- <div class="container my-5">
    <h2 class="text-center mb-4">Giỏ hàng của bạn</h2>
    @if(session('cart') && count(session('cart')) > 0)
        <div class="row">
            @foreach(session('cart') as $item) <!-- Loop through the cart items -->
                <div class="col-md-6 mb-4">
                    <div class="card shadow-sm">
                        <div class="row g-0">
                            <div class="col-md-4">
                                @if(isset($item['image']))
                                    @php
                                        $images = json_decode($item['image'], true);
                                    @endphp
                                    @if(is_array($images) && count($images) > 0)
                                        <img src="{{ asset('storage/' . $images[0]) }}" alt="{{ $item['name'] }}" class="img-fluid rounded-start" style="height: 200px; object-fit: cover;">
                                    @else
                                        <img src="{{ asset('path/to/default-image.jpg') }}" alt="Ảnh không có" class="img-fluid rounded-start" style="height: 200px; object-fit: cover;">
                                    @endif
                                @else
                                    <img src="{{ asset('path/to/default-image.jpg') }}" alt="Ảnh không có" class="img-fluid rounded-start" style="height: 200px; object-fit: cover;">
                                @endif
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title product-name">{{ $item['name'] }}</h5>
                                    <p class="card-text">Giá: <strong>{{ number_format($item['price'], 0, ',', '.') }} VNĐ</strong></p>
                                    <p class="card-text">Số lượng: 
                                        <form action="{{ route('cart.update', $item['id']) }}" method="POST" class="d-inline-flex">
                                            @csrf
                                            @method('POST') <!-- Or use PUT if that's your preferred method -->
                                            <input type="number" name="quantity" value="{{ $item['quantity'] }}" class="form-control w-25 me-2" required min="1">
                                            <button type="submit" class="btn btn-sm btn-outline-primary">Cập nhật</button>
                                        </form>
                                    </p>
                                    <p class="card-text">Tổng: <strong>{{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }} VNĐ</strong></p>
                                    <form action="{{ route('cart.remove', $item['id']) }}" method="POST" class="d-flex justify-content-end">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Xóa</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="my-4">
            <h4>Tổng giá trị: 
                <span class="fw-bold text-danger">
                    {{ number_format(array_sum(array_map(function($item) {
                        return $item['price'] * $item['quantity'];
                    }, session('cart'))), 0, ',', '.') }} VNĐ
                </span>
            </h4>
        </div>

        <div class="d-flex justify-content-start">
            <form action="{{ route('user.checkout.confirm') }}" method="GET">
                @csrf
                <button type="submit" class="btn btn-success">Xác nhận thanh toán</button>
            </form>
        </div>
    @else
        <div class="alert alert-info text-center">
            Giỏ hàng của bạn đang trống.
        </div>
    @endif
</div> --}}
<div class="container my-5">
    <h2 class="text-center mb-4">Giỏ hàng của bạn</h2>
    @if(session('cart') && count(session('cart')) > 0)
        <div class="table-responsive">
            <table class="table table-bordered align-middle">
                <thead class="table-dark text-center">
                    <tr>
                        <th>#</th>
                        <th>Ảnh</th>
                        <th>Tên sản phẩm</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Tổng</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @php $index = 1; @endphp
                    @foreach(session('cart') as $item)
                        <tr>
                            <!-- Số thứ tự -->
                            <td class="text-center">{{ $index++ }}</td>
                            
                            <!-- Hình ảnh -->
                            <td class="text-center">
                                @if(isset($item['image']))
                                    @php
                                        $images = json_decode($item['image'], true);
                                    @endphp
                                    @if(is_array($images) && count($images) > 0)
                                        <img src="{{ asset('storage/' . $images[0]) }}" alt="{{ $item['name'] }}" style="width: 80px; height: 80px; object-fit: cover;" class="img-thumbnail">
                                    @else
                                        <img src="{{ asset('path/to/default-image.jpg') }}" alt="Ảnh không có" style="width: 80px; height: 80px; object-fit: cover;" class="img-thumbnail">
                                    @endif
                                @else
                                    <img src="{{ asset('path/to/default-image.jpg') }}" alt="Ảnh không có" style="width: 80px; height: 80px; object-fit: cover;" class="img-thumbnail">
                                @endif
                            </td>
                            
                            <!-- Tên sản phẩm -->
                            <td>{{ $item['name'] }}</td>

                            <!-- Giá -->
                            <td class="text-center">{{ number_format($item['price'], 0, ',', '.') }} VNĐ</td>
                            
                            <!-- Số lượng -->
                            <td class="text-center">
                                <form action="{{ route('cart.update', $item['id']) }}" method="POST" class="d-inline-flex">
                                    @csrf
                                    @method('POST')
                                    <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1" class="form-control form-control-sm text-center w-50 me-2" required>
                                    <button type="submit" class="btn btn-sm btn-outline-primary">Cập nhật</button>
                                </form>
                            </td>

                            <!-- Tổng -->
                            <td class="text-center">{{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }} VNĐ</td>
                            
                            <!-- Hành động -->
                            <td class="text-center">
                                <form action="{{ route('cart.remove', $item['id']) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Xóa</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- Tổng giá trị -->
        <div class="my-4 text-end">
            <h4>Tổng giá trị: 
                <span class="fw-bold text-danger">
                    {{ number_format(array_sum(array_map(function($item) {
                        return $item['price'] * $item['quantity'];
                    }, session('cart'))), 0, ',', '.') }} VNĐ
                </span>
            </h4>
        </div>

        <!-- Nút thanh toán -->
        <div class="d-flex justify-content-end">
            <form action="{{ route('user.checkout.confirm') }}" method="GET">
                @csrf
                <button type="submit" class="btn btn-success">Xác nhận thanh toán</button>
            </form>
        </div>
    @else
        <div class="alert alert-info text-center">
            Giỏ hàng của bạn đang trống.
        </div>
    @endif
</div>
@endsection


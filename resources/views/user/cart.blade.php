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
                        @php
                            $product = App\Models\admin\Product::find($item['id']);  // Lấy sản phẩm theo ID
                            $price = $product->price;
                            // Kiểm tra xem sản phẩm có đang giảm giá không
                            if ($product && $product->sale) {
                                // Nếu có, tính giá sau khi giảm
                                $price = $product->price - $product->price * ($product->sale_percentage / 100);
                            }
                        @endphp
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
                            <td>
                            <!-- Giá -->
                            @if ($product && $product->sale)
                            <!-- Giá cũ bị gạch ngang -->
                            
                            <br>
                            <!-- Giá mới sau giảm -->
                            <span class="mtext-106 cl2" style="color: #FF0000; font-size: 1.2em;">
                                 {{ number_format($product->price - $product->price * ($product->sale_percentage / 100)) }} VNĐ
                            </span>
                            @else
                            <!-- Hiển thị giá bình thường nếu không có giảm giá -->
                            <span class="mtext-106 cl2">
                                {{ number_format($product->price) }} VNĐ
                            </span>
                            @endif
                        </td>
                        
                            
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
                            <td class="text-center">
                                {{ number_format($price * $item['quantity'], 0, ',', '.') }} VNĐ
                            </td>
                            
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
                        $product = App\Models\admin\Product::find($item['id']);
                        $price = $product->price;
                        
                        // Kiểm tra giảm giá
                        if ($product && $product->sale) {
                            $price = $product->price - $product->price * ($product->sale_percentage / 100);
                        }
        
                        return $price * $item['quantity'];
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


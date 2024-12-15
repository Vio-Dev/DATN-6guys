@extends('layout')

@section('content')
<div class="container py-5">
    <h1 class="text-center mb-4">Tất cả sản phẩm</h1>

    <!-- Hiển thị các sản phẩm -->
    <div class="row">
        @foreach ($products as $item)
            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                <div class="product-wrapper @if ($item->quantity == 0) out-of-stock @endif">
                    <div class="block2 position-relative">
                        <!-- Hình ảnh sản phẩm -->
                        <div class="block2-pic hov-img0">
                            @if ($item->image)
                                @php
                                    $images = json_decode($item->image);
                                @endphp
                                @if (!empty($images) && (is_array($images) || is_object($images)))
                                    <img src="{{ asset('storage/' . $images[0]) }}" 
                                         class="img-fluid" 
                                         alt="{{ $item->name }}" 
                                         style="height: 250px; object-fit: cover;">
                                @else
                                    <img src="{{ asset('images/default-placeholder.jpg') }}" 
                                         alt="No Image" 
                                         class="img-fluid" 
                                         style="height: 250px; object-fit: cover;">
                                @endif
                            @else
                                <img src="{{ asset('images/default-placeholder.jpg') }}" 
                                     alt="No Image" 
                                     class="img-fluid" 
                                     style="height: 250px; object-fit: cover;">
                            @endif

                            <!-- Nút "Quick View" -->
                            <a href="{{ route('products.show', $item->id) }}" 
                               class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04">
                                Xem nhanh
                            </a>
                        </div>

                        <!-- Thông tin sản phẩm -->
                        <div class="block2-txt flex-w flex-t p-t-14 position-relative">
                            <!-- Nhãn Sale nằm góc trên bên trái -->
                            @if ($item->sale)
                                <span class="sale-badge position-absolute top-0 start-0 bg-danger text-white p-1">Sale</span>
                            @endif
                        
                            <div class="block2-txt-child1 flex-col-l">
                                <a href="{{ route('products.show', $item->id) }}" 
                                   class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6" 
                                   style="font-weight: 900;font-size: 16.5px;">
                                    {{ $item->name }}
                                </a>
                                
                                <!-- Nhãn Hết hàng -->
                                @if ($item->quantity == 0)
                                    <span class="stext-105 cl3 fw-bold text-danger">Hết hàng</span>
                                @endif
                        
                                @if ($item->sale_percentage)
                                    <!-- Giá cũ bị gạch ngang -->
                                    <span class="stext-105 cl3 text-muted text-decoration-line-through">
                                        {{ number_format($item->price, 0, ',', '.') }} VND
                                    </span>
                                    <!-- Giá mới được giảm -->
                                    <span class="stext-105 cl3 text-danger fw-bold">
                                        {{ number_format($item->price - $item->price * ($item->sale_percentage / 100), 0, ',', '.') }} VND
                                    </span>
                                @else
                                    <!-- Hiển thị giá bình thường khi không có sale -->
                                    <span class="stext-105 cl3">
                                        {{ number_format($item->price, 0, ',', '.') }} VND
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Pagination -->
    <div class="pagination justify-content-center mt-4">
        {{ $products->links() }}
    </div>
</div>
@endsection
<style>
    .sale-badge {
    font-size: 12px;
    font-weight: bold;
    border-radius: 3px;
}

.out-of-stock {
    opacity: 0.5;
    pointer-events: none;
}
    </style>
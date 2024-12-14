@extends('layout')
@section('content')
<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('{{ asset('img/banner1.jpg') }}');">
    <h2 class="ltext-105 cl0 txt-center">
        Bàn học
    </h2>
</section>	
@include('includes.fileproduct')
<div class="bg0 m-t-23 p-b-140">
        <div class="container">
            <div class="row isotope-grid">
                @foreach ($products as $product)
                    <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item {{ $product->category }}">
                        <!-- Product Block -->
                        <div class="block2  @if ($product->quantity == 0) out-of-stock @endif">
                            <div class="block2-pic hov-img0">
                                <!-- Product Image -->
                                @if ($product->image)
                                    @php $images = json_decode($product->image); @endphp
                                    @if (is_array($images) || is_object($images))
                                        <img src="{{ asset('storage/' . $images[0]) }}" class="card-img-top"
                                            alt="Product Image" style="height: 200px; object-fit: cover;">
                                    @else
                                        <p>Invalid image data</p>
                                    @endif
                                @else
                                    <img src="{{ asset('default-placeholder.jpg') }}" class="card-img-top"
                                        alt="No Image">
                                @endif

                                <!-- Quick View Button -->
                                <a href="{{ route('products.show', $product->id) }}"
                                    class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04">
                                    Xem nhanh
                                </a>
                            </div>

                            <div class="block2-txt flex-w flex-t p-t-14">
                                <div class="block2-txt-child1 flex-col-l">
                                    <!-- Product Name -->
                                    <a href="{{ route('products.show', $product->id) }}"
                                        class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                        {{ $product->name }}
                                    </a>
                                    @if ($product->sale)
                                    <span class="text-muted text-decoration-line-through">Sale</span>
                                @endif
                                @if ($product->quantity == 0)
                                    <span class="stext-105 cl3 text-muted text-decoration-line-through">Hết hàng</span>
                                @endif
                                    <!-- Product Price -->
                                    <span class="stext-105 cl3">
                                        @if ($product->sale_percentage)
                                            <span class="text-muted text-decoration-line-through">
                                                {{ number_format($product->price, 0, ',', '.') }} VND
                                            </span><br>
                                            <span class="text-danger fw-bold">
                                                {{ number_format($product->price - $product->price * ($product->sale_percentage / 100), 0, ',', '.') }}
                                                VND
                                            </span>
                                        @else
                                            <span>{{ number_format($product->price, 0, ',', '.') }} VND</span>
                                        @endif
                                    </span>
                                </div>

                                <div class="block2-txt-child2 flex-r p-t-3">
                                    <!-- Add to Wishlist -->
                                    <a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                                        <img class="icon-heart1 dis-block trans-04"
                                            src="{{ asset('images/icons/icon-heart-01.png') }}" alt="ICON">
                                        <img class="icon-heart2 dis-block trans-04 ab-t-l"
                                            src="{{ asset('images/icons/icon-heart-02.png') }}" alt="ICON">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
</div>
<style>
    /* làm mờ sản phẩm khi hêts hàng*/
    .block2.out-of-stock {
            opacity: 0.5;
            pointer-events: none; /* Vô hiệu hóa khả năng nhấp chuột */
        }

        .block2block2.out-of-stock img {
            filter: grayscale(100%); /* Làm mờ ảnh sản phẩm */
        }
    </style>
@endsection

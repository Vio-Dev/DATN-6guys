@extends('layout')

@section('content')
    
    <section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('{{ asset('img/banner1.jpg') }}');">
        <h2 class="ltext-105 cl0 txt-center">
            Kết quả tìm kiếm
        </h2>
    </section>	
    @include('includes.fileproduct')
    <div class="bg0 m-t-23 p-b-140">
        <div class="container">
            <div class="row isotope-grid">
                @foreach ($products as $product)
                    <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item">
                        <!-- Block2 -->
                        <div class="block2">
                            <div class="block2-pic hov-img0">
                                <!-- Hiển thị ảnh đầu tiên từ danh sách ảnh -->
                                @if ($product->image)
                                    @php
                                        $images = json_decode($product->image);
                                    @endphp
                                    @if (is_array($images) || is_object($images))
                                        @foreach ($images as $image)
                                            <img src="{{ asset('storage/' . $image) }}" class="img-fluid" alt="IMG-PRODUCT"
                                                style="width: 250px; height: 250px;">
                                        @break

                                        <!-- Chỉ hiển thị hình ảnh đầu tiên -->
                                    @endforeach
                                @else
                                    <p>Invalid image data</p>
                                @endif
                            @else
                                <img src="{{ asset('images/default.jpg') }}" class="img-fluid" alt="IMG-PRODUCT">
                            @endif

                            <a href="{{ route('products.show', $product->id) }}"
                                class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04">
                                Xem nhanh
                            </a>
                        </div>

                        <div class="block2-txt flex-w flex-t p-t-14">
                            <div class="block2-txt-child1 flex-col-l ">
                                <a href="{{ route('products.show', $product->id) }}"
                                    class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                    {{ $product->name }}
                                </a>

                                <span class="stext-105 cl3">
                                    @if ($product->sale_percentage)
                                        <span style="text-decoration: line-through;">
                                            {{ number_format($product->price, 0, ',', '.') }} VND
                                        </span>
                                        <br>
                                        <span style="color:red;">
                                            {{ number_format($product->price - $product->price * ($product->sale_percentage / 100), 0, ',', '.') }}
                                            VND
                                        </span>
                                    @else
                                        {{ number_format($product->price, 0, ',', '.') }} VND
                                    @endif
                                </span>
                            </div>

                            <div class="block2-txt-child2 flex-r p-t-3">
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
@endsection

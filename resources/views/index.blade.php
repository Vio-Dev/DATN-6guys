@extends('layout')
@section('content')
        <h1>liem dep trai</h1>
        <h2> dieu ngu   </h2>
        <h3>liem dep trai vailon</h3>
    <section class="section-slide">
        <div class="wrap-slick1 rs1-slick1">
            <div class="slick1">
                <!-- Slide 1 -->
                <div class="item-slick1" style="background-image: url({{ asset('img/banner7.jpg') }});">
                    <div class="container h-full">
                        <div class="flex-col-l-m h-full p-t-100 p-b-30">
                            <div class="layer-slick1 animated visible-false" data-appear="fadeInLeft" data-delay="0">
                                <span class="ltext-202 cl2 respon2" style="color: white; text-shadow: -1px -1px 0 #000, 1px -1px 0 #000, -1px 1px 0 #000, 1px 1px 0 #000;">
                                    Trang bị Gaming Cao Cấp
                                </span>
                            </div>

                            <div class="layer-slick1 animated visible-false" data-appear="fadeInRight" data-delay="800">
                                <h2 class="ltext-104 cl2 p-t-19 p-b-43 respon1" style="color: white; text-shadow: -1px -1px 0 #000, 1px -1px 0 #000, -1px 1px 0 #000, 1px 1px 0 #000; font-size:40px;">
                                    Chuột Gaming Chính Hãng
                                </h2>
                            </div>

                            <div class="layer-slick1 animated visible-false" data-appear="zoomIn" data-delay="1600">
                                <a href="{{ route('category.chuotkhongday') }}"
                                    class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
                                    Khám Phá Ngay
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Slide 2 -->
                <div class="item-slick1" style="background-image: url({{ asset('img/banner5.jpg') }});">
                    <div class="container h-full">
                        <div class="flex-col-l-m h-full p-t-100 p-b-30">
                            <div class="layer-slick1 animated visible-false" data-appear="slideInDown" data-delay="0">
                                <span class="ltext-202 cl2 respon2" style="color: white; text-shadow: -1px -1px 0 #000, 1px -1px 0 #000, -1px 1px 0 #000, 1px 1px 0 #000;">
                                    Màn Hình Gaming Sắc Nét
                                </span>
                            </div>

                            <div class="layer-slick1 animated visible-false" data-appear="slideInUp" data-delay="800">
                                <h2 class="ltext-104 cl2 p-t-19 p-b-43 respon1" style="color: white; text-shadow: -1px -1px 0 #000, 1px -1px 0 #000, -1px 1px 0 #000, 1px 1px 0 #000; font-size:40px;">
                                    Thiết Kế Đỉnh Cao
                                </h2>
                            </div>

                            <div class="layer-slick1 animated visible-false" data-appear="zoomIn" data-delay="1600">
                                <a href="{{ route('category.manhinh') }}"
                                    class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
                                    Xem Chi Tiết
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Slide 3 -->
                <div class="item-slick1" style="background-image: url({{ asset('img/banner1.jpg') }});">
                    <div class="container h-full">
                        <div class="flex-col-l-m h-full p-t-100 p-b-30">
                            <div class="layer-slick1 animated visible-false" data-appear="bounceInLeft" data-delay="0">
                                <span class="ltext-202 cl2 respon2" style="color: white; text-shadow: -1px -1px 0 #000, 1px -1px 0 #000, -1px 1px 0 #000, 1px 1px 0 #000;">
                                    Bàn Phím Cơ Gaming
                                </span>
                            </div>
                            
                            <div class="layer-slick1 animated visible-false" data-appear="bounceInRight" data-delay="0">
                                <h2 class="ltext-104 cl2 p-t-19 p-b-43 respon1" style="color: white; text-shadow: -1px -1px 0 #000, 1px -1px 0 #000, -1px 1px 0 #000, 1px 1px 0 #000; font-size:40px;">
                                    Trải Nghiệm Tốc Độ Và Chính Xác
                                </h2>
                            </div>
                            

                            <div class="layer-slick1 animated visible-false" data-appear="zoomIn" data-delay="1600">
                                <a href="{{ route('category.banphimco') }}"
                                    class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
                                    Tìm Hiểu Ngay
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="sec-banner bg0">
        <div class="flex-w flex-c-m">
            <div class="size-202 m-lr-auto respon4">
                <!-- Block1 -->
                <div class="block1 wrap-pic-w">
                    <img src="{{ asset('img/banphim.jpg') }}" alt="IMG-BANNER">

                    <a href="{{ route('category.banphimco') }}"
                        class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
                        <div class="block1-txt-child1 flex-col-l">
                            <span class="block1-name ltext-102 trans-04 p-b-8" style="color: white; text-shadow: -1px -1px 0 #000, 1px -1px 0 #000, -1px 1px 0 #000, 1px 1px 0 #000;">
                                Bàn phím
                            </span>


                        </div>

                        <div class="block1-txt-child2 p-b-4 trans-05">
                            <div class="block1-link stext-101 cl0 trans-09">
                                Mua ngay
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="size-202 m-lr-auto respon4">
                <!-- Block1 -->
                <div class="block1 wrap-pic-w">
                    <img src="{{ asset('img/e.png') }}" alt="IMG-BANNER">

                    <a href="{{ route('category.chuotkhongday') }}"
                        class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
                        <div class="block1-txt-child1 flex-col-l">
                            <span class="block1-name ltext-102 trans-04 p-b-8" style="color: white; text-shadow: -1px -1px 0 #000, 1px -1px 0 #000, -1px 1px 0 #000, 1px 1px 0 #000;">
                                Chuột
                            </span>

                        </div>

                        <div class="block1-txt-child2 p-b-4 trans-05">
                            <div class="block1-link stext-101 cl0 trans-09">
                                Mua ngay
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="size-202 m-lr-auto respon4">
                <!-- Block1 -->
                <div class="block1 wrap-pic-w">
                    <img src="{{ asset('img/man.jpg') }}" alt="IMG-BANNER">

                    <a href="{{ route('category.manhinh') }}"
                        class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
                        <div class="block1-txt-child1 flex-col-l">
                            <span class="block1-name ltext-102 trans-04 p-b-8" style="color: white; text-shadow: -1px -1px 0 #000, 1px -1px 0 #000, -1px 1px 0 #000, 1px 1px 0 #000;">
                                Màn hình
                            </span>


                        </div>

                        <div class="block1-txt-child2 p-b-4 trans-05">
                            <div class="block1-link stext-101 cl0 trans-09">
                                Mua ngay
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Product -->
    <section class="sec-product bg0 p-t-100 p-b-50">
        <div class="container">
            <div class="p-b-32">
                <h3 class="ltext-105 cl5 txt-center respon1">
                    Sản phẩm
                </h3>
            </div>

            <!-- Tab01 -->
            <div class="tab01">
                <!-- Tab panes -->
                <div class="tab-content p-t-50">
                    <!-- - -->
                    <div class="tab-pane fade show active" id="best-seller" role="tabpanel">
                        <!-- Slide2 -->
                        <div class="wrap-slick2">
                            <div class="slick2">
                                @foreach ($products as $item)
                                    <div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
                                        <!-- Block2 -->
                                        <div class="product-wrapper @if ($item->quantity == 0) out-of-stock @endif">
                                            <div class="block2 position-relative">
                                                <!-- Hình ảnh sản phẩm -->
                                                <div class="block2-pic hov-img0">
                                                    
                                                    @if ($item->image)
                                                        @php
                                                            $images = json_decode($item->image);
                                                        @endphp
                                                        @if (!empty($images) && (is_array($images) || is_object($images)))
                                                            @foreach ($images as $image)
                                                                <img src="{{ asset('storage/' . $image) }}"
                                                                    class="img-fluid" alt="{{ $item->name }}"
                                                                    style="height: 250px; object-fit: cover;">
                                                            @endforeach
                                                        @else
                                                            <img src="{{ asset('images/default-placeholder.jpg') }}"
                                                                alt="No Image" class="img-fluid"
                                                                style="height: 250px; object-fit: cover;">
                                                        @endif
                                                    @else
                                                        <img src="{{ asset('images/default-placeholder.jpg') }}"
                                                            alt="No Image" class="img-fluid"
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
                                                        <a href="{{ route('products.show', $item->id) }}" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6" style="font-weight: 900;font-size: 16.5px;">
                                                            {{ $item->name }}
                                                        </a>
                                                        
                                                        <!-- Nhãn Hết hàng -->
                                                        @if ($item->quantity == 0)
                                                        <span class="stext-105 cl3 text-muted text-decoration-line-through">Hết hàng</span>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <section class="sec-blog bg0 p-t-60 p-b-90">
        <div class="container">
            <div class="p-b-66">
                <h3 class="ltext-105 cl5 txt-center respon1">
                    Bài viết
                </h3>
            </div>

            <div class="row">
                <div class="col-sm-6 col-md-4 p-b-40">
                  <section class="sec-blog bg0 p-t-60 p-b-90">
                    <div class="container">
                      <div class="row">
                        @foreach($posts as $post)
                          <div class="col-sm-6 col-md-4 p-b-40">
                            <div class="p-b-63">
                              <a href="{{ route('user.blog.show', $post->id) }}" class="hov-img0 how-pos5-parent">
                                <img src="{{ asset('storage/' . str_replace('public/', '', $post->featured_image)) }}" alt="IMG-BLOG">
                              </a>
                              <div class="post-item">
                                <h2>{{ $post->title }}</h2>
                                <p class="post-date">Ngày đăng {{ \Carbon\Carbon::parse($post->created_at)->format('d/m/Y') }}</p>
                              </div>
                            </div>
                          </div>
                        @endforeach
                      </div>
                    </div>
                  </section>
                </div>
              </div>
        </div>
    </section>
    <style>
        .sale-badge {
            position: absolute;
            top: 0;
            left: 0;
            background-color: red; /* Màu nền cho nhãn Sale */
            color: white; /* Màu chữ trắng */
            font-size: 14px; /* Kích thước chữ */
            font-weight: bold; /* Chữ đậm */
            padding: 5px 10px;
            border-radius: 5px;
            z-index: 100; /* Đảm bảo nhãn Sale luôn nằm trên các phần tử khác */
            transform: translate(0, -50%); /* Tinh chỉnh vị trí */
        }
        .stext-105 {
            font-size: 16px;
            font-weight: normal;
        }

        .text-decoration-line-through {
            text-decoration: line-through;
        }
        
        .text-danger {
            color: #e60000; /* Màu đỏ cho giá mới */
        }

        .fw-bold {
            font-weight: bold;
        }
        .block2 {
            position: relative;
            z-index: 10;  /* Đảm bảo nó không bị che bởi các phần tử khác */
        }
        /* Đảm bảo hình ảnh có cùng kích thước */
        .block2-pic img {
            width: 100%;
            height: 200px;
            /* Đặt chiều cao cố định */
            object-fit: cover;
            /* Đảm bảo hình ảnh không bị méo */
        }

        /* Căn chỉnh chiều cao phần thông tin sản phẩm */
        .block2-txt {
            min-height: 100px;
            /* Đặt chiều cao tối thiểu */
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            /* Căn đều khoảng cách các phần tử */
        }

        /* Đảm bảo kích thước cột sản phẩm đồng đều */
        .item-slick2 {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            /* Căn chỉnh giữa hình ảnh và nội dung */
            height: 350px;
            /* Đặt chiều cao chung cho tất cả các sản phẩm */
        }
        /* làm mờ sản phẩm khi hêts hàng*/
        .product-wrapper.out-of-stock {
            opacity: 0.5;
            pointer-events: none; /* Vô hiệu hóa khả năng nhấp chuột */
        }

        .product-wrapper.out-of-stock img {
            filter: grayscale(100%); /* Làm mờ ảnh sản phẩm */
        }

        .out-of-stock-label {
            color: red;
            font-weight: bold;
        }


        .post-date {
            font-size: 14px;
            color: #888;
            margin-top: 5px;
        }
    </style>
    <script>
        $(document).ready(function() {
            $('.slick2').slick({
                slidesToShow: 4,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 3000,
                dots: true,
                arrows: false,
                responsive: [{
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 2,
                        }
                    },
                    {
                        breakpoint: 576,
                        settings: {
                            slidesToShow: 1,
                        }
                    }
                ]
            });
        });
    </script>
@endsection

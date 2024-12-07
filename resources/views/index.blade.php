@extends('layout')
@section('content')
    {{-- <section class="section recent-part">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-heading">
                    <h2>Recently Sold Items</h2>
                </div>
            </div>
        </div>
        <div class="row" data-aos="fade-up" data-aos-duration="1000" style="display: flex; flex-wrap: wrap; gap: 15px; justify-content: space-between;">
            @foreach ($products as $item)
                <div class="col-lg-3 col-md-4 col-sm-6" style="margin-bottom: 15px;">
                    <div class="product-wrapper @if ($item->quantity == 0) out-of-stock @endif"> <!-- Bao quanh sản phẩm và kiểm tra nếu hết hàng -->
                        <div class="product-media">
                            @if ($item->sale) 
                                <div class="product-label">
                                    <label class="label-text sale">Sale</label>
                                </div>
                            @endif
                            
                            <!-- Kiểm tra số lượng sản phẩm -->
                            @if ($item->quantity == 0)
                                <div class="product-label">
                                    <label class="label-text out-of-stock">Hết hàng</label> <!-- Nhãn hết hàng -->
                                </div>
                            @endif
        
                            <button class="product-wish wish"><i class="fas fa-heart"></i></button>
        
                            @if ($item->image)
                                @php
                                    $images = json_decode($item->image);
                                @endphp
                                @if (is_array($images) || is_object($images)) 
                                    @foreach ($images as $image)
                                        <img src="{{ asset('storage/' . $image) }}" class="img-fluid" alt="Product Image" style="width: 100%; height: 250px;">
                                    @endforeach
                                @else
                                    <p>Invalid image data</p>
                                @endif
                            @else
                                <p>No image available</p>
                            @endif
                        </div>
        
                        <div class="product-widget">
                            <a title="Product View" href="{{ route('products.show', $item->id) }}" class="fas fa-eye"></a>
                        </div>
        
                        <div class="product-content">
                            <h6 class="product-names">
                                <a href="{{ route('products.show', $item->id) }}">{{ $item->name }}</a>
                            </h6>
                            <h6 class="product-price">
                                @if ($item->sale_percentage)
                                    <span class="old-price" style="text-decoration: line-through;">
                                        {{ number_format($item->price, 0, ',', '.') }}<small> VND</small>
                                    </span>
                                    <br>
                                    <span class="new-price" style="color:red;">
                                        {{ number_format($item->price - ($item->price * ($item->sale_percentage / 100)), 0, ',', '.') }}<small> VND</small>
                                    </span>
                                @else
                                    <span>{{ number_format($item->price, 0, ',', '.') }}<small> VND</small></span>
                                @endif
                            </h6>
        
                            <div class="d-flex align-items-center">
                                <form id="addToCartForm" action="{{ route('cart.add', ['itemId' => $item->id]) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-primary @if ($item->quantity == 0) disabled @endif">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-plus" viewBox="0 0 16 16">
                                            <path d="M9 5.5a.5.5 0 0 0-1 0V7H6.5a.5.5 0 0 0 0 1H8v1.5a.5.5 0 0 0 1 0V8h1.5a.5.5 0 0 0 0-1H9z"/>
                                            <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1zm3.915 10L3.102 4h10.796l-1.313 7zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0m7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0"/>
                                        </svg>
                                    </button>
                                </form>
        
                                <a title="Chi tiết sản phẩm" href="{{ route('products.show', $item->id) }}" class="btn btn-secondary ms-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                        <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0"/>
                                        <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7"/>
                                    </svg>
                                </a>
                            </div> <!-- Kết thúc div chứa nút -->
                        </div>
                    </div> <!-- Kết thúc sản phẩm -->
                </div>
            @endforeach
        
            <div class="promotion-section">
                <h2>Giảm giá lên đến 50% cho các sản phẩm hot</h2>
                <p>Mua ngay hôm nay để nhận ưu đãi không thể bỏ qua!</p>
            </div>
        </div>
        @foreach ($categories as $category)
        <h2>{{ $category->name }}</h2>
        <div class="product-list">
        @if (isset($productsByCategory[$category->id]))
            @foreach ($productsByCategory[$category->id] as $item)
                <div class="product-wrapper"> <!-- Bao quanh sản phẩm -->
                    <div class="product-media">
                        @if ($item->sale) 
                            <div class="product-label">
                                <label class="label-text sale">Sale</label>
                            </div>
                        @endif

                        <button class="product-wish wish"><i class="fas fa-heart"></i></button>

                        @if ($item->image)
                            @php
                                $images = json_decode($item->image);
                            @endphp
                            @if (is_array($images) || is_object($images)) 
                                @foreach ($images as $image)
                                    <img src="{{ asset('storage/' . $image) }}" class="img-fluid" alt="Product Image" style="width: 250px; height: 250px;">
                                    @break <!-- Chỉ hiển thị hình ảnh đầu tiên -->
                                @endforeach
                            @else
                                <p>Invalid image data</p>
                            @endif
                        @else
                            <p>No image available</p>
                        @endif
                    </div>
                    <div class="product-widget">
                        <a title="Product View" href="{{ route('products.show', $item->id) }}" class="fas fa-eye"></a>
                    </div>
                    <div class="product-content">
                        <h6 class="product-names">
                            <a href="{{ route('products.show', $item->id) }}">{{ $item->name }}</a>
                        </h6>
                        <h6 class="product-price">
                            @if ($item->sale_percentage)
                                <span class="old-price" style="text-decoration: line-through; ">
                                    {{ number_format($item->price, 0, ',', '.') }}<small> VND</small>
                                </span>
                                <br>
                                <span class="new-price" style="color:red;">
                                    {{ number_format($item->price - ($item->price * ($item->sale_percentage / 100)), 0, ',', '.') }}<small> VND</small>
                                </span>
                            @else
                                <span>{{ number_format($item->price, 0, ',', '.') }}<small> VND</small></span>
                            @endif
                        </h6>
                        <div class="d-flex align-items-center"> <!-- Thêm align-items-center -->
                            <form id="addToCartForm" action="{{ route('cart.add', ['itemId' => $item->id]) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-plus" viewBox="0 0 16 16">
                                        <path d="M9 5.5a.5.5 0 0 0-1 0V7H6.5a.5.5 0 0 0 0 1H8v1.5a.5.5 0 0 0 1 0V8h1.5a.5.5 0 0 0 0-1H9z"/>
                                        <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1zm3.915 10L3.102 4h10.796l-1.313 7zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0m7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0"/>
                                    </svg>
                                </button>
                            </form>
                            <a title="Chi tiết sản phẩm" href="{{ route('products.show', $item->id) }}" class="btn btn-secondary ms-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                    <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0"/>
                                    <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7"/>
                                </svg>
                            </a>
                        </div> <!-- Kết thúc div chứa nút -->
                    </div>
                </div> 
            @endforeach
        @else
            <p>Không có sản phẩm nào trong danh mục này.</p>
        @endif
    </div>
    @endforeach
        <div class="row">
            <div class="col-lg-12">
                <div class="section-btn-25">
                    <a href="shop-4column.html" class="btn btn-outline">
                        <i class="fas fa-eye"></i><span>Show More</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section> --}}
    <section class="section-slide">
        <div class="wrap-slick1 rs1-slick1">
            <div class="slick1">
                <div class="item-slick1" style="background-image: url({{ asset('img/banner7.jpg') }});">
                    <div class="container h-full">
                        <div class="flex-col-l-m h-full p-t-100 p-b-30">
                            <div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">
                                <span class="ltext-202 cl2 respon2">
                                    Các thiết bị gaming cực hot
                                </span>
                            </div>

                            <div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="800">
                                <h2 class="ltext-104 cl2 p-t-19 p-b-43 respon1">
                                    Chuột Gaming
                                </h2>
                            </div>

                            <div class="layer-slick1 animated visible-false" data-appear="zoomIn" data-delay="1600">
                                <a href="product.html"
                                    class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
                                    Xem ngay
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="item-slick1" style="background-image: url({{ asset('img/banner5.jpg') }});">
                    <div class="container h-full">
                        <div class="flex-col-l-m h-full p-t-100 p-b-30">
                            <div class="layer-slick1 animated visible-false" data-appear="rollIn" data-delay="0">
                                <span class="ltext-202 cl2 respon2">
                                    Thiết kế đẹp mắt
                                </span>
                            </div>

                            <div class="layer-slick1 animated visible-false" data-appear="lightSpeedIn" data-delay="800">
                                <h2 class="ltext-104 cl2 p-t-19 p-b-43 respon1">
                                    Màn hình và bàn gaming
                                </h2>
                            </div>

                            <div class="layer-slick1 animated visible-false" data-appear="slideInUp" data-delay="1600">
                                <a href="product.html"
                                    class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
                                    Xem ngay
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="item-slick1" style="background-image: url({{ asset('img/banner1.jpg') }});">
                    <div class="container h-full">
                        <div class="flex-col-l-m h-full p-t-100 p-b-30">
                            <div class="layer-slick1 animated visible-false" data-appear="rotateInDownLeft" data-delay="0">
                                <span class="ltext-202 cl2 respon2">
                                    Bàn phím cơ cực chất
                                </span>
                            </div>

                            <div class="layer-slick1 animated visible-false" data-appear="rotateInUpRight" data-delay="800">
                                <h2 class="ltext-104 cl2 p-t-19 p-b-43 respon1">
                                    Bàn phím gaming
                                </h2>
                            </div>

                            <div class="layer-slick1 animated visible-false" data-appear="rotateIn" data-delay="1600">
                                <a href="product.html"
                                    class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
                                    Xem ngay
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Banner -->
    <div class="sec-banner bg0">
        <div class="flex-w flex-c-m">
            <div class="size-202 m-lr-auto respon4">
                <!-- Block1 -->
                <div class="block1 wrap-pic-w">
                    <img src="{{ asset('img/banphim.jpg') }}" alt="IMG-BANNER">

                    <a href="{{ route('category.banphimco') }}"
                        class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
                        <div class="block1-txt-child1 flex-col-l">
                            <span class="block1-name ltext-102 trans-04 p-b-8">
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
                            <span class="block1-name ltext-102 trans-04 p-b-8">
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
                            <span class="block1-name ltext-102 trans-04 p-b-8">
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
                                                    {{-- @php
                                                        $images = $item->image ? json_decode($item->image) : [];
                                                    @endphp
                                                    @if (!empty($images) && (is_array($images) || is_object($images)))
                                                        <img src="{{ asset('storage/' . $images[0]) }}"
                                                            alt="{{ $item->name }}" class="img-fluid"
                                                            style="height: 200px; object-fit: cover;">
                                                    @else
                                                        <img src="{{ asset('images/default-placeholder.jpg') }}"
                                                            alt="No Image" class="img-fluid"
                                                            style="height: 200px; object-fit: cover;">
                                                    @endif --}}
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
                                                <div class="block2-txt flex-w flex-t p-t-14">
                                                    <div class="block2-txt-child1 flex-col-l">
                                                        <a href="{{ route('products.show', $item->id) }}"
                                                            class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                                            {{ $item->name }}
                                                        </a>
                                                        <!-- Nhãn Sale -->
                                                        @if ($item->sale)
                                                            <span
                                                                class="stext-105 cl3 text-muted text-decoration-line-through">Sale</span>
                                                        @endif

                                                        <!-- Nhãn Hết hàng -->
                                                        @if ($item->quantity == 0)
                                                            <span
                                                                class="stext-105 cl3 text-muted text-decoration-line-through">Hết
                                                                hàng</span>
                                                        @endif

                                                        @if ($item->sale_percentage)
                                                            <span
                                                                class="stext-105 cl3 text-muted text-decoration-line-through">
                                                                {{ number_format($item->price, 0, ',', '.') }} VND
                                                            </span>
                                                            <span class="stext-105 cl3 text-danger fw-bold">
                                                                {{ number_format($item->price - $item->price * ($item->sale_percentage / 100), 0, ',', '.') }}
                                                                VND
                                                            </span>
                                                        @else
                                                            <span class="stext-105 cl3">
                                                                {{ number_format($item->price, 0, ',', '.') }} VND
                                                            </span>
                                                        @endif
                                                    </div>

                                                    <!-- Nút yêu thích -->
                                                    <div class="block2-txt-child2 flex-r p-t-3">
                                                        <a href="#"
                                                            class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                                                            <img class="icon-heart1 dis-block trans-04"
                                                                src="{{ asset('images/icons/icon-heart-01.png') }}"
                                                                alt="ICON">
                                                            <img class="icon-heart2 dis-block trans-04 ab-t-l"
                                                                src="{{ asset('images/icons/icon-heart-02.png') }}"
                                                                alt="ICON">
                                                        </a>
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
    {{-- <!-- Blog -->
    <section class="sec-blog bg0 p-t-60 p-b-90">
        <div class="container">
            <div class="p-b-66">
                <h3 class="ltext-105 cl5 txt-center respon1">
                    Our Blogs
                </h3>
            </div>

            <div class="row">
                <div class="col-sm-6 col-md-4 p-b-40">
                    <div class="blog-item">
                        <div class="hov-img0">
                            <a href="blog-detail.html">
                                <img src="images/blog-03.jpg" alt="IMG-BLOG">
                            </a>
                        </div>

                        <div class="p-t-15">
                            <div class="stext-107 flex-w p-b-14">
                                <span class="m-r-3">
                                    <span class="cl4">
                                        By
                                    </span>

                                    <span class="cl5">
                                        Nancy Ward
                                    </span>
                                </span>

                                <span>
                                    <span class="cl4">
                                        on
                                    </span>

                                    <span class="cl5">
                                        July 2, 2017
                                    </span>
                                </span>
                            </div>

                            <h4 class="p-b-12">
                                <a href="blog-detail.html" class="mtext-101 cl2 hov-cl1 trans-04">
                                    5 Winter-to-Spring Fashion Trends to Try Now
                                </a>
                            </h4>

                            <p class="stext-108 cl6">
                                Proin nec vehicula lorem, a efficitur ex. Nam vehicula nulla vel erat tincidunt, sed
                                hendrerit ligula porttitor. Fusce sit amet maximus nunc
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- Blog -->
    <section class="sec-blog bg0 p-t-60 p-b-90">
        <div class="container">
            <div class="p-b-66">
                <h3 class="ltext-105 cl5 txt-center respon1">
                    Bài viết
                </h3>
            </div>

            <div class="row">
                <div class="col-sm-6 col-md-4 p-b-40">
                    <div class="blog-item">
                        <div class="hov-img0">
                            <a href="blog-detail.html">
                                <img src="images/blog-01.jpg" alt="IMG-BLOG">
                            </a>
                        </div>

                        <div class="p-t-15">
                            <div class="stext-107 flex-w p-b-14">
                                <span class="m-r-3">
                                    <span class="cl4">
                                        By
                                    </span>

                                    <span class="cl5">
                                        Nancy Ward
                                    </span>
                                </span>

                                <span>
                                    <span class="cl4">
                                        on
                                    </span>

                                    <span class="cl5">
                                        July 22, 2017
                                    </span>
                                </span>
                            </div>

                            <h4 class="p-b-12">
                                <a href="blog-detail.html" class="mtext-101 cl2 hov-cl1 trans-04">
                                    8 Inspiring Ways to Wear Dresses in the Winter
                                </a>
                            </h4>

                            <p class="stext-108 cl6">
                                Duis ut velit gravida nibh bibendum commodo. Suspendisse pellentesque mattis augue id
                                euismod. Interdum et male-suada fames
                            </p>
                        </div>
                    </div>
                </div>
                {{-- @foreach ($posts as $post)
                <div class="col-sm-6 col-md-4 p-b-40">
                    <div class="blog-item">
                        <div class="hov-img0">
                            <a href="{{ route('blog.show', $post->id) }}">
                                <img src="{{ asset('storage/' . $post->featured_image) }}" alt="IMG-BLOG">
                            </a>
                        </div>
    
                        <div class="p-t-15">
                            <div class="stext-107 flex-w p-b-14">
                                <span class="m-r-3">
                                    <span class="cl4">By</span>
                                    <span class="cl5">{{ $post->author }}</span>
                                </span>
    
                                <span>
                                    <span class="cl4">on</span>
                                    <span class="cl5">{{ $post->created_at->format('F d, Y') }}</span>
                                </span>
                            </div>
    
                            <h4 class="p-b-12">
                                <a href="{{ route('blog.show', $post->id) }}" class="mtext-101 cl2 hov-cl1 trans-04">
                                    {{ $post->title }}
                                </a>
                            </h4>
    
                            <p class="stext-108 cl6">
                                {{ Str::limit($post->content, 100) }}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach --}}
            </div>
        </div>
    </section>
    <style>
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

@extends('layout')

@section('content')
    {{-- <section class="sec-product-detail bg-light p-5">
        <div class="container">
            <div class="row">
                <!-- Cột ảnh sản phẩm -->
                <div class="col-md-6 col-lg-7 mb-4">
                    <div class="card border-0">
                        <div class="card-body">
                            @if ($images && (is_array($images) || is_object($images)))
                                <!-- Ảnh lớn -->
                                <div class="text-center mb-4">
                                    <img src="{{ asset('storage/' . $images[0]) }}" class="img-fluid rounded"
                                        alt="{{ $product->name }}">
                                </div>

                                <!-- Ảnh nhỏ -->
                                <div class="row">
                                    @foreach ($images as $image)
                                        <div class="col-4">
                                            <img src="{{ asset('storage/' . $image) }}" class="img-fluid rounded shadow-sm"
                                                alt="{{ $product->name }}">
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <p>Không có hình ảnh nào.</p>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Cột thông tin sản phẩm -->
                <div class="col-md-6 col-lg-5">
                    <div class="card border-0 shadow-sm p-4">
                        <h2 class="card-title text-primary mb-4">{{ $product->name }}</h2>

                        <!-- Giá -->
                        <div class="mb-3">
                            <p class="text-muted mb-1">Giá cũ:</p>
                            <span class="text-decoration-line-through text-muted">{{ number_format($product->price) }}
                                VND</span>
                        </div>
                        <div class="mb-4">
                            <p class="text-danger fw-bold mb-1">Giá sale:</p>
                            <span
                                class="fs-4 text-danger">{{ number_format($product->price - $product->price * ($product->sale_percentage / 100)) }}
                                VND</span>
                        </div>

                        <!-- Tuỳ chọn sản phẩm -->
                        <div class="mb-4">
                            <label for="size" class="form-label">Size</label>
                            <select class="form-select" id="size">
                                <option selected>Chọn kích thước</option>
                                <option value="S">Size S</option>
                                <option value="M">Size M</option>
                                <option value="L">Size L</option>
                                <option value="XL">Size XL</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="color" class="form-label">Màu sắc</label>
                            <select class="form-select" id="color">
                                <option selected>Chọn màu sắc</option>
                                <option value="red">Đỏ</option>
                                <option value="blue">Xanh</option>
                                <option value="white">Trắng</option>
                                <option value="grey">Xám</option>
                            </select>
                        </div>

                        <!-- Số lượng và nút Thêm vào giỏ -->
                        <div class="d-flex align-items-center mb-4">
                            <div class="input-group me-3" style="width: 120px;">
                                <button class="btn btn-outline-secondary" type="button">-</button>
                                <input type="number" class="form-control text-center" value="1" min="1">
                                <button class="btn btn-outline-secondary" type="button">+</button>
                            </div>
                            <form action="{{ route('cart.add', ['itemId' => $product->id, 'quantity' => 1]) }}"
                                method="POST">
                                @csrf
                                <button type="submit" class="btn btn-primary">Thêm vào giỏ hàng</button>
                            </form>
                        </div>

                        <!-- Ưu đãi -->
                        <div class="advantage-box mt-4">
                            <h5 class="text-white">Ưu Đãi Của Shop</h5>
                            <ul class="list-unstyled mb-0">
                                <li>✔ Giảm giá 10% cho đơn hàng đầu tiên</li>
                                <li>✔ Miễn phí vận chuyển cho đơn hàng từ 500.000 VND</li>
                                <li>✔ Quà tặng kèm cho khách hàng thân thiết</li>
                                <li>✔ Hỗ trợ trả góp 0% lãi suất khi đến tận cửa hàng</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Mô tả sản phẩm -->
            <!-- Mô tả sản phẩm -->
            <div class="mt-5 p-4 border rounded" id="product-description">
                <h3 class="text-primary mb-3">Mô Tả Sản Phẩm</h3>
                <p id="description-text" class="text-truncate">{!! nl2br(e($product->content)) !!}</p>
                <button id="read-more-btn" class="btn btn-link text-primary">Xem thêm</button>
            </div>

        </div>
        <!-- Mô tả sản phẩm -->

    </section> --}}

    <section class="sec-product-detail bg0 p-t-65 p-b-60">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-7 p-b-30">
                    <div class="p-l-25 p-r-30 p-lr-0-lg">
                        <div class="wrap-slick3 flex-sb flex-w">
                            {{-- <div class="wrap-slick3-dots"></div> --}}
                            <div class="wrap-slick3-arrows flex-sb-m flex-w"></div>
                            <div class="slick3 gallery-lb">
                                @if ($images && (is_array($images) || is_object($images)))
                                    <!-- Gallery Lightbox Section (Slick Carousel) -->
                                    <div class="slick3 gallery-lb">
                                        @foreach ($images as $image)
                                            <div class="item-slick3" data-thumb="{{ asset('storage/' . $image) }}">
                                                <div class="wrap-pic-w pos-relative">
                                                    <img src="{{ asset('storage/' . $image) }}" alt="{{ $product->name }}">

                                                    <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04"
                                                        href="{{ asset('storage/' . $image) }}">
                                                        <i class="fa fa-expand"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @else
                                    <p>Không có hình ảnh nào.</p>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-5 p-b-30">
                    <div class="p-r-50 p-t-5 p-lr-0-lg">
                        <h4 class="mtext-105 cl2 js-name-detail p-b-14">
                            {{ $product->name }}
                        </h4>

                        <span class="mtext-106 cl2">
                            Giá:{{ number_format($product->price) }}VNĐ
                        </span>
                        <br>

                        <span class="mtext-106 cl2" style="color: #FF0000; font-size: 1.2em;  ">
                            Giá sale:
                            {{ number_format($product->price - $product->price * ($product->sale_percentage / 100)) }} VND
                        </span>


                        <p class="stext-102 cl3 p-t-23">
                            Màn hình Asus TUF GAMING VG249Q3A 24" Fast IPS 180Hz Gsync chuyên game.
                        </p>

                        <!--  -->
                        <div class="p-t-33">
                            <div class="flex-w flex-r-m p-b-10">
                                {{-- <div class="size-203 flex-c-m respon6">
                                    Size
                                </div>

                                <div class="size-204 respon6-next">
                                    <div class="rs1-select2 bor8 bg0">
                                        <select class="js-select2" name="time">
                                            <option>Choose an option</option>
                                            <option>Size S</option>
                                            <option>Size M</option>
                                            <option>Size L</option>
                                            <option>Size XL</option>
                                        </select>
                                        <div class="dropDownSelect2"></div>
                                    </div>
                                </div> --}}
                            </div>

                            {{-- <div class="flex-w flex-r-m p-b-10">
                                <div class="size-203 flex-c-m respon6">
                                    Color
                                </div>

                                <div class="size-204 respon6-next">
                                    <div class="rs1-select2 bor8 bg0">
                                        <select class="js-select2" name="time">
                                            <option>Choose an option</option>
                                            <option>Red</option>
                                            <option>Blue</option>
                                            <option>White</option>
                                            <option>Grey</option>
                                        </select>
                                        <div class="dropDownSelect2"></div>
                                    </div>
                                </div> --}}
                            </div>

                            <div class="flex-w flex-r-m p-b-10">
                                <div class="size-204 flex-w flex-m respon6-next">
                                    <div class="wrap-num-product flex-w m-r-20 m-tb-10">
                                        <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                            <i class="fs-16 zmdi zmdi-minus"></i>
                                        </div>
                            
                                        <input class="mtext-104 cl3 txt-center num-product" type="number" name="num-product" value="1">
                            
                                        <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                            <i class="fs-16 zmdi zmdi-plus"></i>
                                        </div>
                                    </div>
                            
                                    <!-- Form to Add to Cart -->
                                    <form action="{{ route('cart.add', ['itemId' => $product->id, 'quantity' => 1]) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail">
                                            Thêm vào giỏ hàng
                                        </button>
                                    </form>
                            
                                    <!-- Form to Add to Wishlist -->
                                    <form action="{{ route('wishlist.store', ['productId' => $product->id]) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04" style="margin-top: 10px;">
                                            Thêm vào yêu thích
                                        </button>
                                    </form>
                                </div>
                            </div>
                            
                        </div>

                        <!--  -->
                        <div class="flex-w flex-m p-l-100 p-t-40 respon7">
                            <div class="flex-m bor9 p-r-10 m-r-11">
                                <a href="#"
                                    class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 js-addwish-detail tooltip100"
                                    data-tooltip="Add to Wishlist">
                                    <i class="zmdi zmdi-favorite"></i>
                                </a>
                            </div>

                            <a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100"
                                data-tooltip="Facebook">
                                <i class="fa fa-facebook"></i>
                            </a>

                            <a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100"
                                data-tooltip="Twitter">
                                <i class="fa fa-twitter"></i>
                            </a>

                            <a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100"
                                data-tooltip="Google Plus">
                                <i class="fa fa-google-plus"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            {{-- <div class="bor10 m-t-50 p-t-43 p-b-40">
                <!-- Tab01 -->
                <div class="tab01">
                    <!-- Nav tabs -->
                    <!-- Tab panes -->
                    <div class="tab-content p-t-43">
                        <!-- - -->
                        <div class="tab-pane fade show active" id="product-description" role="tabpanel">
                            <div class="how-pos2 p-lr-15-md">
                                <p class="stext-102 cl6" id="description-text">
                                    {!! nl2br(e($product->content)) !!}
                                </p>
                                <button id="read-more-btn" class="btn btn-link text-primary">Xem thêm</button>
                            </div>
                        </div>
                        <!-- - -->
                    </div>
                </div>
            </div>
            <div class="bor10 m-t-50 p-t-43 p-b-40">
                <div class="tab01">
                    <div class="tab-content p-t-43">
                        <div class="tab-pane fade show active" id="description" role="tabpanel">
                            <div class="row">
                                <div class="col-sm-10 col-md-8 col-lg-6 m-lr-auto">
                                    <div class="p-b-30 m-lr-15-sm">
                                        <!-- Review -->
                                        <div class="flex-w flex-t p-b-68">
                                            <div class="wrap-pic-s size-109 bor0 of-hidden m-r-18 m-t-6">
                                                <img src="images/avatar-01.jpg" alt="AVATAR">
                                            </div>

                                            <div class="size-207">
                                                <div class="flex-w flex-sb-m p-b-17">
                                                    <span class="mtext-107 cl2 p-r-20">
                                                        Ariana Grande
                                                    </span>

                                                    <span class="fs-18 cl11">
                                                        <i class="zmdi zmdi-star"></i>
                                                        <i class="zmdi zmdi-star"></i>
                                                        <i class="zmdi zmdi-star"></i>
                                                        <i class="zmdi zmdi-star"></i>
                                                        <i class="zmdi zmdi-star-half"></i>
                                                    </span>
                                                </div>

                                                <p class="stext-102 cl6">
                                                    Quod autem in homine praestantissimum atque optimum est, id deseruit.
                                                    Apud ceteros autem philosophos
                                                </p>
                                            </div>
                                        </div>

                                        <!-- Add review -->
                                        <form class="w-full">
                                            <h5 class="mtext-108 cl2 p-b-7">
                                                Add a review
                                            </h5>

                                            <p class="stext-102 cl6">
                                                Your email address will not be published. Required fields are marked *
                                            </p>

                                            <div class="flex-w flex-m p-t-50 p-b-23">
                                                <span class="stext-102 cl3 m-r-16">
                                                    Your Rating
                                                </span>

                                                <span class="wrap-rating fs-18 cl11 pointer">
                                                    <i class="item-rating pointer zmdi zmdi-star-outline"></i>
                                                    <i class="item-rating pointer zmdi zmdi-star-outline"></i>
                                                    <i class="item-rating pointer zmdi zmdi-star-outline"></i>
                                                    <i class="item-rating pointer zmdi zmdi-star-outline"></i>
                                                    <i class="item-rating pointer zmdi zmdi-star-outline"></i>
                                                    <input class="dis-none" type="number" name="rating">
                                                </span>
                                            </div>

                                            <div class="row p-b-25">
                                                <div class="col-12 p-b-5">
                                                    <label class="stext-102 cl3" for="review">Your review</label>
                                                    <textarea class="size-110 bor8 stext-102 cl2 p-lr-20 p-tb-10" id="review" name="review"></textarea>
                                                </div>

                                                <div class="col-sm-6 p-b-5">
                                                    <label class="stext-102 cl3" for="name">Name</label>
                                                    <input class="size-111 bor8 stext-102 cl2 p-lr-20" id="name"
                                                        type="text" name="name">
                                                </div>

                                                <div class="col-sm-6 p-b-5">
                                                    <label class="stext-102 cl3" for="email">Email</label>
                                                    <input class="size-111 bor8 stext-102 cl2 p-lr-20" id="email"
                                                        type="text" name="email">
                                                </div>
                                            </div>

                                            <button
                                                class="flex-c-m stext-101 cl0 size-112 bg7 bor11 hov-btn3 p-lr-15 trans-04 m-b-10">
                                                Submit
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
            <div class="bor10 m-t-50 p-t-43 p-b-40">
                <!-- Tab01 -->
                <div class="tab01">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" id="productTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="product-description-tab" data-bs-toggle="tab" href="#product-description" role="tab" aria-controls="product-description" aria-selected="true">Mô Tả Sản Phẩm</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="reviews-tab" data-bs-toggle="tab" href="#reviews" role="tab" aria-controls="reviews" aria-selected="false">Đánh Giá</a>
                        </li>
                    </ul>
            
                    <!-- Tab panes -->
                    <div class="tab-content p-t-43">
                        <!-- Mô Tả Sản Phẩm -->
                        <div class="tab-pane fade show active" id="product-description" role="tabpanel" aria-labelledby="product-description-tab">
                            <div class="how-pos2 p-lr-15-md">
                                <p class="stext-102 cl6" id="description-text">
                                    {!! nl2br(e($product->content)) !!}
                                </p>
                                <button id="read-more-btn" class="btn btn-link text-primary">Xem thêm</button>
                            </div>
                        </div>
                        
                        <!-- Đánh Giá -->
                        <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                            <div class="row">
                                <div class="col-sm-10 col-md-8 col-lg-6 m-lr-auto">
                                    <div class="p-b-30 m-lr-15-sm">
                                        <!-- Review -->
                                        <div class="flex-w flex-t p-b-68">
                                            <div class="wrap-pic-s size-109 bor0 of-hidden m-r-18 m-t-6">
                                                <img src="images/avatar-01.jpg" alt="AVATAR">
                                            </div>
                                            <div class="size-207">
                                                <div class="flex-w flex-sb-m p-b-17">
                                                    <span class="mtext-107 cl2 p-r-20">
                                                        Ariana Grande
                                                    </span>
                                                    <span class="fs-18 cl11">
                                                        <i class="zmdi zmdi-star"></i>
                                                        <i class="zmdi zmdi-star"></i>
                                                        <i class="zmdi zmdi-star"></i>
                                                        <i class="zmdi zmdi-star"></i>
                                                        <i class="zmdi zmdi-star-half"></i>
                                                    </span>
                                                </div>
                                                <p class="stext-102 cl6">
                                                    Quod autem in homine praestantissimum atque optimum est, id deseruit.
                                                    Apud ceteros autem philosophos
                                                </p>
                                            </div>
                                        </div>
            
                                        <!-- Add review -->
                                        <form class="w-full">
                                            <h5 class="mtext-108 cl2 p-b-7">
                                                Add a review
                                            </h5>
            
                                            <p class="stext-102 cl6">
                                                Your email address will not be published. Required fields are marked *
                                            </p>
            
                                            <div class="flex-w flex-m p-t-50 p-b-23">
                                                <span class="stext-102 cl3 m-r-16">
                                                    Your Rating
                                                </span>
            
                                                <span class="wrap-rating fs-18 cl11 pointer">
                                                    <i class="item-rating pointer zmdi zmdi-star-outline"></i>
                                                    <i class="item-rating pointer zmdi zmdi-star-outline"></i>
                                                    <i class="item-rating pointer zmdi zmdi-star-outline"></i>
                                                    <i class="item-rating pointer zmdi zmdi-star-outline"></i>
                                                    <i class="item-rating pointer zmdi zmdi-star-outline"></i>
                                                    <input class="dis-none" type="number" name="rating">
                                                </span>
                                            </div>
            
                                            <div class="row p-b-25">
                                                <div class="col-12 p-b-5">
                                                    <label class="stext-102 cl3" for="review">Your review</label>
                                                    <textarea class="size-110 bor8 stext-102 cl2 p-lr-20 p-tb-10" id="review" name="review"></textarea>
                                                </div>
            
                                                <div class="col-sm-6 p-b-5">
                                                    <label class="stext-102 cl3" for="name">Name</label>
                                                    <input class="size-111 bor8 stext-102 cl2 p-lr-20" id="name" type="text" name="name">
                                                </div>
            
                                                <div class="col-sm-6 p-b-5">
                                                    <label class="stext-102 cl3" for="email">Email</label>
                                                    <input class="size-111 bor8 stext-102 cl2 p-lr-20" id="email" type="text" name="email">
                                                </div>
                                            </div>
            
                                            <button class="flex-c-m stext-101 cl0 size-112 bg7 bor11 hov-btn3 p-lr-15 trans-04 m-b-10">
                                                Submit
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Include Bootstrap JS -->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>
            
        </div>
        <style>
            .advantage-box {
                background-color: #FF0000;
                border: 2px solid black;
                padding: 1rem;
                border-radius: 0.5rem;
                color: white;
            }

            #description-text {
                max-height: 150px;
                /* Set the maximum height for truncation */
                overflow: hidden;
                /* Hide the overflow text */
                text-overflow: ellipsis;
                /* Display "..." at the end */
                display: -webkit-box;
                /* For Safari */
                -webkit-line-clamp: 5;
                /* Number of lines to show before truncation */
                -webkit-box-orient: vertical;
                /* Set vertical orientation for the box model */
            }

            #read-more-btn {
                background: none;
                border: none;
                color: #007bff;
                text-decoration: underline;
                cursor: pointer;
            }
        </style>
        <!-- Related Products -->

        <section class="sec-product bg0 p-t-100 p-b-50">
            <div class="p-b-32">
				<h3 class="ltext-105 cl5 txt-center respon1">
					Sản khác
				</h3>
			</div>
            <div class="container">
                <!-- Tab01 -->
                <div class="tab01">
                    <!-- Tab panes -->
                    <div class="tab-content p-t-50">
                        <!-- - -->
                        <div class="tab-pane fade show active" id="best-seller" role="tabpanel">
                            <!-- Slide2 -->
                            <div class="wrap-slick2">
                                <div class="slick2">
                                    @foreach ($relatedProducts as $relatedProduct)
                                        <div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
                                            <!-- Block2 -->
                                            <div
                                                class="product-wrapper @if ($relatedProduct->quantity == 0) out-of-stock @endif">
                                                <div class="block2 position-relative">
                                                    <!-- Nhãn Sale -->
                                                    @if ($relatedProduct->sale)
                                                        <span
                                                            class="badge bg-danger position-absolute top-0 start-0">Sale</span>
                                                    @endif

                                                    <!-- Nhãn Hết hàng -->
                                                    @if ($relatedProduct->quantity == 0)
                                                        <span class="badge bg-secondary position-absolute top-0 end-0">Hết
                                                            hàng</span>
                                                    @endif

                                                    <!-- Hình ảnh sản phẩm -->
                                                    <div class="block2-pic hov-img0">
                                                        @php
                                                            $images = $relatedProduct->image
                                                                ? json_decode($relatedProduct->image)
                                                                : [];
                                                        @endphp
                                                        @if (!empty($images) && (is_array($images) || is_object($images)))
                                                            <img src="{{ asset('storage/' . $images[0]) }}"
                                                                alt="{{ $relatedProduct->name }}" class="img-fluid"
                                                                style="height: 200px; object-fit: cover;">
                                                        @else
                                                            <img src="{{ asset('images/default-placeholder.jpg') }}"
                                                                alt="No Image" class="img-fluid"
                                                                style="height: 200px; object-fit: cover;">
                                                        @endif

                                                        <!-- Nút "Quick View" -->
                                                        <a href="{{ route('products.show', $relatedProduct->id) }}"
                                                            class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04">
                                                            Xem nhanh
                                                        </a>
                                                    </div>

                                                    <!-- Thông tin sản phẩm -->
                                                    <div class="block2-txt flex-w flex-t p-t-14">
                                                        <div class="block2-txt-child1 flex-col-l">
                                                            <a href="{{ route('products.show', $relatedProduct->id) }}"
                                                                class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                                                {{ $relatedProduct->name }}
                                                            </a>
                                                            @if ($relatedProduct->sale_percentage)
                                                                <span
                                                                    class="stext-105 cl3 text-muted text-decoration-line-through">
                                                                    {{ number_format($relatedProduct->price, 0, ',', '.') }}
                                                                    VND
                                                                </span>
                                                                <span class="stext-105 cl3 text-danger fw-bold">
                                                                    {{ number_format($relatedProduct->price - $$relatedProduct->price * ($relatedProduct->sale_percentage / 100), 0, ',', '.') }}
                                                                    VND
                                                                </span>
                                                            @else
                                                                <span class="stext-105 cl3">
                                                                    {{ number_format($relatedProduct->price, 0, ',', '.') }}
                                                                    VND
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
    </section>


    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="{{ asset('js/scripts.js') }}">
        $(document).ready(function() {
            $('.slick3').slick({
                dots: true,
                arrows: true,
                infinite: true,
                speed: 500,
                slidesToShow: 1,
                slidesToScroll: 1
            });
        });
    </script>
    <script>
        document.getElementById('read-more-btn').addEventListener('click', function() {
            var descriptionText = document.getElementById('description-text');
            var readMoreBtn = document.getElementById('read-more-btn');

            // Check if the description is truncated
            if (descriptionText.style.maxHeight === 'none') {
                descriptionText.style.maxHeight = '150px'; // Reset the height to truncate
                readMoreBtn.innerText = 'Xem thêm'; // Change button text to "Read more"
            } else {
                descriptionText.style.maxHeight = 'none'; // Remove the height limit to show full text
                readMoreBtn.innerText = 'Ẩn bớt'; // Change button text to "Show less"
            }
        });
    </script>



    </body>
@endsection

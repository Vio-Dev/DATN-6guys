@extends('layout')

@section('content')


    <!-- Shop Detail Start -->
    <div class="container-fluid py-5">
        <div class="row px-xl-5">
            <div class="col-lg-5 pb-5">
                <div id="product-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner border">
                        @if ($images && (is_array($images) || is_object($images)))
                            @foreach ($images as $index => $image)
                                <div class="carousel-item @if ($index === 0) active @endif">
                                    <img class="w-100 h-100" src="{{ asset('storage/' . $image) }}" alt="Image">
                                </div>
                            @endforeach
                        @else
                            <div class="carousel-item active">
                                <img class="w-100 h-100" src="{{ asset('img/default-placeholder.jpg') }}"
                                    alt="Default Image">
                            </div>
                        @endif
                    </div>
                    <a class="carousel-control-prev" href="#product-carousel" role="button" data-slide="prev">
                        <i class="fa fa-2x fa-angle-left text-dark"></i>
                    </a>
                    <a class="carousel-control-next" href="#product-carousel" role="button" data-slide="next">
                        <i class="fa fa-2x fa-angle-right text-dark"></i>
                    </a>
                </div>
            </div>


            <div class="col-lg-7 pb-5">
                <h3 class="font-weight-semi-bold"> {{ $product->name }}</h3>
                <div class="d-flex mb-3">
                    <div class="text-primary mr-2">
                        <small class="fas fa-star"></small>
                        <small class="fas fa-star"></small>
                        <small class="fas fa-star"></small>
                        <small class="fas fa-star-half-alt"></small>
                        <small class="far fa-star"></small>
                    </div>
                    <small class="pt-1">(50 Reviews)</small>
                </div>
                {{-- <h3 class="font-weight-semi-bold mb-4">$</h3> --}}
                @if ($product->sale)
                    <!-- Giá cũ bị gạch ngang -->

                    <h3 class="font-weight-semi-bold mb-4" style="text-decoration: line-through;">
                        Giá: {{ number_format($product->price) }} VNĐ
                    </h3>
                    <!-- Giá mới sau giảm -->
                    <h3 class="font-weight-semi-bold mb-4" style="color: #FF0000;">
                        Giá sale: {{ number_format($product->price - $product->price * ($product->sale_percentage / 100)) }}
                        VNĐ
                    </h3>
                @else
                    <!-- Hiển thị giá bình thường nếu không có giảm giá -->
                    <span class="mtext-106 cl2">
                        Giá: {{ number_format($product->price) }} VNĐ
                    </span>
                @endif
                <p class="mb-4">Volup erat ipsum diam elitr rebum et dolor. Est nonumy elitr erat diam stet sit clita ea.
                    Sanc invidunt ipsum et, labore clita lorem magna lorem ut. Erat lorem duo dolor no sea nonumy. Accus
                    labore stet, est lorem sit diam sea et justo, amet at lorem et eirmod ipsum diam et rebum kasd rebum.
                </p>
                {{-- <div class="d-flex mb-3">
                            <p class="text-dark font-weight-medium mb-0 mr-3">Sizes:</p>
                            <form>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" id="size-1" name="size">
                                    <label class="custom-control-label" for="size-1">XS</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" id="size-2" name="size">
                                    <label class="custom-control-label" for="size-2">S</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" id="size-3" name="size">
                                    <label class="custom-control-label" for="size-3">M</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" id="size-4" name="size">
                                    <label class="custom-control-label" for="size-4">L</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" id="size-5" name="size">
                                    <label class="custom-control-label" for="size-5">XL</label>
                                </div>
                            </form>
                        </div>
                        <div class="d-flex mb-4">
                            <p class="text-dark font-weight-medium mb-0 mr-3">Colors:</p>
                            <form>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" id="color-1" name="color">
                                    <label class="custom-control-label" for="color-1">Black</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" id="color-2" name="color">
                                    <label class="custom-control-label" for="color-2">White</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" id="color-3" name="color">
                                    <label class="custom-control-label" for="color-3">Red</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" id="color-4" name="color">
                                    <label class="custom-control-label" for="color-4">Blue</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" id="color-5" name="color">
                                    <label class="custom-control-label" for="color-5">Green</label>
                                </div>
                            </form>
                        </div> --}}
                <div class="d-flex align-items-center mb-4 pt-2">
                    <div class="input-group quantity mr-3" style="width: 130px;">
                        <div class="input-group-btn">
                            <button class="btn btn-primary btn-minus">
                                <i class="fa fa-minus"></i>
                            </button>
                        </div>
                        <input type="text" class="form-control bg-secondary text-center" value="1">
                        <div class="input-group-btn">
                            <button class="btn btn-primary btn-plus">
                                <i class="fa fa-plus"></i>
                            </button>
                        </div>
                    </div>
                    <form action="{{ route('cart.add', ['itemId' => $product->id, 'quantity' => 1]) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-primary px-3">
                            <i class="fa fa-shopping-cart mr-1"></i>Thêm vào giỏ hàng
                        </button>
                    </form>
                </div>
                <div class="d-flex pt-2">
                    <p class="text-dark font-weight-medium mb-0 mr-2">Share on:</p>
                    <div class="d-inline-flex">
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-pinterest"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row px-xl-5">
            <div class="col">
                <div class="nav nav-tabs justify-content-center border-secondary mb-4">
                    <a class="nav-item nav-link active" data-toggle="tab" href="#tab-pane-1">Description</a>
                    <a class="nav-item nav-link" data-toggle="tab" href="#tab-pane-2">Information</a>
                    <a class="nav-item nav-link" data-toggle="tab" href="#tab-pane-3">Reviews (0)</a>
                </div>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="tab-pane-1">
                        <h4 class="mb-3">Product Description</h4>
                        <p>Eos no lorem eirmod diam diam, eos elitr et gubergren diam sea. Consetetur vero aliquyam invidunt
                            duo dolores et duo sit. Vero diam ea vero et dolore rebum, dolor rebum eirmod consetetur
                            invidunt sed sed et, lorem duo et eos elitr, sadipscing kasd ipsum rebum diam. Dolore diam stet
                            rebum sed tempor kasd eirmod. Takimata kasd ipsum accusam sadipscing, eos dolores sit no ut diam
                            consetetur duo justo est, sit sanctus diam tempor aliquyam eirmod nonumy rebum dolor accusam,
                            ipsum kasd eos consetetur at sit rebum, diam kasd invidunt tempor lorem, ipsum lorem elitr
                            sanctus eirmod takimata dolor ea invidunt.</p>
                        <p>Dolore magna est eirmod sanctus dolor, amet diam et eirmod et ipsum. Amet dolore tempor
                            consetetur sed lorem dolor sit lorem tempor. Gubergren amet amet labore sadipscing clita clita
                            diam clita. Sea amet et sed ipsum lorem elitr et, amet et labore voluptua sit rebum. Ea erat sed
                            et diam takimata sed justo. Magna takimata justo et amet magna et.</p>
                    </div>
                    <div class="tab-pane fade" id="tab-pane-2">
                        <h4 class="mb-3">Additional Information</h4>
                        <p>Eos no lorem eirmod diam diam, eos elitr et gubergren diam sea. Consetetur vero aliquyam invidunt
                            duo dolores et duo sit. Vero diam ea vero et dolore rebum, dolor rebum eirmod consetetur
                            invidunt sed sed et, lorem duo et eos elitr, sadipscing kasd ipsum rebum diam. Dolore diam stet
                            rebum sed tempor kasd eirmod. Takimata kasd ipsum accusam sadipscing, eos dolores sit no ut diam
                            consetetur duo justo est, sit sanctus diam tempor aliquyam eirmod nonumy rebum dolor accusam,
                            ipsum kasd eos consetetur at sit rebum, diam kasd invidunt tempor lorem, ipsum lorem elitr
                            sanctus eirmod takimata dolor ea invidunt.</p>
                        <div class="row">
                            <div class="col-md-6">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item px-0">
                                        Sit erat duo lorem duo ea consetetur, et eirmod takimata.
                                    </li>
                                    <li class="list-group-item px-0">
                                        Amet kasd gubergren sit sanctus et lorem eos sadipscing at.
                                    </li>
                                    <li class="list-group-item px-0">
                                        Duo amet accusam eirmod nonumy stet et et stet eirmod.
                                    </li>
                                    <li class="list-group-item px-0">
                                        Takimata ea clita labore amet ipsum erat justo voluptua. Nonumy.
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item px-0">
                                        Sit erat duo lorem duo ea consetetur, et eirmod takimata.
                                    </li>
                                    <li class="list-group-item px-0">
                                        Amet kasd gubergren sit sanctus et lorem eos sadipscing at.
                                    </li>
                                    <li class="list-group-item px-0">
                                        Duo amet accusam eirmod nonumy stet et et stet eirmod.
                                    </li>
                                    <li class="list-group-item px-0">
                                        Takimata ea clita labore amet ipsum erat justo voluptua. Nonumy.
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab-pane-3">
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="mb-4">1 review for "Colorful Stylish Shirt"</h4>
                                <div class="media mb-4">
                                    <img src="img/user.jpg" alt="Image" class="img-fluid mr-3 mt-1"
                                        style="width: 45px;">
                                    <div class="media-body">
                                        <h6>John Doe<small> - <i>01 Jan 2045</i></small></h6>
                                        <div class="text-primary mb-2">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star-half-alt"></i>
                                            <i class="far fa-star"></i>
                                        </div>
                                        <p>Diam amet duo labore stet elitr ea clita ipsum, tempor labore accusam ipsum et no
                                            at. Kasd diam tempor rebum magna dolores sed sed eirmod ipsum.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h4 class="mb-4">Leave a review</h4>
                                <small>Your email address will not be published. Required fields are marked *</small>
                                <div class="d-flex my-3">
                                    <p class="mb-0 mr-2">Your Rating * :</p>
                                    <div class="text-primary">
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                    </div>
                                </div>
                                <form>
                                    <div class="form-group">
                                        <label for="message">Your Review *</label>
                                        <textarea id="message" cols="30" rows="5" class="form-control"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Your Name *</label>
                                        <input type="text" class="form-control" id="name">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Your Email *</label>
                                        <input type="email" class="form-control" id="email">
                                    </div>
                                    <div class="form-group mb-0">
                                        <input type="submit" value="Leave Your Review" class="btn btn-primary px-3">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Products End -->
    <!-- Shop Detail End -->
    <!-- Shop Detail End -->
    <div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">Sản phẩm khác</span></h2>
        </div>

        <div class="position-relative">
            <!-- Nút chuyển sản phẩm bên trái -->
            <a class="btn btn-sm btn-dark position-absolute"
                style="left: 0; top: 50%; transform: translateY(-50%); z-index: 10;" href="#" id="prevBtn">
                <i class="fa fa-chevron-left"></i>
            </a>

            <!-- Nút chuyển sản phẩm bên phải -->
            <a class="btn btn-sm btn-dark position-absolute"
                style="right: 0; top: 50%; transform: translateY(-50%); z-index: 10;" href="#" id="nextBtn">
                <i class="fa fa-chevron-right"></i>
            </a>

            <!-- Dưới đây là danh sách các sản phẩm hiển thị -->
            <div class="row px-xl-5 pb-3" id="product-container">
                @foreach ($relatedProducts as $relatedProduct)
                    <div class="col-lg-3 col-md-6 col-sm-12 pb-1 product-card">
                        <div class="card product-item border-0 mb-4">
                            <!-- Hình ảnh sản phẩm -->
                            <div
                                class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                <img class="img-fluid w-100"
                                    src="{{ asset('storage/' . ($relatedProduct->image ? json_decode($relatedProduct->image)[0] : 'images/default-placeholder.jpg')) }}"
                                    alt="{{ $relatedProduct->name }}" style="height: 250px; object-fit: cover;">
                                @if ($relatedProduct->sale_percentage)
                                    <span class="badge bg-danger text-white position-absolute"
                                        style="top: 10px; left: 10px; z-index: 2;">
                                        Sale {{ $relatedProduct->sale_percentage }}%
                                    </span>
                                @endif
                                @if ($relatedProduct->quantity == 0)
                                    <span class="badge bg-dark text-white position-absolute"
                                        style="top: 10px; right: 10px; z-index: 2;">
                                        Hết hàng
                                    </span>
                                @endif
                            </div>
                            <!-- Thông tin sản phẩm -->
                            <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                <h6 class="text-truncate mb-3">{{ $relatedProduct->name }}</h6>
                                <div class="d-flex justify-content-center">
                                    @if ($relatedProduct->sale_percentage)
                                        <h6>{{ number_format($relatedProduct->price - $relatedProduct->price * ($relatedProduct->sale_percentage / 100), 0, ',', '.') }}
                                            VND</h6>
                                        <h6 class="text-muted ml-2">
                                            <del>{{ number_format($relatedProduct->price, 0, ',', '.') }}
                                                VND</del>
                                        </h6>
                                    @else
                                        <h6>{{ number_format($relatedProduct->price, 0, ',', '.') }} VND</h6>
                                    @endif
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-between bg-light border">
                                <a href="{{ route('products.show', $relatedProduct->id) }}"
                                    class="btn btn-sm text-dark p-0 @if ($relatedProduct->quantity == 0) disabled @endif">
                                    <i class="fas fa-eye text-primary mr-1"></i>Xem chi tiết
                                </a>
                                <form action="{{ route('wishlist.store', $relatedProduct->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-sm text-dark p-0">
                                        <i class="fas fa-heart text-danger mr-1"></i>Yêu thích
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    < <!-- Bootstrap core JS-->
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
        <script>
            document.addEventListener('DOMContentLoaded', function () {
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');
    const productContainer = document.getElementById('product-container');
    const itemsPerPage = 4; // Hiện 4 sản phẩm mỗi lần.
    let currentIndex = 0;

    function showItems() {
        const products = document.querySelectorAll('.product-card');
        products.forEach((item, index) => {
            item.style.display = (index >= currentIndex && index < currentIndex + itemsPerPage) ? 'block' : 'none';
        });
    }

    showItems(); // Hiện các sản phẩm ban đầu

    nextBtn.addEventListener('click', function () {
        const products = document.querySelectorAll('.product-card');
        if (currentIndex + itemsPerPage < products.length) {
            currentIndex += itemsPerPage;
            showItems();
        }
    });

    prevBtn.addEventListener('click', function () {
        if (currentIndex - itemsPerPage >= 0) {
            currentIndex -= itemsPerPage;
            showItems();
        }
    });
});

        </script>
    @endsection

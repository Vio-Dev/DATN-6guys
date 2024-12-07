<!DOCTYPE html>
<html lang="en">
<!-- Mirrored from mironmahmud.com/greeny/assets/ltr/home-classic.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 16 May 2024 15:06:41 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="template" content="greeny">
    <meta name="title" content="greeny - Ecommerce Food Store HTML Template">
    <meta name="keywords"
        content="organic, food, shop, ecommerce, store, html, bootstrap, template, agriculture, vegetables, products, farm, grocery, natural, online">
    <title>6Guys- User Home </title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    {{-- <link href="vendor/bootstrap/bootstrap.min.css" rel="stylesheet"> --}}
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> --}}
    <link rel="icon" href="{{ asset('/images/favicon.png') }}">
    <link rel="stylesheet" href="{{ asset('/fonts/flaticon/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('/fonts/icofont/icofont.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/fonts/fontawesome/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/vendor/venobox/venobox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/vendor/slickslider/slick.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/vendor/niceselect/nice-select.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/vendor/bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/main.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('/css/home-grid.css') }}">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">

</head>

<body>
    <div class="backdrop"></div><a class="backtop fas fa-arrow-up" href="#"></a>

    <header class="header-part">
        <div class="container">
            <div class="header-content">
                <div class="header-media-group"><button class="header-user"><img src="{{ asset('img/user.png') }}" alt="user"></button>
                    <a href="{{ route('index') }}">
                        <img src="/img/logo1.png" alt="Logo">
                    </a>
                            <button class="header-src"><i class="fas fa-search"></i></button></div>
                            <a href="{{ route('index') }}" class="header-logo"><img src="/img/logo1.png" alt="Logo" style="width: 140px; height: auto;"></a>
                    <li class="navbar-item dropdown">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
                        </svg>
                    <ul class="dropdown-position-list">
                        @if (Route::has('login'))
                            <nav class="-mx-3 flex flex-1 justify-end">
                                @auth
                                    
                                    <a href="{{ url('/profile') }}"
                                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                                        Profile
                                    </a>
                                    <li class="navbar-item">
                                        <a class="navbar-link dropdown" href="">Oder</a>
                                    </li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf

                                        <x-dropdown-link :href="route('logout')"
                                            onclick="event.preventDefault();
                                                        this.closest('form').submit();">
                                            {{ __('Log Out') }}
                                        </x-dropdown-link>
                                    </form>
                                @else
                                    <li><a href="{{ route('login') }}">Profile</a></li>
                                    <li><a href="{{ route('login') }}">login</a></li>
                                    <li><a href="{{ route('register') }}">register</a></li>
                                @endauth
                            </nav>
                        @endif
                    </ul>
                </li>
                <form class="header-form" action="{{ route('search') }}" method="GET">
                    <input type="text" name="query" placeholder="Search anything...">
                    <button type="submit"><i class="fas fa-search"></i></button>
                </form>
                <div class="header-widget-group">
                    <a href="{{ route('user.orders.index') }}" class="header-widget" title="Oder List">
                        <i class="bi bi-bag-check-fill"></i><sup>0</sup>
                    </a>
                    <a href="wishlist.html" class="header-widget" title="Wishlist">
                        <i class="fas fa-heart"></i><sup>0</sup>
                    </a>
                    <a href="{{ route('cart.index') }}" class="header-widget header-cart" title="Cartlist">
                        <i class="fas fa-shopping-basket"></i>
                        <sup>{{ $cartItemCount ?? 0 }}</sup> <!-- Thay $cartItemCount bằng biến chứa số lượng sản phẩm trong giỏ -->
                        <span>
                            total price<small>${{ $totalPrice ?? 0 }}</small> <!-- Thay $totalPrice bằng biến chứa tổng giá tiền -->
                        </span>
                    </a>
                </div>
                
        </div>
    </header>
    <nav class="navbar-part">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="navbar-content">
                        <ul class="navbar-list">
                            <li class="navbar-item dropdown"><a class="navbar-link " href="{{ route('index') }}">home</a>

                            </li>
                            
                            
                            <li class="navbar-item dropdown"><a class="navbar-link dropdown-arrow" 
                                href="">Shop</a>
                                <ul class="dropdown-position-list">
                                    <li><a href="{{ route('category.manhinh') }}">Màn Hình</a></li>
                                    <li><a href="{{ route('category.banphimco') }}">Bàn Phím</a></li>
                                    <li><a href="{{ route('category.banhoc') }}">Bàn Làm Việc</a></li>
                                    <li><a href="{{ route('category.tranhtreotuong') }}">Tranh Treo Tường</a></li>
                                    <li><a href="{{ route('category.chuotkhongday') }}">Chuột Không Dây</a></li>
                                    <li><a href="#">Đồng Hồ Để Bàn</a></li>
                                    <li><a href="#">ARM</a></li>
                                    <li><a href="#">LED RGB</a></li>

                                </ul>
                            </li>

                        </ul>
                        <div class="navbar-info-group">
                            <div class="navbar-info"><i class="icofont-ui-touch-phone"></i>
                                <p><small>call us</small><span>(+84) 337 537 556</span></p>
                            </div>
                            <div class="navbar-info"><i class="icofont-ui-email"></i>
                                <p><small>email us</small><span>Vandieukd@gmail.com</span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    @include('layouts.sidebar')
    @yield('content')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<script>
  AOS.init();
</script>

    <footer class="footer-part">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-xl-3">
                    <div class="footer-widget">
                        <a class="footer-logo" href="#">
                            <img src="{{ asset('img/logo1.png') }}" alt="logo">
                        </a>
                        <p class="footer-desc"></p>
                        <ul class="footer-social">
                            <li><a class="fab fa-facebook" href="#"></a></li>
                            <li><a class="icofont-twitter" href="#"></a></li>
                            <li><a class="icofont-linkedin" href="#"></a></li>
                            <li><a class="icofont-instagram" href="#"></a></li>
                            <li><a class="icofont-pinterest" href="#"></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="footer-widget contact">
                        <h3 class="footer-title">liên hệ với chúng tôi</h3>
                        <ul class="footer-contact">
                            <li><i class="icofont-ui-email"></i>
                                <p><span>Vandieukd@gmail.com</span><span>gutboy0500@gmail.com</span></p>
                            </li>
                            <li><i class="icofont-ui-touch-phone"></i>
                                <p><span>0399 029 537</span><span>0778 257 480</span></p>
                            </li>
                            <li><i class="icofont-location-pin"></i>
                                <p>100 Ymoanl - P.Tân Lợi <br> TP.BMT - Đăk Lăk</p>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="footer-widget">
                        <h3 class="footer-title">quick Links</h3>
                        <div class="footer-links">
                            <ul>
                                <li><a href="#">My Account</a></li>
                                <li><a href="#">Order History</a></li>
                                <li><a href="#">Order Tracking</a></li>
                                <li><a href="#">Best Seller</a></li>
                                <li><a href="#">New Arrivals</a></li>
                            </ul>
                            <ul>
                                <li><a href="#">Location</a></li>
                                <li><a href="#">Affiliates</a></li>
                                <li><a href="#">Contact</a></li>
                                <li><a href="#">Carrer</a></li>
                                <li><a href="#">Faq</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="footer-widget">
                        <h3 class="footer-title">Tải ứng dụng</h3>
                        <p class="footer-desc"></p>
                        <div class="footer-app">
                            <a href="#">
                                <img src="{{ asset('img/google-store.png') }}" alt="google">
                            </a>
                            <a href="#">
                                <img src="{{ asset('img/app-store.png') }}" alt="app">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="footer-bottom">
                        <p class="footer-copytext">&copy; All Copyrights Reserved by <a href="#">Mironcoder</a>
                        </p>
                        <div class="footer-card">
                            <a href="#">
                                <img src="{{ asset('img/01.jpg') }}" alt="payment">
                            </a>
                            <a href="#">
                                <img src="{{ asset('img/02.jpg') }}" alt="payment">
                            </a>
                            <a href="#">
                                <img src="{{ asset('img/03.jpg') }}" alt="payment">
                            </a>
                            <a href="#">
                                <img src="{{ asset('img/04.jpg') }}" alt="payment">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <script src="{{ asset('/vendor/bootstrap/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('/vendor/bootstrap/popper.min.js') }}"></script>
    <script src="{{ asset('/vendor/bootstrap/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/vendor/countdown/countdown.min.js') }}"></script>
    <script src="{{ asset('/vendor/niceselect/nice-select.min.js') }}"></script>
    <script src="{{ asset('/vendor/slickslider/slick.min.js') }}"></script>
    <script src="{{ asset('/vendor/venobox/venobox.min.js') }}"></script>
    <script src="{{ asset('/js/nice-select.js') }}"></script>
    <script src="{{ asset('/js/countdown.js') }}"></script>
    <script src="{{ asset('/js/accordion.js') }}"></script>
    <script src="{{ asset('/js/venobox.js') }}"></script>
    <script src="{{ asset('/js/slick.js') }}"></script>
    <script src="{{ asset('/js/main.js') }}"></script>
</body>
<!-- Mirrored from mironmahmud.com/greeny/assets/ltr/home-classic.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 16 May 2024 15:07:59 GMT -->

</html>

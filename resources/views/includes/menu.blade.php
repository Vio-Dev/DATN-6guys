 <!-- Header -->

 <body class="animsition">
     <header class="header-v2">
         <!-- Header desktop -->
         <div class="container-menu-desktop trans-03">
             <div class="wrap-menu-desktop">
                 <nav class="limiter-menu-desktop p-l-45">

                     <!-- Logo desktop -->
                     <a href="{{ route('index') }}" class="logo">
                         <img src="{{ asset('img/logo1.png') }}" alt="IMG-LOGO">
                     </a>

                     <!-- Menu desktop -->
                     <div class="menu-desktop">
                         <ul class="main-menu">
                             <li>
                                 <a href="{{ route('index') }}">Trang chủ</a>
                             </li>
                             <li class="active-menu" >
                                 <a href="{{ route('products.showall') }}" data-label1="hot">Sản phẩm</a>
                                 <ul class="sub-menu">
                                     <li><a href="{{ route('category.manhinh') }}">Màn Hình</a></li>
                                     <li><a href="{{ route('category.banphimco') }}">Bàn Phím</a></li>
                                     <li><a href="{{ route('category.banhoc') }}">Bàn Làm Việc</a></li>
                                     <li><a href="{{ route('category.tranhtreotuong') }}">Tranh Treo Tường</a></li>
                                     <li><a href="{{ route('category.chuotkhongday') }}">Chuột Không Dây</a></li>
                                 </ul>
                             </li>
                          

                             <li>
                                 <a href="{{ route('user.blog.index') }}">Bài viết</a>
                             </li>

                             <li>
                                 <a href="{{ route('about') }}">Về chúng tôi</a>
                             </li>

                             <li>
                                 <a href="{{ route('contact') }}">Liên hệ</a>
                             </li>
                         </ul>
                     </div>

                     <!-- Icon header -->
                     <div class="wrap-icon-header flex-w flex-r-m h-full">
                         <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search">
                             <i class="zmdi zmdi-search"></i>
                         </div>

                         <div class="flex-c-m h-full p-l-18 p-r-25 bor5">
                            <div class="icon-header-item cl2 hov-cl1 trans-04 p-lr-11 icon-header-noti js-show-cart"
                                data-notify="{{ isset($cart) && is_array($cart) ? count($cart) : 0 }}">
                                <i class="zmdi zmdi-shopping-cart"></i>
                            </div>
                        </div>

                         <div class="flex-c-m h-full p-lr-19">
                             <div class="icon-header-item cl2 hov-cl1 trans-04 p-lr-11 js-show-sidebar">
                                 <i class="zmdi zmdi-menu"></i>
                             </div>
                         </div>
                     </div>
                 </nav>
             </div>
         </div>

         <!-- Header Mobile -->
         <div class="wrap-header-mobile">
             <!-- Logo moblie -->
             <div class="logo-mobile">
                 <a href="index.html"><img src="{{ asset('img/logo1.png') }}" alt="IMG-LOGO"></a>
             </div>

             <!-- Icon header -->
             <div class="wrap-icon-header flex-w flex-r-m h-full m-r-15">
                 <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search">
                     <i class="zmdi zmdi-search"></i>
                 </div>
                 <div class="flex-c-m h-full p-lr-10 bor5">
                    <div class="icon-header-item cl2 hov-cl1 trans-04 p-lr-11 icon-header-noti js-show-cart"
                        data-notify="{{ isset($cart) && is_array($cart) ? count($cart) : 0 }}">
                        <i class="zmdi zmdi-shopping-cart"></i>
                    </div>
                </div>
             </div>

             <!-- Button show menu -->
             <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
                 <span class="hamburger-box">
                     <span class="hamburger-inner"></span>
                 </span>
             </div>
         </div>


         <!-- Menu Mobile -->
         <div class="menu-mobile">
             <ul class="main-menu-m">
                 <li>
                     <a href="{{ route('index') }}">Trang chủ</a>
                 </li>
                 <li class="label1" data-label1="hot">
                     <a href="{{ route('products.showall') }}">Sản phẩm</a>
                     <ul class="sub-menu-m">
                         <li><a href="{{ route('category.manhinh') }}">Màn Hình</a></li>
                         <li><a href="{{ route('category.banphimco') }}">Bàn Phím</a></li>
                         <li><a href="{{ route('category.banhoc') }}">Bàn Làm Việc</a></li>
                         <li><a href="{{ route('category.tranhtreotuong') }}">Tranh Treo Tường</a></li>
                         <li><a href="{{ route('category.chuotkhongday') }}">Chuột Không Dây</a></li>
                     </ul>
                     <span class="arrow-main-menu-m">
                         <i class="fa fa-angle-right" aria-hidden="true"></i>
                     </span>
                 </li>
				

				<li>
					<a href="{{ route('user.blog.index') }}">Bài viết</a>
				</li>

				<li>
					<a href="{{ route('about') }}">Về chúng tôi</a>
				</li>

				<li>
					<a href="{{ route('contact') }}">Liên hệ</a>
				</li>
             </ul>
         </div>

         <!-- Modal Search -->
         <div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
             <div class="container-search-header">
                 <button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
                     <img src="{{ asset('images/icons/icon-close2.png') }}" alt="CLOSE">
                 </button>

                 <form class="wrap-search-header flex-w p-l-15" action="{{ route('search') }}" method="GET">
                     <button class="flex-c-m trans-04">
                         <i class="zmdi zmdi-search"></i>
                     </button>
                     <input class="plh3" type="text" name="query" placeholder="Tìm kiếm...">
                 </form>
             </div>
         </div>
     </header>
     <!-- Sidebar -->
     {{-- <aside class="wrap-sidebar js-sidebar">
		<div class="s-full js-hide-sidebar"></div>

		<div class="sidebar flex-col-l p-t-22 p-b-25">
			<div class="flex-r w-full p-b-30 p-r-27">
				<div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-sidebar">
					<i class="zmdi zmdi-close"></i>
				</div>
			</div>

			<div class="sidebar-content flex-w w-full p-lr-65 js-pscroll">
				<ul class="sidebar-link w-full">
					<li class="p-b-13">
						<a href="index.html" class="stext-102 cl2 hov-cl1 trans-04">
							Home
						</a>
					</li>

					<li class="p-b-13">
						<a href="#" class="stext-102 cl2 hov-cl1 trans-04">
							My Wishlist
						</a>
					</li>

					<li class="p-b-13">
						<a href="{{route('login')}}" class="stext-102 cl2 hov-cl1 trans-04">
							My Account
						</a>
					</li>

					<li class="p-b-13">
						<a href="#" class="stext-102 cl2 hov-cl1 trans-04">
							Track Oder
						</a>
					</li>

					<li class="p-b-13">
						<a href="#" class="stext-102 cl2 hov-cl1 trans-04">
							Refunds
						</a>
					</li>

					<li class="p-b-13">
						<a href="#" class="stext-102 cl2 hov-cl1 trans-04">
							Help & FAQs
						</a>
					</li>
				</ul>

				<div class="sidebar-gallery w-full p-tb-30">
					<span class="mtext-101 cl5">
						@ CozaStore
					</span>

					<div class="flex-w flex-sb p-t-36 gallery-lb">
						<!-- item gallery sidebar -->
						<div class="wrap-item-gallery m-b-10">
							<a class="item-gallery bg-img1" href="images/gallery-01.jpg" data-lightbox="gallery" 
							style="background-image: url('images/gallery-01.jpg');"></a>
						</div>

						<!-- item gallery sidebar -->
						<div class="wrap-item-gallery m-b-10">
							<a class="item-gallery bg-img1" href="images/gallery-02.jpg" data-lightbox="gallery" 
							style="background-image: url('images/gallery-02.jpg');"></a>
						</div>

						<!-- item gallery sidebar -->
						<div class="wrap-item-gallery m-b-10">
							<a class="item-gallery bg-img1" href="images/gallery-03.jpg" data-lightbox="gallery" 
							style="background-image: url('images/gallery-03.jpg');"></a>
						</div>

						<!-- item gallery sidebar -->
						<div class="wrap-item-gallery m-b-10">
							<a class="item-gallery bg-img1" href="images/gallery-04.jpg" data-lightbox="gallery" 
							style="background-image: url('images/gallery-04.jpg');"></a>
						</div>

						<!-- item gallery sidebar -->
						<div class="wrap-item-gallery m-b-10">
							<a class="item-gallery bg-img1" href="images/gallery-05.jpg" data-lightbox="gallery" 
							style="background-image: url('images/gallery-05.jpg');"></a>
						</div>

						<!-- item gallery sidebar -->
						<div class="wrap-item-gallery m-b-10">
							<a class="item-gallery bg-img1" href="images/gallery-06.jpg" data-lightbox="gallery" 
							style="background-image: url('images/gallery-06.jpg');"></a>
						</div>

						<!-- item gallery sidebar -->
						<div class="wrap-item-gallery m-b-10">
							<a class="item-gallery bg-img1" href="images/gallery-07.jpg" data-lightbox="gallery" 
							style="background-image: url('images/gallery-07.jpg');"></a>
						</div>

						<!-- item gallery sidebar -->
						<div class="wrap-item-gallery m-b-10">
							<a class="item-gallery bg-img1" href="images/gallery-08.jpg" data-lightbox="gallery" 
							style="background-image: url('images/gallery-08.jpg');"></a>
						</div>

						<!-- item gallery sidebar -->
						<div class="wrap-item-gallery m-b-10">
							<a class="item-gallery bg-img1" href="images/gallery-09.jpg" data-lightbox="gallery" 
							style="background-image: url('images/gallery-09.jpg');"></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</aside> --}}
     <aside class="wrap-sidebar js-sidebar">
         <div class="s-full js-hide-sidebar"></div>

         <div class="sidebar flex-col-l p-t-22 p-b-25">
             <div class="flex-r w-full p-b-30 p-r-27">
                 <div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-sidebar">
                     <i class="zmdi zmdi-close"></i>
                 </div>
             </div>

             <div class="sidebar-content flex-w w-full p-lr-65 js-pscroll">
                 <ul class="sidebar-link w-full">
                     <li class="p-b-13">
                         <a href="{{ route('index') }}" class="stext-102 cl2 hov-cl1 trans-04">
                             Trang chủ
                         </a>
                     </li>

                     <li class="p-b-13">
                         <a href="#" class="stext-102 cl2 hov-cl1 trans-04">
                            Sản phẩm yêu thích
                         </a>
                     </li>


                     <!-- Menu đăng nhập/đăng ký và thông tin người dùng -->
                     @if (Route::has('login'))
                         <nav class="mt-3">
                             @auth
                                 <li class="p-b-13">
                                     <a href="{{ url('/profile') }}" class="stext-102 cl2 hov-cl1 trans-04">
                                        Hồ sơ người dùng
                                     </a>
                                 </li>

                                 <li class="p-b-13">
                                     <a href="{{ route('user.orders.index') }}" class="stext-102 cl2 hov-cl1 trans-04">
                                         Đơn hàng
                                     </a>
                                 </li>
                             @else
                                 <li class="p-b-13">
                                     <a href="{{ route('login') }}" class="stext-102 cl2 hov-cl1 trans-04">
                                         Đăng nhập
                                     </a>
                                 </li>
                                 <li class="p-b-13">
                                     <a href="{{ route('register') }}" class="stext-102 cl2 hov-cl1 trans-04">
                                        Đăng ký
                                     </a>
                                 </li>
                                 <li class="p-b-13">
                                     <a href="{{ route('user.orders.index') }}" class="stext-102 cl2 hov-cl1 trans-04">
                                        Đơn hàng
                                     </a>
                                 </li>
                             @endauth
                         </nav>
                     @endif
                 </ul>

                 <div class="sidebar-gallery w-full p-tb-30">
                     <span class="mtext-101 cl5">
                         phamtrangiahuyhuy@gmail.com
                     </span>

                     <div class="flex-w flex-sb p-t-36 gallery-lb">
                         <!-- item gallery sidebar -->
                         <div class="wrap-item-gallery m-b-10">
                             <a class="item-gallery bg-img1" href="images/gallery-01.jpg" data-lightbox="gallery"
                                 style="background-image: url('images/gallery-01.jpg');"></a>
                         </div>

                         <!-- item gallery sidebar -->
                         <div class="wrap-item-gallery m-b-10">
                             <a class="item-gallery bg-img1" href="images/gallery-02.jpg" data-lightbox="gallery"
                                 style="background-image: url('images/gallery-02.jpg');"></a>
                         </div>

                         <!-- item gallery sidebar -->
                         <div class="wrap-item-gallery m-b-10">
                             <a class="item-gallery bg-img1" href="images/gallery-03.jpg" data-lightbox="gallery"
                                 style="background-image: url('images/gallery-03.jpg');"></a>
                         </div>

                         <!-- item gallery sidebar -->
                         <div class="wrap-item-gallery m-b-10">
                             <a class="item-gallery bg-img1" href="images/gallery-04.jpg" data-lightbox="gallery"
                                 style="background-image: url('images/gallery-04.jpg');"></a>
                         </div>

                         <!-- item gallery sidebar -->
                         <div class="wrap-item-gallery m-b-10">
                             <a class="item-gallery bg-img1" href="images/gallery-05.jpg" data-lightbox="gallery"
                                 style="background-image: url('images/gallery-05.jpg');"></a>
                         </div>

                         <!-- item gallery sidebar -->
                         <div class="wrap-item-gallery m-b-10">
                             <a class="item-gallery bg-img1" href="images/gallery-06.jpg" data-lightbox="gallery"
                                 style="background-image: url('images/gallery-06.jpg');"></a>
                         </div>

                         <!-- item gallery sidebar -->
                         <div class="wrap-item-gallery m-b-10">
                             <a class="item-gallery bg-img1" href="images/gallery-07.jpg" data-lightbox="gallery"
                                 style="background-image: url('images/gallery-07.jpg');"></a>
                         </div>

                         <!-- item gallery sidebar -->
                         <div class="wrap-item-gallery m-b-10">
                             <a class="item-gallery bg-img1" href="images/gallery-08.jpg" data-lightbox="gallery"
                                 style="background-image: url('images/gallery-08.jpg');"></a>
                         </div>

                         <!-- item gallery sidebar -->
                         <div class="wrap-item-gallery m-b-10">
                             <a class="item-gallery bg-img1" href="images/gallery-09.jpg" data-lightbox="gallery"
                                 style="background-image: url('images/gallery-09.jpg');"></a>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </aside>



     <!-- Cart -->
     <div class="wrap-header-cart js-panel-cart">
        <div class="s-full js-hide-cart"></div>
        <div class="header-cart flex-col-l p-l-65 p-r-25">
            <div class="header-cart-title flex-w flex-sb-m p-b-8">
                <span class="mtext-103 cl2">
                    Giỏ hàng của tôi
                </span>
                <div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
                    <i class="zmdi zmdi-close"></i>
                </div>
            </div>

            <div class="header-cart-content flex-w js-pscroll">
                <ul class="header-cart-wrapitem w-full">
                    @if (isset($cart) && count($cart) > 0)
                        @foreach ($cart as $item)
                            <li class="header-cart-item flex-w flex-t m-b-12">
                                <div class="header-cart-item-img">
                                   
                                    @if (isset($item['image']))
                                        @php
                                            $images = json_decode($item['image'], true);
                                        @endphp
                                        @if (is_array($images) && count($images) > 0)
                                            <img src="{{ asset('storage/' . $images[0]) }}"
                                                alt="{{ $item['name'] }}" class="img-thumbnail">
                                        @else
                                            <img src="{{ asset('path/to/default-image.jpg') }}" alt="Ảnh không có"
                                                class="img-thumbnail">
                                        @endif
                                    @else
                                        <img src="{{ asset('path/to/default-image.jpg') }}" alt="Ảnh không có"
                                            class="img-thumbnail">
                                    @endif
                                </div>
                                <div class="header-cart-item-txt p-t-8">
                                    <a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
                                        {{ $item['name'] }}
                                    </a>
                                    <span class="header-cart-item-info">
                                        {{ $item['quantity'] }} x ${{ number_format($item['price']) }}
                                    </span>
                                </div>
                            </li>
                        @endforeach
                    @else
                        <li class="header-cart-item">
                            <p>Giỏ hàng của bạn đang trống.</p>
                        </li>
                    @endif
                </ul>

                <div class="w-full">
                    <div class="header-cart-total w-full p-tb-40">
                        @if (isset($totalPrice) && $totalPrice > 0)
                            Tổng cộng: ${{ number_format($totalPrice, 2) }}
                        @else
                            Tổng cộng: $0.00
                        @endif
                    </div>

                    <div class="header-cart-buttons flex-w w-full">
                        <a href="{{ route('cart.index') }}"
                            class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
                            Giỏ hàng
                        </a>

                        <a href="{{ route('user.checkout.confirm') }}"
                            class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
                            Thanh toán 
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
 </body>

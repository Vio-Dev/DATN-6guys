@extends('layout')

@section('content')
		<!-- Content page -->
		<section class="bg0 p-t-52 p-b-20">
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-lg-9 p-b-80">
						<div class="p-r-45 p-r-0-lg">
							
							<div class="my-4">
								<h1 class="text-center">{{ $post->title }}</h1>
								<p class="text-muted text-center">
									Tác giả: {{ $post->author }} | Ngày đăng: {{ $post->created_at->format('d/m/Y') }}
								</p>
							</div>
						
						
							<!-- Nội dung bài viết -->
							<div class="p-t-32">
								<!-- Thông tin bài viết -->
								<span class="flex-w flex-m stext-111 cl2 p-b-19">
									<span>
										<span class="cl4">Tác giả</span> {{ $post->author }}
										<span class="cl12 m-l-4 m-r-6">|</span>
									</span>
						
									<span>
										Ngày đăng: {{ $post->created_at->format('d/m/Y') }}
									</span>
									
									
								</span>
									<!-- Ảnh bìa bài viết -->
					
								<!-- Nội dung chi tiết bài viết -->
								<h4 class="ltext-109 cl2 p-b-28">
									{{ $post->title }}
								</h4>
								<div class="wrap-pic-w how-pos5-parent text-center">
									@if($post->featured_image)
										<img src="{{ asset('storage/' . str_replace('public/', '', $post->featured_image)) }}" alt="{{ $post->title }}" class="img-fluid mb-4" style="max-height: 400px;">
									@else
										<img src="{{ asset('images/default-placeholder.png') }}" alt="Placeholder" class="img-fluid mb-4" style="max-height: 400px;">
									@endif
								</div>
								<p class="stext-117 cl6 p-b-26">
									{!! nl2br(e($post->content)) !!}
								</p>
							</div>
						
							
	
							
	
							<!--  -->
							<div class="p-t-40">
								<h5 class="mtext-113 cl2 p-b-12">
									ĐỂ LẠI MỘT BÌNH LUẬN
								</h5>
	
								<p class="stext-107 cl6 p-b-40">
									Địa chỉ email của bạn sẽ không được công bố. Các trường bắt buộc được đánh dấu *
								</p>
	
								<form>
									
	
									<div class="bor19 size-218 m-b-20">
										<input class="stext-111 cl2 plh3 size-116 p-lr-18" type="text" name="name" placeholder="Tên *">
									</div>
	
									<div class="bor19 size-218 m-b-20">
										<input class="stext-111 cl2 plh3 size-116 p-lr-18" type="text" name="email" placeholder="Email *">
									</div>
									<div class="bor19 m-b-20">
										<textarea class="stext-111 cl2 plh3 size-124 p-lr-18 p-tb-15" name="cmt" placeholder="Bình luận..."></textarea>
									</div>
									<button class="flex-c-m stext-101 cl0 size-125 bg3 bor2 hov-btn3 p-lr-15 trans-04">
										Đăng bình luận
									</button>
								</form>
							</div>
						</div>
					</div>
	
					<div class="col-md-4 col-lg-3 p-b-80">
						<div class="side-menu">
							<div class="bor17 of-hidden pos-relative">
								<input class="stext-103 cl2 plh4 size-116 p-l-28 p-r-55" type="text" name="search" placeholder="Tìm Kiếm">
	
								<button class="flex-c-m size-122 ab-t-r fs-18 cl4 hov-cl1 trans-04">
									<i class="zmdi zmdi-search"></i>
								</button>
							</div>
	
							<div class="p-t-55">
								<!-- Danh mục -->
								<h4 class="mtext-112 cl2 p-b-33">
									Danh mục
								</h4>
					
								<ul>
									<li class="bor18">
										<a href="{{ route('category.manhinh') }}" class="dis-block stext-115 cl6 hov-cl1 trans-04 p-tb-8 p-lr-4">
											Màn hình
										</a>
									</li>
					
									<li class="bor18">
										<a href="{{ route('category.banphimco') }}" class="dis-block stext-115 cl6 hov-cl1 trans-04 p-tb-8 p-lr-4">
											Bàn phím
										</a>
									</li>
					
									<li class="bor18">
										<a href="{{ route('category.banhoc') }}" class="dis-block stext-115 cl6 hov-cl1 trans-04 p-tb-8 p-lr-4">
											Bàn học
										</a>
									</li>
					
									<li class="bor18">
										<a href="{{ route('category.chuotkhongday') }}" class="dis-block stext-115 cl6 hov-cl1 trans-04 p-tb-8 p-lr-4">
											Chuột gaming
										</a>
									</li>
					
								</ul>
							</div>
					
							{{-- <div class="p-t-65">
								<!-- Sản phẩm nổi bật -->
								<h4 class="mtext-112 cl2 p-b-33">
									Sản phẩm nổi bật
								</h4>
					
								<ul>
									<li class="flex-w flex-t p-b-30">
										<a href="#" class="wrao-pic-w size-214 hov-ovelay1 m-r-20">
											<img src="images/product-min-01.jpg" alt="Sản phẩm">
										</a>
					
										<div class="size-215 flex-col-t p-t-8">
											<a href="#" class="stext-116 cl8 hov-cl1 trans-04">
												Áo trắng với chi tiết xếp li ở lưng
											</a>
					
											<span class="stext-116 cl6 p-t-20">
												$19.00
											</span>
										</div>
									</li>
					
									<li class="flex-w flex-t p-b-30">
										<a href="#" class="wrao-pic-w size-214 hov-ovelay1 m-r-20">
											<img src="{{ asset('images/product-min-02.jpg')}}" alt="Sản phẩm">
										</a>
					
										<div class="size-215 flex-col-t p-t-8">
											<a href="#" class="stext-116 cl8 hov-cl1 trans-04">
												Giày Converse All Star Hi Màu đen
											</a>
					
											<span class="stext-116 cl6 p-t-20">
												$39.00
											</span>
										</div>
									</li>
					
									<li class="flex-w flex-t p-b-30">
										<a href="#" class="wrao-pic-w size-214 hov-ovelay1 m-r-20">
											<img src="{{ asset('images/product-min-03.jpg')}}" alt="Sản phẩm">
										</a>
					
										<div class="size-215 flex-col-t p-t-8">
											<a href="#" class="stext-116 cl8 hov-cl1 trans-04">
												Đồng hồ Nixon Porter bằng da màu nâu
											</a>
					
											<span class="stext-116 cl6 p-t-20">
												$17.00
											</span>
										</div>
									</li>
								</ul>
							</div> --}}
					
							<div class="p-t-55">
								<!-- Lưu trữ -->
								<h4 class="mtext-112 cl2 p-b-20">
									Lưu trữ
								</h4>
					
								<ul>
									<li class="p-b-7">
										<a href="#" class="flex-w flex-sb-m stext-115 cl6 hov-cl1 trans-04 p-tb-2">
											<span>
												Tháng 7 năm 2018
											</span>
					
											<span>
												(9)
											</span>
										</a>
									</li>
					
									<li class="p-b-7">
										<a href="#" class="flex-w flex-sb-m stext-115 cl6 hov-cl1 trans-04 p-tb-2">
											<span>
												Tháng 6 năm 2018
											</span>
					
											<span>
												(39)
											</span>
										</a>
									</li>
					
									<li class="p-b-7">
										<a href="#" class="flex-w flex-sb-m stext-115 cl6 hov-cl1 trans-04 p-tb-2">
											<span>
												Tháng 5 năm 2018
											</span>
					
											<span>
												(29)
											</span>
										</a>
									</li>
								</ul>
							</div>
					
							<div class="p-t-50">
								<!-- Tags -->
								<h4 class="mtext-112 cl2 p-b-27">
									Thẻ Tag
								</h4>
							
								<div class="flex-w m-r--5">
									<a href="{{ route('category.manhinh') }}" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
										Màn hình
									</a>
							
									<a href="{{ route('category.banphimco') }}" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
										Bàn phím
									</a>
							
									<a href="{{ route('category.banhoc') }}" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
										Bàn học
									</a>
							
									<a href="{{ route('category.chuotkhongday') }}" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
										Chuột gaming
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>	
@endsection
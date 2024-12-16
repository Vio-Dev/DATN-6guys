@extends('layout')

@section('content')
    <!-- Title page -->
    <section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('{{ asset('img/banner1.jpg') }}');">
        <h2 class="ltext-105 cl0 txt-center">
           Bài viết
        </h2>
    </section>
	<section class="bg0 p-t-62 p-b-60">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-lg-9 p-b-80">
					<div class="p-r-45 p-r-0-lg">
						
						<div class="row">
							@foreach($posts as $post)
								<div class="col-md-6 mb-4"> <!-- Đây là lớp Bootstrap để tạo 2 cột -->
									<div class="post-item">
								<a href="{{ route('user.blog.show', $post->id) }}" class="hov-img0 how-pos5-parent">
									<!-- Hiển thị ảnh bài viết -->
									@if($post->featured_image)
										<img src="{{ asset('storage/' . str_replace('public/', '', $post->featured_image)) }}" alt="IMG-BLOG">
									@else
										<img src="{{ asset('images/default-placeholder.png') }}" alt="Placeholder">
									@endif
									<div class="flex-col-c-m size-123 bg9 how-pos5">
										<span class="ltext-107 cl2 txt-center">
											22 <!-- Có thể thay thế bằng ngày đăng bài viết -->
										</span>
			
										<span class="stext-109 cl3 txt-center">
											{{ \Carbon\Carbon::parse($post->created_at)->format('M d, Y') }} <!-- Hiển thị ngày bài viết -->
										</span>
									</div>
								</a>
				
								<div class="p-t-32">
									<h4 class="p-b-15">
										<a href="{{ route('user.blog.show', $post->id) }}" class="ltext-108 cl2 hov-cl1 trans-04">
											{{ $post->title }}
										</a>
									</h4>
				
									<p class="stext-117 cl6">
										{{ Str::limit(strip_tags($post->short_description), 150) }} <!-- Hiển thị một đoạn ngắn của bài viết -->
									</p>
				
									<div class="flex-w flex-sb-m p-t-18">
										<span class="flex-w flex-m stext-111 cl2 p-r-30 m-tb-10">
											<span>
												<span class="cl4">Tác giả: </span> {{ $post->author }}
												<span class="cl12 m-l-4 m-r-6">|</span>
											</span>
				
											<span>
												<!-- Thẻ category có thể lấy từ bảng khác nếu bạn có trường phân loại bài viết -->
												{{ $post->category ?? 'General' }}  
												<span class="cl12 m-l-4 m-r-6">|</span>
											</span>
				
											<span>
												{{ $post->comments_count ?? 0 }} Bình luận <!-- Số bình luận, cần lấy từ cơ sở dữ liệu -->
											</span>
										</span>
				
										<a href="{{ route('user.blog.show', $post->id) }}" class="stext-101 cl2 hov-cl1 trans-04 m-tb-10">
											Đọc bài viết
				
											<i class="fa fa-long-arrow-right m-l-9"></i>
										</a>
									</div>
								</div>
							</div>
						</div>
						@endforeach
					</div>
						<!-- Pagination -->
						<div class="flex-l-m flex-w w-full p-t-10 m-lr--7">
							<a href="#" class="flex-c-m how-pagination1 trans-04 m-all-7 active-pagination1">
								1
							</a>

							<a href="#" class="flex-c-m how-pagination1 trans-04 m-all-7">
								2
							</a>
						</div>
					</div>
				</div>
				<div class="col-md-4 col-lg-3 p-b-80">
					<div class="side-menu">
						<div class="bor17 of-hidden pos-relative">
							<!-- Tìm kiếm -->
							<input class="stext-103 cl2 plh4 size-116 p-l-28 p-r-55" type="text" name="search" placeholder="Tìm kiếm">
				
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
									<a href="{ route('category.chuotkhongday') }}" class="dis-block stext-115 cl6 hov-cl1 trans-04 p-tb-8 p-lr-4">
										Chuột gaming
									</a>
								</li>
				
							</ul>
						</div>
				
						<div class="p-t-65">
							<!-- Sản phẩm nổi bật -->
							<h4 class="mtext-112 cl2 p-b-33">
								Sản phẩm nổi bật
							</h4>
				
							<ul>
								<li class="flex-w flex-t p-b-30">
									<a href="#" class="wrao-pic-w size-214 hov-ovelay1 m-r-20">
										<img src="{{ asset('images/product-min-01.jpg')}}" alt="Sản phẩm">
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
										<img src="images/product-min-02.jpg" alt="Sản phẩm">
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
										<img src="images/product-min-03.jpg" alt="Sản phẩm">
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
						</div>
				
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
				
				{{-- <div class="col-md-4 col-lg-3 p-b-80">
					<div class="side-menu">
						<div class="bor17 of-hidden pos-relative">
							<input class="stext-103 cl2 plh4 size-116 p-l-28 p-r-55" type="text" name="search" placeholder="Search">

							<button class="flex-c-m size-122 ab-t-r fs-18 cl4 hov-cl1 trans-04">
								<i class="zmdi zmdi-search"></i>
							</button>
						</div>

						<div class="p-t-55">
							<h4 class="mtext-112 cl2 p-b-33">
								Categories
							</h4>

							<ul>
								<li class="bor18">
									<a href="#" class="dis-block stext-115 cl6 hov-cl1 trans-04 p-tb-8 p-lr-4">
										Fashion
									</a>
								</li>

								<li class="bor18">
									<a href="#" class="dis-block stext-115 cl6 hov-cl1 trans-04 p-tb-8 p-lr-4">
										Beauty
									</a>
								</li>

								<li class="bor18">
									<a href="#" class="dis-block stext-115 cl6 hov-cl1 trans-04 p-tb-8 p-lr-4">
										Street Style
									</a>
								</li>

								<li class="bor18">
									<a href="#" class="dis-block stext-115 cl6 hov-cl1 trans-04 p-tb-8 p-lr-4">
										Life Style
									</a>
								</li>

								<li class="bor18">
									<a href="#" class="dis-block stext-115 cl6 hov-cl1 trans-04 p-tb-8 p-lr-4">
										DIY & Crafts
									</a>
								</li>
							</ul>
						</div>

						<div class="p-t-65">
							<h4 class="mtext-112 cl2 p-b-33">
								Featured Products
							</h4>

							<ul>
								<li class="flex-w flex-t p-b-30">
									<a href="#" class="wrao-pic-w size-214 hov-ovelay1 m-r-20">
										<img src="images/product-min-01.jpg" alt="PRODUCT">
									</a>

									<div class="size-215 flex-col-t p-t-8">
										<a href="#" class="stext-116 cl8 hov-cl1 trans-04">
											White Shirt With Pleat Detail Back
										</a>

										<span class="stext-116 cl6 p-t-20">
											$19.00
										</span>
									</div>
								</li>

								<li class="flex-w flex-t p-b-30">
									<a href="#" class="wrao-pic-w size-214 hov-ovelay1 m-r-20">
										<img src="images/product-min-02.jpg" alt="PRODUCT">
									</a>

									<div class="size-215 flex-col-t p-t-8">
										<a href="#" class="stext-116 cl8 hov-cl1 trans-04">
											Converse All Star Hi Black Canvas
										</a>

										<span class="stext-116 cl6 p-t-20">
											$39.00
										</span>
									</div>
								</li>

								<li class="flex-w flex-t p-b-30">
									<a href="#" class="wrao-pic-w size-214 hov-ovelay1 m-r-20">
										<img src="images/product-min-03.jpg" alt="PRODUCT">
									</a>

									<div class="size-215 flex-col-t p-t-8">
										<a href="#" class="stext-116 cl8 hov-cl1 trans-04">
											Nixon Porter Leather Watch In Tan
										</a>

										<span class="stext-116 cl6 p-t-20">
											$17.00
										</span>
									</div>
								</li>
							</ul>
						</div>

						<div class="p-t-55">
							<h4 class="mtext-112 cl2 p-b-20">
								Archive
							</h4>

							<ul>
								<li class="p-b-7">
									<a href="#" class="flex-w flex-sb-m stext-115 cl6 hov-cl1 trans-04 p-tb-2">
										<span>
											July 2018
										</span>

										<span>
											(9)
										</span>
									</a>
								</li>

								<li class="p-b-7">
									<a href="#" class="flex-w flex-sb-m stext-115 cl6 hov-cl1 trans-04 p-tb-2">
										<span>
											June 2018
										</span>

										<span>
											(39)
										</span>
									</a>
								</li>

								<li class="p-b-7">
									<a href="#" class="flex-w flex-sb-m stext-115 cl6 hov-cl1 trans-04 p-tb-2">
										<span>
											May 2018
										</span>

										<span>
											(29)
										</span>
									</a>
								</li>

								<li class="p-b-7">
									<a href="#" class="flex-w flex-sb-m stext-115 cl6 hov-cl1 trans-04 p-tb-2">
										<span>
											April  2018
										</span>

										<span>
											(35)
										</span>
									</a>
								</li>

								<li class="p-b-7">
									<a href="#" class="flex-w flex-sb-m stext-115 cl6 hov-cl1 trans-04 p-tb-2">
										<span>
											March 2018
										</span>

										<span>
											(22)
										</span>
									</a>
								</li>

								<li class="p-b-7">
									<a href="#" class="flex-w flex-sb-m stext-115 cl6 hov-cl1 trans-04 p-tb-2">
										<span>
											February 2018
										</span>

										<span>
											(32)
										</span>
									</a>
								</li>

								<li class="p-b-7">
									<a href="#" class="flex-w flex-sb-m stext-115 cl6 hov-cl1 trans-04 p-tb-2">
										<span>
											January 2018
										</span>

										<span>
											(21)
										</span>
									</a>
								</li>

								<li class="p-b-7">
									<a href="#" class="flex-w flex-sb-m stext-115 cl6 hov-cl1 trans-04 p-tb-2">
										<span>
											December 2017
										</span>

										<span>
											(26)
										</span>
									</a>
								</li>
							</ul>
						</div>

						<div class="p-t-50">
							<h4 class="mtext-112 cl2 p-b-27">
								Tags
							</h4>

							<div class="flex-w m-r--5">
								<a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
									Fashion
								</a>

								<a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
									Lifestyle
								</a>

								<a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
									Denim
								</a>

								<a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
									Streetstyle
								</a>

								<a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
									Crafts
								</a>
							</div>
						</div>
					</div>
				</div> --}}
			</div>
		</div>
	</section>	
@endsection
<style>
	/* Đảm bảo các bài viết được xếp thành 2 cột trên màn hình lớn hơn */
.row {
    display: flex;
    flex-wrap: wrap;
}

.col-md-6 {
    width: 50%;  /* Mỗi bài viết chiếm 50% chiều rộng */
    padding: 15px;
}

@media (max-width: 767px) {
    .col-md-6 {
        width: 100%; /* Trên các màn hình nhỏ, các bài viết sẽ chiếm 100% chiều rộng */
    }
}
	</style>
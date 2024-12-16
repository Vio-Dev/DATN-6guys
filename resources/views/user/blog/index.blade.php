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
						
						@foreach($posts as $post)
						<div class="col-md-4 mb-4">
							<div class="p-b-63">
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

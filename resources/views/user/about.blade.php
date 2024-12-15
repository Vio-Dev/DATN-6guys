@extends('layout')

@section('content')
	<!-- Title page -->
<!-- Trang tiêu đề -->
<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('{{ asset('img/banner1.jpg') }}');">
    <h2 class="ltext-105 cl0 txt-center">
        Giới thiệu
    </h2>
</section>	


<!-- Nội dung trang -->
<!-- Nội dung trang -->
<section class="bg0 p-t-75 p-b-120">
    <div class="container">
        <div class="row p-b-148">
            <div class="col-md-7 col-lg-8">
                <div class="p-t-7 p-r-85 p-r-15-lg p-r-0-md">
                    <h3 class="mtext-111 cl2 p-b-16">
                        Câu chuyện của chúng tôi
                    </h3>

                    <p class="stext-113 cl6 p-b-26">
                        Web Gaming là một nền tảng trực tuyến mang đến trải nghiệm chơi game độc đáo và thú vị cho người dùng. Chúng tôi cung cấp nhiều thể loại game đa dạng, từ các trò chơi hành động, phiêu lưu, chiến thuật, đến các trò chơi giải trí nhẹ nhàng, phù hợp với mọi lứa tuổi và sở thích của người chơi. Với giao diện dễ sử dụng và tốc độ mượt mà, người chơi có thể tham gia vào các trận đấu, khám phá thế giới ảo và thử thách bản thân trong nhiều nhiệm vụ hấp dẫn.
                    </p>

                    <p class="stext-113 cl6 p-b-26">
                        Chúng tôi không ngừng cải tiến và cập nhật các tính năng mới, với mong muốn mang đến cho người dùng không gian giải trí an toàn, thân thiện và đầy thú vị. Tại đây, bạn có thể tạo tài khoản, kết nối với cộng đồng game thủ trên khắp thế giới, tham gia các sự kiện đặc biệt và thể hiện kỹ năng của mình trong những trận đấu đỉnh cao.
                    </p>

                    <p class="stext-113 cl6 p-b-26">
                        Có câu hỏi hoặc muốn hợp tác với chúng tôi? Liên hệ qua email support@webgaming.com hoặc gọi cho chúng tôi qua số (+84) 123 456 789.
                    </p>
                </div>
            </div>

            <div class="col-11 col-md-5 col-lg-4 m-lr-auto">
                <div class="how-bor1 ">
                    <div class="hov-img0">
                        <img src="{{ asset('img/banner3.jpg') }}" alt="Web Gaming">
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="order-md-2 col-md-7 col-lg-8 p-b-30">
                <div class="p-t-7 p-l-85 p-l-15-lg p-l-0-md">
                    <h3 class="mtext-111 cl2 p-b-16">
                        Sứ mệnh của chúng tôi
                    </h3>

                    <p class="stext-113 cl6 p-b-26">
                        Sứ mệnh của Web Gaming là mang đến cho người dùng một nền tảng chơi game chất lượng cao, kết nối cộng đồng game thủ và cung cấp trải nghiệm chơi game độc đáo, phong phú thông qua các tính năng và công nghệ tiên tiến nhất. Chúng tôi cam kết tạo ra một môi trường chơi game công bằng, thân thiện và dễ tiếp cận cho tất cả người dùng.
                    </p>

                    <div class="bor16 p-l-29 p-b-9 m-t-22">
                        <p class="stext-114 cl6 p-r-40 p-b-11">
                            Sáng tạo là sự kết nối giữa công nghệ và đam mê. Chúng tôi không ngừng khám phá và phát triển để mang đến trải nghiệm tuyệt vời nhất cho các game thủ.
                        </p>

                        <span class="stext-111 cl8">
                            - GIahuy
                        </span>
                    </div>
                </div>
            </div>

            <div class="order-md-1 col-11 col-md-5 col-lg-4 m-lr-auto p-b-30">
                <div class="how-bor2">
                    <div class="hov-img0">
                        <img src="{{ asset('img/banner2.jpg') }}" alt="Web Gaming">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


	

@endsection
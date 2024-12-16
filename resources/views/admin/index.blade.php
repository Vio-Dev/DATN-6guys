@extends('admin.layouts.app')

@section('content')
    <!-- index body start -->
    <div class="page-body">
        <div class="container-fluid">
            <div class="row">
                <!-- chart caard section start -->
                <div class="col-sm-6 col-xxl-3 col-lg-6">
                    <div class="b-b-primary border-5 border-0 card o-hidden">
                        <div class="custome-1-bg b-r-4 card-body">
                            <div class="media align-items-center static-top-widget">
                                <div class="media-body p-0">
                                    <span class="m-0">Tổng thu nhập</span>
                                    <h4 class="mb-0 counter">6659
                                        <span class="badge badge-light-primary grow">
                                            <i data-feather="trending-up"></i>8.5%</span>
                                    </h4>
                                </div>
                                <div class="align-self-center text-center">
                                    <i data-feather="database"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-sm-6 col-xxl-3 col-lg-6">
                    <div class="b-b-danger border-5 border-0 card o-hidden">
                        <div class="custome-2-bg b-r-4 card-body">
                            <div class="media static-top-widget">
                                <div class="media-body p-0">
                                    <span class="m-0">Tổng số đặt chỗ</span>
                                    <h4 class="mb-0 counter">9856
                                        <span class="badge badge-light-danger grow">
                                            <i data-feather="trending-down"></i>8.5%</span>
                                    </h4>
                                </div>
                                <div class="align-self-center text-center">
                                    <i data-feather="shopping-bag"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-sm-6 col-xxl-3 col-lg-6">
                    <div class="b-b-secondary border-5 border-0 card o-hidden">
                        <div class="custome-3-bg b-r-4 card-body">
                            <div class="media static-top-widget">
                                <div class="media-body p-0">
                                    <span class="m-0">Đánh giá</span>
                                    <h4 class="mb-0 counter">893
                                        <span class="badge badge-light-secondary grow">
                                            <i data-feather="trending-up"></i>8.5%</span>
                                    </h4>
                                </div>
                                <div class="align-self-center text-center">
                                    <i data-feather="message-circle"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-xxl-3 col-lg-6">
                    <div class="b-b-success border-5 border-0 card o-hidden">
                        <div class="custome-4-bg b-r-4 card-body">
                            <div class="media static-top-widget">
                                <div class="media-body p-0">
                                    <span class="m-0">Tổng số người dùng</span>
                                    <h4 class="mb-0 counter">45631
                                        <span class="badge badge-light-success grow">
                                            <i data-feather="trending-down"></i>8.5%</span>
                                    </h4>
                                </div>
                                <div class="align-self-center text-center">
                                    <i data-feather="user-plus"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- chart card section End -->

                <!-- Earning chart start -->
                <div class="col-xl-4">
                    <div class="card o-hidden card-hover">
                        <div class="card-header border-0 pb-1">
                            <div class="card-header-title">
                                <h4>Thu nhập</h4>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div id="bar-chart-earning"></div>
                        </div>
                    </div>
                </div>

                <!-- Earning chart end-->

                <!-- Biểu đồ thu nhập bắt đầu-->
                <div class="col-xl-8">
                    <div class="card o-hidden">
                        <div class="card-header border-0 pb-1">
                            <div class="card-header-title">
                                <h4>Báo cáo doanh thu</h4>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div id="report-chart"></div>
                        </div>
                    </div>
                </div>
                <!-- Biểu đồ thu nhập kết thúc-->

                <!-- Giao dịch bắt đầu-->
                <div class="col-xxl-4 col-md-6">
                    <div class="card o-hidden card-hover">
                        <div class="card-header border-0">
                            <div class="card-header-title">
                                <h4>Giao dịch</h4>
                            </div>
                        </div>

                        <div class="card-body pt-0">
                            <div>
                                <div class="table-responsive table-desi">
                                    <table class="user-table transactions-table table border-0">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="transactions-icon">
                                                        <i data-feather="shield"></i>
                                                    </div>
                                                    <div class="transactions-name">
                                                        <h6>Ví</h6>
                                                        <p>Starbucks</p>
                                                    </div>
                                                </td>

                                                <td class="lost">-$74</td>
                                            </tr>
                                            <tr>
                                                <td class="td-color-1">
                                                    <div class="transactions-icon">
                                                        <i data-feather="check"></i>
                                                    </div>
                                                    <div class="transactions-name">
                                                        <h6>Chuyển khoản ngân hàng</h6>
                                                        <p>Thêm tiền</p>
                                                    </div>
                                                </td>

                                                <td class="success">+$125</td>
                                            </tr>
                                            <tr>
                                                <td class="td-color-2">
                                                    <div class="transactions-icon">
                                                        <i data-feather="dollar-sign"></i>
                                                    </div>
                                                    <div class="transactions-name">
                                                        <h6>Thanh toán trực tuyến</h6>
                                                        <p>Thêm tiền</p>
                                                    </div>
                                                </td>

                                                <td class="lost">-$50</td>
                                            </tr>
                                            <tr>
                                                <td class="td-color-3">
                                                    <div class="transactions-icon">
                                                        <i data-feather="credit-card"></i>
                                                    </div>
                                                    <div class="transactions-name">
                                                        <h6>Thẻ tín dụng</h6>
                                                        <p>Đặt món ăn</p>
                                                    </div>
                                                </td>

                                                <td class="lost">-$40</td>
                                            </tr>
                                            <tr>
                                                <td class="td-color-4 pb-0">
                                                    <div class="transactions-icon">
                                                        <i data-feather="trending-up"></i>
                                                    </div>
                                                    <div class="transactions-name">
                                                        <h6>Chuyển tiền</h6>
                                                        <p>Hoàn tiền</p>
                                                    </div>
                                                </td>

                                                <td class="success pb-0">+$90</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Giao dịch kết thúc-->

                <!-- Biểu đồ khách truy cập bắt đầu-->
                <div class="col-xxl-4 col-md-6">
                    <div class="h-100">
                        <div class="card o-hidden card-hover">
                            <div class="card-header border-0">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="card-header-title">
                                        <h4>Khách truy cập</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-0">
                                <div class="pie-chart">
                                    {{-- <div id="pie-chart-visitors"></div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Biểu đồ khách truy cập kết thúc-->

                <!-- Mới & Cập nhật bắt đầu-->
                <div class="col-xxl-4 col-md-6">
                    <div class="card o-hidden card-hover">
                        <div class="card-header border-0">
                            <div class="card-header-title">
                                <h4>Mới & Cập nhật</h4>
                            </div>
                        </div>

                        <div class="card-body pt-0">
                            <ul class="StepProgress">
                                <li class="StepProgress-item">
                                    <strong>Cập nhật sản phẩm</strong>
                                    <p>Chúng tôi luôn nỗ lực mang đến những sản phẩm chất lượng và dịch vụ tận tâm nhất cho khách hàng.</p>
                                </li>
                                <li class="StepProgress-item">
                                    <strong>vio ok thích đôi giày Nike</strong>
                                    <p>Chúng tôi luôn nỗ lực mang đến những sản phẩm chất lượng và dịch vụ tận tâm nhất cho khách hàng..</p>
                                </li>
                                <li class="StepProgress-item">
                                    <strong>viodeptrai vừa mua sản phẩm của bạn</strong>
                                    <p>Chúng tôi luôn nỗ lực mang đến những sản phẩm chất lượng và dịch vụ tận tâm nhất cho khách hàng.</p>
                                </li>
                                <li class="StepProgress-item">
                                    <strong>vio vừa lưu sản phẩm của bạn</strong>
                                    <p>Chúng tôi luôn nỗ lực mang đến những sản phẩm chất lượng và dịch vụ tận tâm nhất cho khách hàng.</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Mới & Cập nhật kết thúc-->


                <!-- Danh sách công việc bắt đầu-->
                <div class="col-xxl-4 col-md-6">
                    <div class="card o-hidden card-hover">
                        <div class="card-header border-0">
                            <div class="card-header-title">
                                <h4>Danh sách công việc</h4>
                            </div>
                        </div>

                        <div class="card-body pt-0">
                            <ul class="to-do-list">
                                <li class="to-do-item">
                                    <div class="form-check user-checkbox">
                                        <input class="checkbox_animated check-it" type="checkbox" value=""
                                            id="flexCheckDefault">
                                    </div>
                                    <div class="to-do-list-name">
                                        <strong>Đón trẻ từ trường học</strong>
                                        <p>8 giờ</p>
                                    </div>
                                </li>
                                <li class="to-do-item">
                                    <div class="form-check user-checkbox">
                                        <input class="checkbox_animated check-it" type="checkbox" value=""
                                            id="flexCheckDefault1">
                                    </div>
                                    <div class="to-do-list-name">
                                        <strong>Chuẩn bị bài thuyết trình</strong>
                                        <p>8 giờ</p>
                                    </div>
                                </li>
                                <li class="to-do-item">
                                    <div class="form-check user-checkbox">
                                        <input class="checkbox_animated check-it" type="checkbox" value=""
                                            id="flexCheckDefault2">
                                    </div>
                                    <div class="to-do-list-name">
                                        <strong>Tạo hóa đơn</strong>
                                        <p>8 giờ</p>
                                    </div>
                                </li>
                                <li class="to-do-item">
                                    <div class="form-check user-checkbox">
                                        <input class="checkbox_animated check-it" type="checkbox" value=""
                                            id="flexCheckDefault3">
                                    </div>
                                    <div class="to-do-list-name">
                                        <strong>Cuộc họp với Alisa</strong>
                                        <p>8 giờ</p>
                                    </div>
                                </li>

                                <li class="to-do-item">
                                    <form class="row g-2">
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" id="name"
                                                placeholder="Nhập tên công việc">
                                        </div>
                                        <div class="col-lg-4">
                                            <button type="submit" class="btn btn-primary w-100">Thêm công việc</button>
                                        </div>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Danh sách công việc kết thúc-->

                <!-- Hoạt động gần đây bắt đầu-->
                <div class="col-xxl-4 col-md-6">
                    <div class="card o-hidden card-hover">
                        <div class="card-header border-0">
                            <div class="card-header-title">
                                <h4>Hoạt động gần đây</h4>
                            </div>
                        </div>

                        <div class="card-body pt-0">
                            <ul class="recent-activity">
                                <li class="recent-item">
                                    <div class="recent-icon">
                                        <span class="lnr lnr-calendar-full"></span>
                                        <p>Lịch đã được cập nhật</p>
                                    </div>

                                    <div class="recent-timer">
                                        <h6 class="color-1">Vừa xong</h6>
                                    </div>
                                </li>
                                <li class="recent-item">
                                    <div class="recent-icon">
                                        <i data-feather="alert-circle"></i>
                                        <p>Đã bình luận vào một bài viết</p>
                                    </div>

                                    <div class="recent-timer">
                                        <h6 class="color-2">5 phút trước</h6>
                                    </div>
                                </li>
                                <li class="recent-item">
                                    <div class="recent-icon">
                                        <i data-feather="truck"></i>
                                        <p>Đơn hàng 392 đã được gửi</p>
                                    </div>

                                    <div class="recent-timer">
                                        <h6 class="color-3">12 phút trước</h6>
                                    </div>
                                </li>
                                <li class="recent-item">
                                    <div class="recent-icon">
                                        <i data-feather="dollar-sign"></i>
                                        <p>Hóa đơn 653 đã được thanh toán</p>
                                    </div>

                                    <div class="recent-timer">
                                        <h6 class="color-4">45 phút trước</h6>
                                    </div>
                                </li>
                                <li class="recent-item">
                                    <div class="recent-icon">
                                        <span class="lnr lnr-user"></span>
                                        <p>Đã có người dùng mới được thêm vào</p>
                                    </div>

                                    <div class="recent-timer">
                                        <h6 class="color-1">1 giờ trước</h6>
                                    </div>
                                </li>
                                <li class="recent-item mb-0">
                                    <div class="recent-icon">
                                        <span class="lnr lnr-select"></span>
                                        <p>Báo cáo tài chính</p>
                                    </div>

                                    <div class="recent-timer">
                                        <h6 class="color-2">Vừa xong</h6>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Hoạt động gần đây kết thúc-->

                <!-- Trạng thái trình duyệt bắt đầu-->
                <div class="col-xxl-4 col-md-6">
                    <div class="card o-hidden card-hover">
                        <div class="card-header border-0">
                            <div class="card-header-title">
                                <h4>Trạng thái trình duyệt</h4>
                            </div>
                        </div>

                        <div class="card-body pt-0">
                            <ul class="brower-states">
                                <li class="brower-item">
                                    <div class="browser-image">
                                        <img src="{{ asset('admin/assets') }}/images/brower-image/chrome.png"
                                            class="img-fluid" alt="">
                                        <h5>Chrome</h5>
                                    </div>

                                    <div class="browser-progressbar">
                                        <h6>84%</h6>
                                    </div>
                                </li>
                                <li class="brower-item">
                                    <div class="browser-image">
                                        <img src="{{ asset('admin/assets') }}/images/brower-image/firefox.png"
                                            class="img-fluid" alt="">
                                        <h5>Firefox</h5>
                                    </div>

                                    <div class="browser-progressbar">
                                        <h6>48%</h6>
                                    </div>
                                </li>
                                <li class="brower-item">
                                    <div class="browser-image">
                                        <img src="{{ asset('admin/assets') }}/images/brower-image/internet-explorer.png"
                                            class="img-fluid" alt="">
                                        <h5>Internet Explorer</h5>
                                    </div>

                                    <div class="browser-progressbar">
                                        <h6>35%</h6>
                                    </div>
                                </li>
                                <li class="brower-item">
                                    <div class="browser-image">
                                        <img src="{{ asset('admin/assets') }}/images/brower-image/opera.png"
                                            class="img-fluid" alt="">
                                        <h5>Opera Mini</h5>
                                    </div>

                                    <div class="browser-progressbar">
                                        <h6>55%</h6>
                                    </div>
                                </li>
                                <li class="brower-item">
                                    <div class="browser-image">
                                        <img src="{{ asset('admin/assets') }}/images/brower-image/safari.png"
                                            class="img-fluid" alt="">
                                        <h5>Safari</h5>
                                    </div>

                                    <div class="browser-progressbar">
                                        <h6>20%</h6>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Trạng thái trình duyệt kết thúc-->

            </div>
        </div>
        <!-- Container-fluid Ends-->

        <!-- footer start-->
        <div class="container-fluid">
            <footer class="footer">
                <div class="row">
                    <div class="col-md-12 footer-copyright text-center">
                        <p class="mb-0">6Guys</p>
                    </div>
                </div>
            </footer>
        </div>
        <!-- footer End-->
    </div>
    <!-- index body end -->
@endsection

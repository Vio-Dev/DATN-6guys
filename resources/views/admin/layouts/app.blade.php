<!DOCTYPE html>
<html lang="en" dir="ltr">


<!-- Mirrored from themes.pixelstrap.com/voxo/back-end/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 24 Apr 2024 08:42:55 GMT -->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Voxo admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
    <meta name="keywords"
        content="admin template, Voxo admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="{{asset('admin/assets')}}/images/favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="{{asset('admin/assets')}}/images/favicon.png" type="image/x-icon">
    <title>6Guys- Dashboard</title>

    <!-- Google font-->
    <link
        href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@200&amp;family=Nunito:ital,wght@0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,600;1,700;1,800;1,900&amp;display=swap"
        rel="stylesheet">

    <!-- Linear Icon css -->
    <link rel="stylesheet" href="{{asset('admin/assets')}}/css/linearicon.css">

    <!-- fontawesome css -->
    <link rel="stylesheet" type="text/css" href="{{asset('admin/assets')}}/css/vendors/font-awesome.css">

    <!-- Themify icon css-->
    <link rel="stylesheet" type="text/css" href="{{asset('admin/assets')}}/css/vendors/themify.css">

    <!-- ratio css -->
    <link rel="stylesheet" type="text/css" href="{{asset('admin/assets')}}/css/ratio.css">

    <!-- Feather icon css-->
    <link rel="stylesheet" type="text/css" href="{{asset('admin/assets')}}/css/vendors/feather-icon.css">

    <!-- Plugins css -->
    <link rel="stylesheet" type="text/css" href="{{asset('admin/assets')}}/css/vendors/scrollbar.css">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/assets')}}/css/vendors/animate.css">

    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="{{asset('admin/assets')}}/css/vendors/bootstrap.css">

    <!-- vector map css -->
    <link rel="stylesheet" type="text/css" href="{{asset('admin/assets')}}/css/vector-map.css">

    <!-- slick slider css -->
    <link rel="stylesheet" type="text/css" href="{{asset('admin/assets')}}/css/slick.css">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/assets')}}/css/slick-theme.css">

    <!-- App css -->
    <link rel="stylesheet" type="text/css" href="{{asset('admin/assets')}}/css/style.css">

    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="{{asset('admin/assets')}}/css/responsive.css">
</head>

<body>
    
    <!-- tap on top start -->
    <div class="tap-top">
        <span class="lnr lnr-chevron-up"></span>
    </div>
    <!-- tap on tap end -->

    <!-- page-wrapper Start-->
    <div class="page-wrapper compact-wrapper dark-sidebar" id="pageWrapper">
        <!-- Page Header Start-->
        <div class="page-header">
            <div class="header-wrapper row m-0">
                <div class="header-logo-wrapper col-auto p-0">
                    <div class="logo-wrapper">
                        <a href="index.html">
                            <img class="img-fluid main-logo" src="{{asset('admin/assets')}}/images/logo/logo.png" alt="logo">
                            <img class="img-fluid white-logo" src="{{asset('admin/assets')}}/images/logo/logo-white.png" alt="logo">
                        </a>
                    </div>
                    <div class="toggle-sidebar">
                        <i class="status_toggle middle sidebar-toggle" data-feather="align-center"></i>
                    </div>
                </div>

                <form class="form-inline search-full col" action="javascript:void(0)" method="get">
                    <div class="form-group w-100">
                        <div class="Typeahead Typeahead--twitterUsers">
                            <div class="u-posRelative">
                                <input class="demo-input Typeahead-input form-control-plaintext w-100" type="text"
                                    placeholder="Tìm kiếm .." name="q" title="" autofocus>
                                <i class="close-search" data-feather="x"></i>
                                <div class="spinner-border Typeahead-spinner" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </div>
                            <div class="Typeahead-menu"></div>
                        </div>
                    </div>
                </form>
                <div class="nav-right col-4 pull-right right-header p-0">
                    <ul class="nav-menus">
                        <li>
                            <span class="header-search">
                                <span class="lnr lnr-magnifier"></span>
                            </span>
                        </li>
                        <li class="onhover-dropdown">
                            <div class="notification-box">
                                <span class="lnr lnr-alarm"></span>
                                <span class="badge rounded-pill badge-theme">
                                    {{ is_countable($notifications) ? count($notifications) : 0 }}
                                </span>
                            </div>
                            <ul class="notification-dropdown onhover-show-div">
                                <li>
                                    <span class="lnr lnr-alarm"></span>
                                    <h6 class="f-18 mb-0">Thông báo</h6>
                                </li>
                                @foreach($notifications as $notification)
                                <li>
                                    <p>
                                        <i class="fa fa-circle-o me-3 font-primary"></i>{{ $notification->message }} <span class="pull-right">{{ $notification->created_at->diffForHumans() }}</span>
                                    </p>
                                </li>
                                @endforeach
                                <li>
                                    <a class="btn btn-primary" href="javascript:void(0)">Xem tất cả thông báo</a>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <div class="mode">
                                <span class="lnr lnr-moon"></span>
                            </div>
                        </li>

                        <li class="onhover-dropdown">
                            <span class="lnr lnr-bubble"></span>
                            <ul class="chat-dropdown onhover-show-div">
                                <li>
                                    <span class="lnr lnr-bubble"></span>
                                    <h6 class="f-18 mb-0">Message Box</h6>
                                </li>
                        
                                @foreach($notifications as $notification)
                                    <li>
                                        <div class="media">
                                            <img class="img-fluid rounded-circle me-3" src="{{ asset('admin/assets/images/user/' . $notification->user->profile_image) }}" alt="user{{ $notification->user->id }}">
                                            <div class="status-circle {{ $notification->user->status == 'online' ? 'online' : 'offline' }}"></div>
                                            <div class="media-body">
                                                <span>{{ $notification->user->name }}</span>
                                                <p>{{ $notification->message }}</p>
                                            </div>
                                            <p class="f-12 font-success">{{ $notification->created_at->diffForHumans() }}</p>
                                        </div>
                                    </li>
                                @endforeach
                        
                                <li class="text-center">
                                    <a class="btn btn-primary" href="{{ route('notifications.index') }}">View All</a>
                                </li>
                            </ul>
                        </li>
                        

                        <li class="maximize">
                            <a class="text-dark" href="javascript:void(0)!" onclick="javascript:toggleFullScreen()">
                                <span class="lnr lnr-frame-expand"></span>
                            </a>
                        </li>
                        <li class="profile-nav onhover-dropdown pe-0 me-0">
                            <div class="media profile-media">
                                <img class="user-profile rounded-circle" src="{{asset('admin/assets')}}/images/users/4.jpg" alt="">
                                <div class="user-name-hide media-body">
                                    <span>6guys</span>
                                    <p class="mb-0 font-roboto">Admin<i class="middle fa fa-angle-down"></i></p>
                                </div>
                            </div>
                            <ul class="profile-dropdown onhover-show-div">
                                <li>
                                    <a href={{ route('admin.user.index') }}>
                                        <i data-feather="users"></i>
                                        <span>Users</span>
                                    </a>
                                </li>
                                <li>
                                    <a href={{ route('admin.oders.list') }}>
                                        <i data-feather="archive"></i>
                                        <span>Orders</span>
                                    </a>
                                </li>
                                
                                <li>
                                    <a data-bs-toggle="modal" data-bs-target="#staticBackdrop"
                                        href={{ route('index') }}>
                                        <i data-feather="log-out"></i>
                                        <span>Log out</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Page Header Ends-->

        <!-- Page Body Start-->
        <div class="page-body-wrapper">
       @include('admin.layouts.sidebar')

          @yield('content')
        </div>
        <!-- Page Body End -->
    </div>
    <!-- page-wrapper End-->

<!-- Modal Start -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <h5 class="modal-title" id="staticBackdropLabel">Đăng Xuất</h5>
                <p>Bạn có chắc chắn muốn đăng xuất ?</p>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="button-box">
                    <button type="button" class="btn btn--no" data-bs-dismiss="modal">Không</button>
                    <!-- Nút 'Có' -->
                    <button type="button" class="btn btn--yes btn-primary" onclick="window.location.href='{{ route('index') }}'">Có</button>
                </div>
            </div>
        </div>
    </div>
</div>

    <!-- Modal End -->

    <!-- latest js -->
    <script src="{{asset('admin/assets')}}/js/jquery-3.6.0.min.js"></script>

    <!-- Bootstrap js -->
    <script src="{{asset('admin/assets')}}/js/bootstrap/bootstrap.bundle.min.js"></script>

    <!-- feather icon js -->
    <script src="{{asset('admin/assets')}}/js/icons/feather-icon/feather.min.js"></script>
    <script src="{{asset('admin/assets')}}/js/icons/feather-icon/feather-icon.js"></script>

    <!-- scrollbar simplebar js -->
    <script src="{{asset('admin/assets')}}/js/scrollbar/simplebar.js"></script>
    <script src="{{asset('admin/assets')}}/js/scrollbar/custom.js"></script>

    <!-- Sidebar jquery -->
    <script src="{{asset('admin/assets')}}/js/config.js"></script>

    <!-- tooltip init js -->
    <script src="{{asset('admin/assets')}}/js/tooltip-init.js"></script>

    <!-- Plugins JS -->
    <script src="{{asset('admin/assets')}}/js/sidebar-menu.js"></script>
    <script src="{{asset('admin/assets')}}/js/notify/bootstrap-notify.min.js"></script>
    <script src="{{asset('admin/assets')}}/js/notify/index.js"></script>

    <!-- Apexchar js -->
    <script src="{{asset('admin/assets')}}/js/chart/apex-chart/apex-chart1.js"></script>
    <script src="{{asset('admin/assets')}}/js/chart/apex-chart/moment.min.js"></script>
    <script src="{{asset('admin/assets')}}/js/chart/apex-chart/apex-chart.js"></script>
    <script src="{{asset('admin/assets')}}/js/chart/apex-chart/stock-prices.js"></script>
    <script src="{{asset('admin/assets')}}/js/chart/apex-chart/chart-custom1.js"></script>

    <!-- customizer js -->
    <script src="{{asset('admin/assets')}}/js/customizer.js"></script>

    <!-- ratio js -->
    <script src="{{asset('admin/assets')}}/js/ratio.js"></script>

    <!-- Theme js -->
    <script src="{{asset('admin/assets')}}/js/script.js"></script>
</body>


<!-- Mirrored from themes.pixelstrap.com/voxo/back-end/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 24 Apr 2024 08:43:11 GMT -->
</html>
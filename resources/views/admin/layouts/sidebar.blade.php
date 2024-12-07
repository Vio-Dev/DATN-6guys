     <!-- Page Sidebar Start-->
     <div class="sidebar-wrapper">
         <div>
             <div class="logo-wrapper logo-wrapper-center">
                 <a href="index.html" data-bs-original-title="" title="">
                     <img class="img-fluid for-dark" src="{{ asset('admin/assets') }}/images/logo/logo-white.png"
                         alt="">
                 </a>
                 <div class="back-btn">
                     <i class="fa fa-angle-left"></i>
                 </div>
                 <div class="toggle-sidebar">
                     <i class="status_toggle middle sidebar-toggle" data-feather="grid"></i>
                 </div>
             </div>
             <div class="logo-icon-wrapper">
                 <a href="index.html">
                     <img class="img-fluid main-logo" src="{{ asset('admin/assets') }}/images/logo/logo.png"
                         alt="logo">
                 </a>
             </div>
             <nav class="sidebar-main">
                 <div class="left-arrow" id="left-arrow">
                     <i data-feather="arrow-left"></i>
                 </div>

                 <div id="sidebar-menu">
                     <ul class="sidebar-links" id="simple-bar">
                         <li class="back-btn"></li>
                         <li class="sidebar-main-title sidebar-main-title-3">
                             <div>
                                 <h6 class="lan-1">Tổng quan</h6>
                                 <p class="lan-2">Dashboards &amp; Users.</p>
                             </div>
                         </li>

                         <li class="sidebar-list">
                             <a class="sidebar-link sidebar-title link-nav" href="{{ route('admin.index') }}">
                                 <i data-feather="home"></i>
                                 <span>Bảng điều khiển</span>
                             </a>
                         </li>

                         <li class="sidebar-list">
                             <a class="sidebar-link sidebar-title" href="javascript:void(0)">
                                 <i data-feather="users"></i>
                                 <span>Người Dùng</span>
                             </a>
                             <ul class="sidebar-submenu">
                                 <li>
                                     <a href="{{ route('admin.user.index') }}">Tất Cả Người Dùng</a>
                                 </li>
                                 <li>
                                     <a href="{{ route('admin.user.add') }}">Thêm Người Dùng Mới</a>
                                 </li>
                             </ul>
                         </li>
                         <li class="sidebar-list">
                            <a class="sidebar-link sidebar-title" href="javascript:void(0)">
                                <i data-feather="users"></i>
                                <span>Bài viết</span>
                            </a>
                            <ul class="sidebar-submenu">
                                <li>
                                    <a href="{{ route('admin.blog.index') }}">Danh sách bài viết</a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.blog.add') }}">Thêm bài viết</a>
                                </li>
                            </ul>
                        </li>

                         <li class="sidebar-list">
                             <a class="sidebar-link sidebar-title" href="javascript:void(0)">
                                 <i data-feather="archive"></i>
                                 <span>Đơn Hàng</span>
                             </a>
                             <ul class="sidebar-submenu">
                                 <li>
                                     <a href="{{ route('admin.oders.list') }}">Danh Sách </a>
                                 </li>
                                 {{-- <li>
                                     <a href="order-detail.html">Order Detail</a>
                                 </li>
                                 <li>
                                     <a href="order-tracking.html">Order Tracking</a>
                                 </li> --}}
                             </ul>
                         </li>

                         <li class="sidebar-list">
                             <a class="linear-icon-link sidebar-link sidebar-title" href="javascript:void(0)">
                                 <i data-feather="users"></i>
                                 <span>Danh Mục</span>
                             </a>
                             <ul class="sidebar-submenu">
                                 <li>
                                     <a href="{{ route('admin.categories.index') }}">Danh Sách</a>
                                 </li>

                                 <li>
                                     <a href="{{ route('admin.categories.add') }}">Thêm Danh Mục</a>
                                 </li>
                             </ul>
                         </li>

                         <li class="sidebar-list">
                            <a class="linear-icon-link sidebar-link sidebar-title" href="javascript:void(0)">
                                <i data-feather="box"></i>
                                <span>Sản Phẩm</span>
                            </a>
                            <ul class="sidebar-submenu">
                                <li>
                                    <a href="{{ route('admin.products.index') }}">Danh Sách</a>
                                </li>

                                <li>
                                    <a href="{{ route('admin.products.add') }}">Thêm Sản Phẩm</a>
                                </li>
                            </ul>
                        </li>


                    
                         <li class="sidebar-list">
                            <a class="sidebar-link sidebar-title" href="javascript:void(0)">
                                <i data-feather="users"></i>
                                <span>Mã Giảm Giá</span>
                            </a>
                            <ul class="sidebar-submenu">
                                <li>
                                    <a href="{{ route('admin.coupons.index') }}">Danh sách Mã</a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.coupons.create') }}">Thêm Mã</a>
                                </li>
                            </ul>
                        </li>
                         {{-- <li class="sidebar-list">
                             <a class="sidebar-link sidebar-title link-nav" href="product-review.html">
                                 <i data-feather="star"></i>
                                 <span>Product Review</span>
                             </a>
                         </li> --}}

                         <li class="sidebar-list">
                            <a class="sidebar-link sidebar-title link-nav" href="{{ route('admin.products.stock') }}">
                                <i data-feather="archive"></i>
                                <span>Kho</span>
                            </a>
                        </li>
                         
                         {{-- <li class="sidebar-list">
                             <a class="sidebar-link sidebar-title link-nav" href="reports.html">
                                 <i data-feather="file-text"></i>
                                 <span>Reports</span>
                             </a>
                         </li> --}}

                         {{-- <li class="sidebar-list">
                             <a class="sidebar-link sidebar-title link-nav" href="list-page.html">
                                 <i data-feather="list"></i>
                                 <span>List Page</span>
                             </a>
                         </li> --}}

                         <li class="sidebar-list">
                             <a class="sidebar-link sidebar-title link-nav" href="{{ route('index') }}">
                                 <i data-feather="log-in"></i>
                                 <span>Log In</span>
                             </a>
                         </li>

                         {{-- <li class="sidebar-list">
                             <a class="sidebar-link sidebar-title link-nav" href="forgot-password.html">
                                 <i data-feather="key"></i>
                                 <span>Forgot Password</span>
                             </a>
                         </li> --}}

                         <li class="sidebar-list">
                             <a class="sidebar-link sidebar-title link-nav" href="sign-up.html">
                                 <i data-feather="plus-circle"></i>
                                 <span>Register</span>
                             </a>
                         </li>
                     </ul>
                 </div>
                 <div class="right-arrow" id="right-arrow">
                     <i data-feather="arrow-right"></i>
                 </div>
             </nav>
         </div>
     </div>
     <!-- Page Sidebar Ends-->

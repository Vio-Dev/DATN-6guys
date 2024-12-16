  <!-- Shop Sidebar Start -->
            <div class="col-lg-3 col-md-12">
                <div class="border-bottom mb-4 pb-4">
                    <h5 class="font-weight-semi-bold mb-4">Danh mục sản phẩm</h5>
                    <ul class="nav nav-pills mb-3">
                        <!-- Tất cả danh mục -->
                        <li class="nav-item">
                            <a href="{{ route('products.index') }}" class="nav-link text-dark">Tất cả danh mục</a>
                        </li>
                        
                        <!-- Chuột không dây -->
                        <li class="nav-item">
                            <a href="{{ route('category.chuotkhongday') }}" class="nav-link text-dark">Chuột không dây</a>
                        </li>
                
                        <!-- Bàn phím cơ -->
                        <li class="nav-item">
                            <a href="{{ route('category.banphimco') }}" class="nav-link text-dark">Bàn phím cơ</a>
                        </li>
                
                        <!-- Bàn học -->
                        <li class="nav-item">
                            <a href="{{ route('category.banhoc') }}" class="nav-link text-dark">Bàn học</a>
                        </li>
                
                        <!-- Màn hình -->
                        <li class="nav-item">
                            <a href="{{ route('category.manhinh') }}" class="nav-link text-dark">Màn hình</a>
                        </li>
                    </ul>
                </div>
                
                <style>
                    .nav-link.text-dark {
                        transition: color 0.3s ease, background-color 0.3s ease;
                    }
                
                    .nav-link.text-dark:hover {
                        color: #fff;
                        background-color: #e4c6b1;
                        border-radius: 5px;
                    }
                </style>
                
                <!-- Color End -->

            </div>
            


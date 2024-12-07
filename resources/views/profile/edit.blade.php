@extends('layout')
@section('content')
    {{-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div> --}}
    {{-- <body>
        <div class="container my-5">
            <div class="row">
                <!-- Sidebar Menu -->
                <div class="col-md-3">
                    <div class="list-group">
                        <a href="#profile" class="list-group-item list-group-item-action active" data-bs-toggle="list">
                            Thông tin hồ sơ
                        </a>
                        <a href="#orders" class="list-group-item list-group-item-action" data-bs-toggle="list">
                            Đơn hàng
                        </a>
                        <a href="#settings" class="list-group-item list-group-item-action" data-bs-toggle="list">
                            Cài đặt
                        </a>
                        <a href="#logout" class="list-group-item list-group-item-action">
                            Đăng xuất
                        </a>
                    </div>
                </div>
    
                <!-- Main Content -->
                <div class="col-md-9">
                    <div class="tab-content">
                        <!-- Profile Tab -->
                        <div class="tab-pane fade show active" id="profile">
                            <h3>Thông tin hồ sơ</h3>
                            <form>
                                <div class="mb-3">
                                    <label for="fullName" class="form-label">Họ và tên</label>
                                    <input type="text" class="form-control" id="fullName" placeholder="Nhập họ và tên">
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" placeholder="Nhập email">
                                </div>
                                <div class="mb-3">
                                    <label for="phone" class="form-label">Số điện thoại</label>
                                    <input type="tel" class="form-control" id="phone" placeholder="Nhập số điện thoại">
                                </div>
                                <button type="submit" class="btn btn-primary">Cập nhật</button>
                            </form>
                        </div>
    
                        <!-- Orders Tab -->
                        <div class="tab-pane fade" id="orders">
                            <h3>Đơn hàng</h3>
                            <table class="table table-bordered">
                                <thead class="table-light">
                                    <tr>
                                        <th>#</th>
                                        <th>Mã đơn hàng</th>
                                        <th>Ngày đặt</th>
                                        <th>Trạng thái</th>
                                        <th>Thành tiền</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>DH001</td>
                                        <td>2024-11-17</td>
                                        <td>Đã giao</td>
                                        <td>1,000,000đ</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>DH002</td>
                                        <td>2024-11-15</td>
                                        <td>Đang xử lý</td>
                                        <td>500,000đ</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
    
                        <!-- Settings Tab -->
                        <div class="tab-pane fade" id="settings">
                            <h3>Cài đặt</h3>
                            <p>Phần này chứa các tùy chọn cài đặt tài khoản.</p>
                        </div>
    
                        <!-- Logout Tab -->
                        <div class="tab-pane fade" id="logout">
                            <h3>Đăng xuất</h3>
                            <p>Bạn có chắc chắn muốn đăng xuất không?</p>
                            <button class="btn btn-danger">Đăng xuất</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body> --}}
    <body>
        <div class="container my-5">
            <div class="row">
                <!-- Sidebar Menu -->
                <div class="col-md-3">
                    <div class="list-group">
                        <a href="#profile" class="list-group-item list-group-item-action active" data-bs-toggle="list">
                            Thông tin hồ sơ
                        </a>
                        <a href="#orders" class="list-group-item list-group-item-action" data-bs-toggle="list">
                            Đơn hàng
                        </a>
                        <a href="#password" class="list-group-item list-group-item-action" data-bs-toggle="list">
                            Cập nhật mật khẩu
                        </a>
                        <a href="#delete" class="list-group-item list-group-item-action" data-bs-toggle="list">
                            Xóa tài khoản
                        </a>
                        <a href="#" class="list-group-item list-group-item-action"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Đăng xuất
                        </a>
                        <form id="logout-form" method="POST" action="{{ route('logout') }}" class="d-none">
                            @csrf
                        </form>

                    </div>
                </div>

                <!-- Main Content -->
                <div class="col-md-9">
                    <div class="tab-content">
                        <!-- Profile Update Tab -->
                        <div class="tab-pane fade show active" id="profile">
                            <h3>Thông tin hồ sơ</h3>
                            <form method="post" action="{{ route('profile.update') }}">
                                @csrf
                                @method('patch')

                                <div class="mb-3">
                                    <label for="fullName" class="form-label">Họ và tên</label>
                                    <input type="text" class="form-control" id="fullName" name="name"
                                        value="{{ old('name', $user->name) }}" placeholder="Nhập họ và tên" required>
                                    @error('name')
                                        <div class="text-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        value="{{ old('email', $user->email) }}" placeholder="Nhập email" required>
                                    @error('email')
                                        <div class="text-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="phone" class="form-label">Số điện thoại</label>
                                    <input type="tel" class="form-control" id="phone" name="phone"
                                        value="{{ old('phone', $user->phone ?? '') }}" placeholder="Nhập số điện thoại">
                                </div>

                                <button type="submit" class="btn btn-primary">Cập nhật</button>
                            </form>
                        </div>
                        <!-- Orders Tab -->
                        <div class="tab-pane fade" id="orders">
                            <h3>Đơn hàng</h3>
                            <table class="table table-bordered">
                                <thead class="table-light">
                                    <tr>
                                        <th>#</th>
                                        <th>Mã đơn hàng</th>
                                        <th>Ngày đặt</th>
                                        <th>Trạng thái</th>
                                        <th>Thành tiền</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>DH001</td>
                                        <td>2024-11-17</td>
                                        <td>Đã giao</td>
                                        <td>1,000,000đ</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>DH002</td>
                                        <td>2024-11-15</td>
                                        <td>Đang xử lý</td>
                                        <td>500,000đ</td>
                                    </tr>
                                    <!-- Bạn có thể thêm các đơn hàng khác ở đây -->
                                </tbody>
                            </table>
                        </div>
                        {{-- <div class="tab-pane fade" id="orders">
                            <h3>Đơn hàng</h3>
                            <table class="table table-bordered">
                                <thead class="table-light">
                                    <tr>
                                        <th>#</th>
                                        <th>Mã đơn hàng</th>
                                        <th>Ngày đặt</th>
                                        <th>Trạng thái</th>
                                        <th>Thành tiền</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Lặp qua các đơn hàng -->
                                    @foreach ($orders as $order)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $order->order_number }}</td>
                                            <td>{{ $order->created_at->format('d/m/Y') }}</td>
                                            <td>{{ $order->status }}</td>
                                            <td>{{ number_format($order->total, 0, ',', '.') }}đ</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div> --}}

                        <!-- Password Update Tab -->
                        <div class="tab-pane fade" id="password">
                            <h3>Cập nhật mật khẩu</h3>
                            <form method="post" action="{{ route('password.update') }}">
                                @csrf
                                @method('put')

                                <div class="mb-3">
                                    <label for="current_password" class="form-label">Mật khẩu hiện tại</label>
                                    <input id="current_password" name="current_password" type="password"
                                        class="form-control" autocomplete="current-password" required>
                                    @error('current_password')
                                        <div class="text-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="password" class="form-label">Mật khẩu mới</label>
                                    <input id="password" name="password" type="password" class="form-control"
                                        autocomplete="new-password" required>
                                    @error('password')
                                        <div class="text-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="password_confirmation" class="form-label">Xác nhận mật khẩu mới</label>
                                    <input id="password_confirmation" name="password_confirmation" type="password"
                                        class="form-control" autocomplete="new-password" required>
                                    @error('password_confirmation')
                                        <div class="text-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-primary">Cập nhật</button>
                            </form>
                        </div>
                        <!-- Delete User Tab -->
                        <div class="tab-pane fade" id="delete">
                            <h3>Xóa tài khoản</h3>
                            <p class="text-danger">Hành động này không thể hoàn tác. Nếu bạn muốn tiếp tục, vui lòng xác
                                nhận.</p>
                            <form method="post" action="{{ route('profile.destroy') }}">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger">Xóa tài khoản</button>
                            </form>
                        </div>
                        <!-- Logout Tab -->
                        <div class="tab-pane fade" id="logout">
                            <h3>Đăng xuất</h3>
                            <p>Bạn có chắc chắn muốn đăng xuất không?</p>
                            <form method="post" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="btn btn-danger">Đăng xuất</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
    <style>
        /* Thay đổi màu nền của tất cả các nút có lớp .btn */
        .btn {
            background-color: black;
            color: white;
            /* Đảm bảo chữ màu trắng để nổi bật trên nền đen */
            border-color: black;
        }

        /* Thay đổi màu của các nút khi hover (di chuột) */
        .btn:hover {
            background-color: #333;
            /* Màu xám đậm khi di chuột qua */
            border-color: #333;
        }

        /* Thêm màu sắc cho các nút cụ thể nếu cần */
        .btn-primary {
            background-color: black;
            color: white;
            border-color: black;
        }

        .btn-danger {
            background-color: black;
            color: white;
            border-color: black;
        }

        .list-group-item.active {
            background-color: black !important;
            color: white !important;
        }
    </style>
@endsection

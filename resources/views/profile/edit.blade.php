@extends('layout')

@section('content')
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
                    <a href="#wishlist" class="list-group-item list-group-item-action" data-bs-toggle="list">
                        Sản phẩm yêu thích
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
                        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('put')

                            <!-- Avatar Upload -->
                            <div class="mb-3">
                                @if ($user->avatar)
                                    <div class="mt-3">
                                        <img src="{{ asset('storage/' . $user->avatar) }}" alt="Avatar"
                                            class="img-thumbnail" style="width: 150px; height: 150px;">
                                    </div>
                                @else
                                    <p class="mt-3 text-muted">Chưa có ảnh đại diện.</p>
                                @endif

                                <!-- Avatar Upload Form -->
                                <label for="avatar" class="form-label">Ảnh đại diện</label>
                                <input type="file" class="form-control" id="avatar" name="avatar" accept="image/*">
                                @error('avatar')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Full Name -->
                            <div class="mb-3">
                                <label for="fullName" class="form-label">Họ và tên</label>
                                <input type="text" class="form-control" id="fullName" name="name"
                                    value="{{ old('name', $user->name) }}" placeholder="Nhập họ và tên" required>
                                @error('name')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Email -->
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    value="{{ old('email', $user->email) }}" placeholder="Nhập email" required>
                                @error('email')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Phone Number -->
                            <div class="mb-3">
                                <label for="phone" class="form-label">Số điện thoại</label>
                                <input type="tel" class="form-control" id="phone" name="phone"
                                    value="{{ old('phone', $user->phone ?? '') }}" placeholder="Nhập số điện thoại">
                                @error('phone')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Submit Button -->
                            <button type="submit" class="btn btn-primary">Cập nhật</button>
                        </form>
                    </div>

                    <!-- oder Tab -->
                    <div class="tab-pane fade" id="orders">
                        <h3>Đơn hàng</h3>
                        <table class="table table-bordered">
                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>ID Đơn hàng</th>
                                    <th>Ngày đặt</th>
                                    <th>Tổng tiền</th>
                                    <th>Trạng thái</th>
                                    {{-- <th>Hành động</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $order->id }}</td>
                                        <td>{{ $order->created_at->format('d/m/Y') }}</td>
                                        <td>{{ number_format($order->total_price, 0, ',', '.') }} VND</td>
                                        <td>
                                            @switch($order->status)
                                                @case('pending')
                                                    <span class="badge bg-warning text-dark">Chờ xác nhận</span>
                                                @break

                                                @case('confirmed')
                                                    <span class="badge bg-success">Đã xác nhận</span>
                                                @break

                                                @case('shipping')
                                                    <span class="badge bg-info text-dark">Đang giao hàng</span>
                                                @break

                                                @case('delivered')
                                                    <span class="badge bg-primary">Đã giao thành công</span>
                                                @break

                                                @case('canceled')
                                                    <span class="badge bg-danger">Đã hủy</span>
                                                @break

                                                @default
                                                    <span class="badge bg-secondary">Không xác định</span>
                                            @endswitch
                                        </td>
                                        {{-- <td>
                                            <a href="{{ route('user.orders.show', $order->id) }}" class="btn btn-info btn-sm mb-1">
                                                Xem chi tiết
                                            </a>
                                            @if ($order->status === 'pending')
                                                <form action="{{ route('user.orders.cancel', $order->id) }}" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn hủy đơn hàng này?');" class="d-inline">
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger btn-sm">
                                                        Hủy đơn hàng
                                                    </button>
                                                </form>
                                            @else
                                                <button class="btn btn-secondary btn-sm" disabled>Không thể hủy</button>
                                            @endif
                                        </td> --}}
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Tab Yêu thích -->
                    <div class="tab-pane fade" id="wishlist">
                        <h3>Sản phẩm yêu thích</h3>
                        <table class="table table-bordered">
                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>Ảnh</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Giá</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @dd($wishlists) --}}
                                @foreach ($wishlists as $index => $wishlist)
                                    <tr>
                                        <td class="text-center">{{ $index + 1 }}</td>

                                        <!-- Hiển thị ảnh sản phẩm -->
                                        <td class="text-center">
                                            @if (isset($wishlist->product->image))
                                                @php
                                                    $images = json_decode($wishlist->product->image, true);
                                                @endphp
                                                @if (is_array($images) && count($images) > 0)
                                                    <img src="{{ asset('storage/' . $images[0]) }}"
                                                        alt="{{ $wishlist->product->name }}"
                                                        style="width: 80px; height: 80px; object-fit: cover;"
                                                        class="img-thumbnail">
                                                @else
                                                    <img src="{{ asset('path/to/default-image.jpg') }}" alt="Ảnh không có"
                                                        style="width: 80px; height: 80px; object-fit: cover;"
                                                        class="img-thumbnail">
                                                @endif
                                            @else
                                                <img src="{{ asset('path/to/default-image.jpg') }}" alt="Ảnh không có"
                                                    style="width: 80px; height: 80px; object-fit: cover;"
                                                    class="img-thumbnail">
                                            @endif
                                        </td>

                                        <td>{{ $wishlist->product->name }}</td>
                                        <td class="text-center">
                                            <span class="fw-bold text-danger">
                                                {{ number_format($wishlist->product->price, 0, ',', '.') }} VNĐ
                                            </span>
                                        </td>

                                        <td class="text-center">
                                            <!-- Thêm vào giỏ hàng -->
                                            <form action="{{ route('cart.add', $wishlist->product->id) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-success">
                                                    <i class="bi bi-cart-plus"></i> Thêm vào giỏ hàng
                                                </button>
                                            </form>

                                            <!-- Nút xóa khỏi danh sách yêu thích -->
                                            <a href="{{ route('wishlist.destroy', $wishlist->id) }}"
                                                onclick="event.preventDefault(); document.getElementById('delete-form-{{ $wishlist->id }}').submit();"
                                                class="btn btn-sm btn-danger">
                                                <i class="bi bi-trash"></i> Xóa
                                            </a>

                                            <!-- Form xóa sản phẩm yêu thích -->
                                            <form id="delete-form-{{ $wishlist->id }}"
                                                action="{{ route('wishlist.destroy', $wishlist->id) }}" method="POST"
                                                style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
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

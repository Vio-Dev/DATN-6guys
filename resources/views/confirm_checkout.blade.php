@extends('layout')

@section('content')
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    
    <div class="container my-5">
        <h2 class="text-center mb-4 text-uppercase fw-bold text-primary">Thông tin thanh toán</h2>

        <!-- Form Thanh toán -->
        <form action="{{ route('user.checkout.process') }}" method="POST">
            @csrf
            <div class="row">
                <!-- Thông tin khách hàng -->
                <div class="col-md-6 mb-4">
                    <div class="card border-0 shadow p-4">
                        <h4 class="mb-3 text-secondary">Thông tin khách hàng</h4>
                        <div class="mb-3">
                            <label for="name" class="form-label">Họ và tên</label>
                            <input type="text" name="name" id="name" class="form-control border-secondary"
                                placeholder="Nhập họ tên của bạn" required>
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Địa chỉ giao hàng</label>
                            <input type="text" name="address" id="address" class="form-control border-secondary"
                                placeholder="Nhập địa chỉ giao hàng" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" id="email" class="form-control border-secondary"
                                placeholder="Nhập Gmail" required>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Số điện thoại</label>
                            <input type="text" name="phone" id="phone" class="form-control border-secondary"
                                placeholder="Nhập số điện thoại" required>
                        </div>
                    </div>
                </div>

                <!-- Phương thức thanh toán -->
                <div class="col-md-6 mb-4">
                    <div class="card border-0 shadow p-4">
                        <h4 class="mb-3 text-secondary">Phương thức thanh toán</h4>
                        <div>
                            <div class="form-check mb-3">
                                <input type="radio" name="payment_method" id="cod" value="cod"
                                    class="form-check-input" required>
                                <label for="cod" class="form-check-label">Thanh toán khi nhận hàng (COD)</label>
                            </div>
                            <div class="form-check mb-3">
                                <input type="radio" name="payment_method" id="qr" value="qr"
                                    class="form-check-input" required>
                                <label for="qr" class="form-check-label">Thanh toán bằng QR Code</label>
                            </div>
                        </div>
                        <div id="payment-qr-info" class="mt-3 d-none">
                            <div class="alert alert-info">
                                <p class="mb-2">Quét mã QR bằng ứng dụng ngân hàng.</p>
                                <img src="{{ asset('img/QR.jpg') }}" alt="QR Code" class="img-fluid border shadow-sm"
                                    style="max-width: 200px;">
                            </div>
                        </div>

                    </div>
                </div>

            </div>

            <!-- Tóm tắt giỏ hàng -->
            <div class="row mt-4">
                <div class="col-12">
                    <div class="card border-0 shadow p-4">
                        <h4 class="mb-3 text-secondary">Sản phẩm của bạn</h4>
                        <table class="table table-striped table-hover align-middle">
                            <thead>
                                <tr class="text-secondary">
                                    <th>Hình ảnh</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Số lượng</th>
                                    <th>Giá</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cart as $item)
                                    <tr>
                                        <td>
                                            <img src="{{ asset('storage/' . json_decode($item['image'])[0]) }}"
                                                alt="{{ $item['name'] }}" class="img-thumbnail shadow-sm"
                                                style="width: 100px;">
                                        </td>
                                        <td>{{ $item['name'] }}</td>
                                        <td>{{ $item['quantity'] }}</td>
                                        <td>{{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }} VNĐ</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- Áp dụng mã giảm giá -->
                        {{-- <div class="d-flex justify-content-center">
                            <form action="{{ route('user.checkout.applyDiscount') }}" method="POST" class="w-100"
                                style="max-width: 500px;">
                                @csrf
                                <div class="input-group shadow-sm">
                                    <input type="text" name="coupon_code"
                                        class="form-control rounded-start border-secondary" placeholder="Nhập mã giảm giá"
                                        style="padding: 12px;" required>
                                    <button type="submit" class="btn btn-primary rounded-end fw-bold text-uppercase"
                                        style="padding: 12px 20px;">
                                        Áp dụng
                                    </button>
                                </div>
                                <small class="text-secondary d-block mt-2 text-center">
                                    Nhập mã giảm giá để nhận ưu đãi.
                                </small>
                            </form>
                        </div> --}}
                        <div class="mt-3">
                            <p class="mb-1 text-secondary"><strong>Tổng giá trị giỏ hàng:</strong>
                                {{ number_format($totalPrice, 0, ',', '.') }} VND</p>
                                @if (session('discounted_price'))
                                <p class="mb-1 text-secondary"><strong>Giảm giá:</strong>
                                    {{ number_format($totalPrice - session('discounted_price'), 0, ',', '.') }} VND
                                </p>
                                <p class="mb-0 text-secondary"><strong>Tổng cộng:</strong>
                                    {{ number_format(session('discounted_price'), 0, ',', '.') }} VND
                                </p>
                            @else
                                <p class="mb-0 text-secondary"><strong>Tổng cộng:</strong>
                                    {{ number_format($totalPrice, 0, ',', '.') }} VND
                                </p>
                            @endif
                        </div>
                        

                        <div class="text-end mt-4">
                            <button type="submit" class="btn btn-success btn-lg shadow-sm">Xác nhận thanh toán</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <style>
        /* Thay đổi màu chữ tiêu đề */
        h2.text-primary {
            color: #007bff; /* Xanh */
        }
    
        h4.text-secondary {
            color: #6c757d; /* Xám */
        }
    
        p.text-secondary {
            color: #555; /* Xám đậm */
        }
    
        .btn-success {
            color: #fff; /* Thêm màu chữ trắng cho nút xanh */
        }
    
        /* Thay đổi màu chữ trong thông tin giỏ hàng */
        .table th,
        .table td {
            color: #333; /* Màu đen nhẹ */
        }
    
        /* Thêm hover effect */
        .btn:hover {
            color: #000;
        }
    
        /* Thêm màu chữ thông báo thông tin */
        .alert-success {
            color: #fff; /* Màu trắng trên nền xanh */
        }
    
        .alert-info {
            color: #000; /* Thêm màu chữ thông tin */
        }

    </style>
    
    <script>
        document.querySelectorAll('[name="payment_method"]').forEach(method => {
            method.addEventListener('change', function() {
                document.getElementById('payment-qr-info').style.display = this.value === 'qr' ? 'block' :
                    'none';
            });
        });
    </script>
@endsection

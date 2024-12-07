@extends('layout')

@section('content')
@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="container my-5">
    <h2 class="text-center mb-4">Thông tin thanh toán</h2>
    <form action="{{ route('user.checkout.applyDiscount') }}" method="POST">
        @csrf
        <div class="input-group">
            <input type="text" name="coupon_code" class="form-control" placeholder="Nhập mã giảm giá" required>
            <button type="submit" class="btn btn-primary">Áp dụng</button>
        </div>
    </form>
    <form action="{{ route('user.checkout.process') }}" method="POST">
        @csrf

        <!-- Customer Information -->
        <div class="row">
            <div class="col-md-6 mb-4">
                <div class="card p-4 shadow-sm">
                    <h4 class="mb-3">Thông tin khách hàng</h4>
                    <div class="form-group mb-3">
                        <label for="name">Họ và tên</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Nhập họ tên của bạn" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="address">Địa chỉ giao hàng</label>
                        <input type="text" name="address" id="address" class="form-control" placeholder="Nhập địa chỉ giao hàng" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Nhập Gmail" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="phone">Số điện thoại</label>
                        <input type="text" name="phone" id="phone" class="form-control" placeholder="Nhập số điện thoại" required>
                    </div>
                </div>
            </div>
            
            <!-- Payment Method -->
            <div class="col-md-6 mb-4">
                <div class="card p-4 shadow-sm">
                    <h4 class="mb-3">Phương thức thanh toán</h4>
                    <div>
                        <div class="form-check mb-3">
                            <input type="radio" name="payment_method" id="cod" value="cod" class="form-check-input" required>
                            <label for="cod" class="form-check-label">Thanh toán khi nhận hàng (COD)</label>
                        </div>
                        <div class="form-check mb-3">
                            <input type="radio" name="payment_method" id="qr" value="qr" class="form-check-input" required>
                            <label for="qr" class="form-check-label">Thanh toán bằng QR Code</label>
                        </div>
                    </div>

                    <div id="payment-qr-info" class="mt-3" style="display: none;">
                        <div class="alert alert-info">
                            Quét mã QR bằng ứng dụng ngân hàng.
                            <img src="{{ asset('img/QR.jpg') }}" alt="QR Code" class="img-fluid mt-2" style="max-width: 200px;">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Cart Summary -->
        <div class="row mt-4">
            <div class="col-md-12">
                <div class="card p-4 shadow-sm">
                    <h4 class="mb-3">Sản phẩm của bạn</h4>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Hình ảnh</th>
                                <th>Tên sản phẩm</th>
                                <th>Số lượng</th>
                                <th>Giá</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cart as $item)
                                <tr>
                                    <td>
                                        <img src="{{ asset('storage/' . json_decode($item['image'])[0]) }}" alt="{{ $item['name'] }}" class="img-thumbnail" style="width: 100px;">
                                    </td>
                                    <td>{{ $item['name'] }}</td>
                                    <td>{{ $item['quantity'] }}</td>
                                    <td>{{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }} VNĐ</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div>
                        <p>Tổng giá trị giỏ hàng: {{ number_format($totalPrice, 0, ',', '.') }} VND</p>
        
                        @if(session('discounted_price'))
                            <p><strong>Giảm giá:</strong> {{ number_format($totalPrice - session('discounted_price'), 0, ',', '.') }} VND</p>
                            <p><strong>Tổng cộng:</strong> {{ number_format(session('discounted_price'), 0, ',', '.') }} VND</p>
                        @else
                            <p><strong>Tổng cộng:</strong> {{ number_format($totalPrice, 0, ',', '.') }} VND</p>
                        @endif
                    </div>
                    <div class="text-right mt-3">
                        <button type="submit" class="btn btn-success">Xác nhận thanh toán</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
    document.querySelectorAll('[name="payment_method"]').forEach(method => {
        method.addEventListener('change', function () {
            document.getElementById('payment-qr-info').style.display = this.value === 'qr' ? 'block' : 'none';
        });
    });
</script>
@endsection

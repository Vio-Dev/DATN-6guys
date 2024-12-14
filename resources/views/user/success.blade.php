@extends('layout')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
<div class="container my-5">
   

    <!-- Thank You Message -->
    <div class="text-center d-flex flex-column align-items-center">
        
        <div class="success-box border border-success rounded p-4 text-center">

            <div class="icon-container mb-3">
                <button class="check-button">
                    <i class="bi bi-check" style="font-size: 40px;"></i>
                  </button>
            </div>


            <h1 class="text-success">Cảm ơn bạn đã đặt hàng!</h1>
            <p>Đơn hàng của bạn đã được tiếp nhận và đang được xử lý.</p>

            <!-- Order Details -->
            <div class="order-details my-4 text-center">
                <h4>Thông tin đơn hàng</h4>
                <p><strong>Mã đơn hàng:</strong> {{ $order->id }}</p>
                <p><strong>Tên khách hàng:</strong> {{ $order->name }}</p>
                <p><strong>Địa chỉ giao hàng:</strong> {{ $order->address }}</p>
                <p><strong>Số điện thoại:</strong> {{ $order->phone }}</p>
                <p><strong>Tổng giá trị:</strong> {{ number_format($order->total_price, 0, ',', '.') }} VND</p>
            </div>

            <!-- Return to Home Button -->
            <a href="{{ route('index') }}" class="btn btn-primary mt-3">Quay lại trang chính</a>
        </div>
    </div>
</div>

<style>
    .success-box {
        max-width: 600px;
        border: 2px solid #28a745;
        border-radius: 10px;
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
    }

    .icon-container {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .order-details p {
        margin: 0;
        line-height: 1.6;
    }
    .check-button {
  border-radius: 50%;
  background-color: #4CAF50;
  width: 50px;
  height: 50px;
  display: flex;
  justify-content: center;
  align-items: center;
}

.check-button i {
  color: #fff;
  font-size: 24px;
}
</style>

@endsection
@extends('layout')

@section('content')

<div class="container my-5">
    <!-- Header Media Group -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <!-- User Button -->
        <button class="header-user btn btn-link p-0">
            <img src="{{ asset('img/user.png') }}" alt="user" class="img-fluid" style="width: 30px;">
        </button>
        <!-- Search Button -->
        <button class="header-src btn btn-link p-0">
            <i class="fas fa-search"></i>
        </button>
    </div>

    <!-- Thank You Message -->
    <div class="text-center">
        <h1>Cảm ơn bạn đã đặt hàng!</h1>
        <p>Đơn hàng của bạn đã được tiếp nhận và đang được xử lý.</p>
        <!-- Return to Home Button -->
        <a href="{{ route('index') }}" class="btn btn-primary">Quay lại trang chính</a>
    </div>
</div>


@endsection
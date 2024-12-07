@extends('layout')

@section('content')
{{-- <section class="bg0 p-t-104 p-b-116">
<div class="container">
    <h2>Chi tiết đơn hàng #{{ $order->id }}</h2>

    <div class="row mb-4">
        <div class="col-md-6">
            <strong>Ngày đặt:</strong> {{ $order->created_at->format('d/m/Y') }}
        </div>
        <div class="col-md-6">
            <strong>Trạng thái:</strong>
            @switch($order->status)
                @case('pending') Chờ xác nhận @break
                @case('confirmed') Đã xác nhận @break
                @case('shipping') Đang giao hàng @break
                @case('delivered') Đã giao thành công @break
                @case('canceled') Đã hủy @break
                @default Không xác định
            @endswitch
        </div>
    </div>

    <h4>Danh sách sản phẩm</h4>
    <table class="table table-bordered">
        <thead class="thead-light">
            <tr>
                <th>#</th>
                <th>Tên sản phẩm</th>
                <th>Giá</th>
                <th>Số lượng</th>
                <th>Tổng</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($order->orderDetails as $detail)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $detail->product_name }}</td>
                    <td>{{ number_format($detail->price, 0, ',', '.') }} VND</td>
                    <td>{{ $detail->quantity }}</td>
                    <td>{{ number_format($detail->price * $detail->quantity, 0, ',', '.') }} VND</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="row mt-4">
        <div class="col-md-6">
            <strong>Tổng tiền:</strong> {{ number_format($order->total_price, 0, ',', '.') }} VND
        </div>
        <div class="col-md-6 text-end">
            <a href="{{ route('user.orders.index') }}" class="btn btn-secondary">Quay lại</a>
        </div>
    </div>
</div>
</section> --}}
<section class="bg0 p-t-104 p-b-116">
    <div class="container">
        <h2 class="text-center mb-4">Chi tiết đơn hàng #{{ $order->id }}</h2>

        <!-- Thông tin chung -->
        <div class="row mb-4">
            <div class="col-md-6">
                <strong>Ngày đặt:</strong> {{ $order->created_at->format('d/m/Y') }}
            </div>
            <div class="col-md-6 text-end">
                <strong>Trạng thái:</strong>
                @switch($order->status)
                    @case('pending') <span class="badge bg-warning text-dark">Chờ xác nhận</span> @break
                    @case('confirmed') <span class="badge bg-success">Đã xác nhận</span> @break
                    @case('shipping') <span class="badge bg-info text-dark">Đang giao hàng</span> @break
                    @case('delivered') <span class="badge bg-primary">Đã giao thành công</span> @break
                    @case('canceled') <span class="badge bg-danger">Đã hủy</span> @break
                    @default <span class="badge bg-secondary">Không xác định</span>
                @endswitch
            </div>
        </div>

        <!-- Danh sách sản phẩm -->
        <h4>Danh sách sản phẩm</h4>
        <div class="table-responsive">
            <table class="table table-bordered align-middle">
                <thead class="table-dark text-center">
                    <tr>
                        <th>#</th>
                        <th>Tên sản phẩm</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Tổng</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order->orderDetails as $detail)
                        <tr>
                            <!-- Số thứ tự -->
                            <td class="text-center">{{ $loop->iteration }}</td>

                            <!-- Tên sản phẩm -->
                            <td>{{ $detail->product_name }}</td>

                            <!-- Giá -->
                            <td class="text-center">{{ number_format($detail->price, 0, ',', '.') }} VND</td>

                            <!-- Số lượng -->
                            <td class="text-center">{{ $detail->quantity }}</td>

                            <!-- Tổng -->
                            <td class="text-center">{{ number_format($detail->price * $detail->quantity, 0, ',', '.') }} VND</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Tổng tiền và nút quay lại -->
        <div class="row mt-4">
            <div class="col-md-6">
                <strong>Tổng tiền:</strong> 
                <span class="fw-bold text-danger">
                    {{ number_format($order->total_price, 0, ',', '.') }} VND
                </span>
            </div>
            <div class="col-md-6 text-end">
                <a href="{{ route('user.orders.index') }}" class="btn btn-secondary">Quay lại</a>
            </div>
        </div>
    </div>
</section>

@endsection

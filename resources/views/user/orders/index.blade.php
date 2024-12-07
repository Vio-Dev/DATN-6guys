@extends('layout')
@section('content')

{{-- <section class="bg0 p-t-104 p-b-116">
    <div class="container">
        <h2>Danh sách đơn hàng của bạn</h2>
        
        @if ($orders->isEmpty())
            <p>Bạn chưa có đơn hàng nào.</p>
        @else
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID Đơn hàng</th>
                        <th>Ngày đặt hàng</th>
                        <th>Tổng tiền</th>
                        <th>Trạng thái</th>
                        <th>Chi tiết</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->created_at->format('d/m/Y') }}</td>
                            <td>{{ number_format($order->total_price, 0, ',', '.') }} VND</td>
                            <td>
                                @switch($order->status)
                                    @case('pending')
                                        Chờ xác nhận
                                        @break
                                    @case('confirmed')
                                        Đã xác nhận
                                        @break
                                    @case('shipping')
                                        Đang giao hàng
                                        @break
                                    @case('delivered')
                                        Đã giao thành công
                                        @break
                                    @case('canceled')
                                        Đã hủy
                                        @break
                                    @default
                                        Không xác định
                                @endswitch
                            </td>
                            <td><a href="{{ route('user.orders.show', $order->id) }}" class="btn btn-info">Xem chi tiết</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</section> --}}
<section class="bg0 p-t-104 p-b-116">
    <div class="container">
        <h2 class="text-center mb-4">Danh sách đơn hàng của bạn</h2>
        
        @if ($orders->isEmpty())
            <div class="alert alert-info text-center">
                Bạn chưa có đơn hàng nào.
            </div>
        @else
            <div class="table-responsive">
                <table class="table table-bordered text-center align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>ID Đơn hàng</th>
                            <th>Ngày đặt hàng</th>
                            <th>Tổng tiền</th>
                            <th>Trạng thái</th>
                            <th>Chi tiết</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <!-- Số thứ tự -->
                                <td>{{ $loop->iteration }}</td>

                                <!-- ID Đơn hàng -->
                                <td>{{ $order->id }}</td>

                                <!-- Ngày đặt hàng -->
                                <td>{{ $order->created_at->format('d/m/Y') }}</td>

                                <!-- Tổng tiền -->
                                <td>
                                    <span class="fw-bold text-danger">
                                        {{ number_format($order->total_price, 0, ',', '.') }} VND
                                    </span>
                                </td>

                                <!-- Trạng thái -->
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

                                <!-- Nút Chi tiết -->
                                <td>
                                    <a href="{{ route('user.orders.show', $order->id) }}" class="btn btn-info btn-sm">
                                        Xem chi tiết
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</section>

@endsection

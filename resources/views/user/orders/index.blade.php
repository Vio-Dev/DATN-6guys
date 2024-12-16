@extends('layout')
@section('content')

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
                            <th>Hành động</th>
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
                                            <span class="badge bg-warning text-dark">Đang đổi trả </span>
                                    @endswitch
                                </td>

                                <!-- Hành động -->
                                <td>
                                    <a href="{{ route('user.orders.show', $order->id) }}" class="btn btn-info btn-sm mb-1">
                                        Xem chi tiết
                                    </a>
                                    @if ($order->status === 'pending')
                                    @elseif ($order->status === 'delivered')
                                    <a href="{{ route('user.orders.return', $order->id) }}" class="btn btn-warning btn-sm">
                                        Đổi trả hàng
                                    </a>
                                @else 
                                        @endif
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

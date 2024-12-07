@extends('admin.layouts.app')

@section('content')
    {{-- <div class="page-body">
    <div class="container">
        <h2>Danh sách đơn hàng</h2>
        @if ($orders->isEmpty())
            <p>Không có đơn hàng nào.</p>
        @else
            @php
                $orderStatuses = [
                    'pending' => 'Chờ xác nhận',
                    'confirmed' => 'Đã xác nhận',
                    'shipping' => 'Đang giao hàng',
                    'delivered' => 'Đã giao thành công',
                    'canceled' => 'Đã hủy'
                ];
            @endphp
            <div class="row">
                @foreach ($orders as $order)
                    <div class="col-md-12 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">ID Đơn hàng: {{ $order->id }}</h5>
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <p class="card-text"><strong>Khách hàng:</strong> {{ $order->user->name ?? 'Khách vãng lai' }}</p>
                                        <p class="card-text"><strong>Địa chỉ:</strong> {{ $order->address }}</p>
                                        <p class="card-text"><strong>Số điện thoại:</strong> {{ $order->phone }}</p>
                                        <p class="card-text"><strong>Phương thức thanh toán:</strong> {{ $order->payment_method }}</p>
                                    </div>
                                    <div class="col-md-6">
                                        <p class="card-text"><strong>Tổng tiền:</strong> {{ number_format($order->total_price, 0, ',', '.') }} VND</p>
                                        <p class="card-text"><strong>Trạng thái:</strong>
                                            <form action="{{ route('orders.updateStatus', $order->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('PUT')
                                                <select name="status" class="form-control d-inline" onchange="this.form.submit()">
                                                    @foreach ($orderStatuses as $key => $label)
                                                        <option value="{{ $key }}" {{ $order->status == $key ? 'selected' : '' }}>{{ $label }}</option>
                                                    @endforeach
                                                </select>
                                            </form>
                                        </p>
                                    </div>
                                </div>

                                <!-- Button to toggle order details -->
                                <button class="btn btn-info" data-bs-toggle="collapse" data-bs-target="#orderDetails-{{ $order->id }}">
                                    Xem chi tiết
                                </button>

                                <!-- Collapse order details -->
                                <div id="orderDetails-{{ $order->id }}" class="collapse mt-2">
                                    <table class="table table-sm table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Sản phẩm</th>
                                                <th>Số lượng</th>
                                                <th>Giá</th>
                                                <th>Tổng</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($order->orderDetails as $detail)
                                                <tr>
                                                    @if ($detail->product)
                                                        <td>{{ $detail->product->name }}</td>
                                                    @else
                                                        <td>Sản phẩm không tồn tại</td>
                                                    @endif
                                                    <td>{{ $detail->quantity }}</td>
                                                    <td>{{ number_format($detail->price, 0, ',', '.') }} VND</td>
                                                    <td>{{ number_format($detail->price * $detail->quantity, 0, ',', '.') }} VND</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                <!-- Button to delete order -->
                                <form action="{{ route('orders.destroy', $order->id) }}" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn xóa đơn hàng này?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Xóa</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div> --}}
    {{-- <div class="page-body">
    <div class="container">
        <h2 class="text-center mb-4">Danh sách đơn hàng</h2>
        
        @if ($orders->isEmpty())
            <div class="alert alert-info text-center">
                Không có đơn hàng nào.
            </div>
        @else
            @php
                $orderStatuses = [
                    'pending' => 'Chờ xác nhận',
                    'confirmed' => 'Đã xác nhận',
                    'shipping' => 'Đang giao hàng',
                    'delivered' => 'Đã giao thành công',
                    'canceled' => 'Đã hủy'
                ];
            @endphp
            
            <div class="row">
                @foreach ($orders as $order)
                    <div class="col-md-12 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <!-- Hiển thị thông tin đơn hàng -->
                                <h5 class="card-title">ID Đơn hàng: {{ $order->id }}</h5>
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <!-- Thông tin khách hàng và địa chỉ -->
                                        <p class="card-text"><strong>Khách hàng:</strong> {{ $order->user->name ?? 'Khách vãng lai' }}</p>
                                        <p class="card-text"><strong>Địa chỉ:</strong> {{ $order->address }}</p>
                                    </div>
                                    <div class="col-md-6">
                                        <!-- Thông tin liên hệ và phương thức thanh toán -->
                                        <p class="card-text"><strong>Số điện thoại:</strong> {{ $order->phone }}</p>
                                        <p class="card-text"><strong>Phương thức thanh toán:</strong> {{ $order->payment_method }}</p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <p class="card-text"><strong>Tổng tiền:</strong> {{ number_format($order->total_price, 0, ',', '.') }} VND</p>
                                    </div>
                                    <div class="col-md-6">
                                        <p class="card-text"><strong>Trạng thái:</strong>
                                            <form action="{{ route('orders.updateStatus', $order->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('PUT')
                                                <select name="status" class="form-control d-inline" onchange="this.form.submit()">
                                                    @foreach ($orderStatuses as $key => $label)
                                                        <option value="{{ $key }}" {{ $order->status == $key ? 'selected' : '' }}>{{ $label }}</option>
                                                    @endforeach
                                                </select>
                                            </form>
                                        </p>
                                    </div>
                                </div>

                                <!-- Button to toggle order details -->
                                <button class="btn btn-info" data-bs-toggle="collapse" data-bs-target="#orderDetails-{{ $order->id }}">
                                    Xem chi tiết
                                </button>

                                <!-- Collapse order details -->
                                <div id="orderDetails-{{ $order->id }}" class="collapse mt-2">
                                    <table class="table table-sm table-bordered">
                                        <thead class="table-light">
                                            <tr>
                                                <th>Sản phẩm</th>
                                                <th>Số lượng</th>
                                                <th>Giá</th>
                                                <th>Tổng</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($order->orderDetails as $detail)
                                                <tr>
                                                    @if ($detail->product)
                                                        <td>{{ $detail->product->name }}</td>
                                                    @else
                                                        <td>Sản phẩm không tồn tại</td>
                                                    @endif
                                                    <td>{{ $detail->quantity }}</td>
                                                    <td>{{ number_format($detail->price, 0, ',', '.') }} VND</td>
                                                    <td>{{ number_format($detail->price * $detail->quantity, 0, ',', '.') }} VND</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                <!-- Button to delete order -->
                                <form action="{{ route('orders.destroy', $order->id) }}" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn xóa đơn hàng này?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger mt-2">Xóa</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div> --}}
    {{-- <div class="page-body">
            <div class="container-fluid">
                <div class="title-header">
                    <h5>Danh Sách Đơn Hàng</h5>
                </div>
                @if ($orders->isEmpty())
                    <div class="alert alert-info text-center">
                        Không có đơn hàng nào.
                    </div>
                @else
                    @php
                        $orderStatuses = [
                            'pending' => 'Chờ xác nhận',
                            'confirmed' => 'Đã xác nhận',
                            'shipping' => 'Đang giao hàng',
                            'delivered' => 'Đã giao thành công',
                            'canceled' => 'Đã hủy',
                        ];
                    @endphp
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <div>
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-1d all-package">
                                            <thead>
                                                <tr>
                                                    <th>ID Đơn Hàng</th>
                                                    <th>Khách Hàng</th>
                                                    <th>Địa Chỉ</th>
                                                    <th>Số Điện Thoại</th>
                                                    <th>Tổng Tiền</th>
                                                    <th>Trạng Thái</th>
                                                    <th>Hành Động</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                @foreach ($orders as $order)
                                                    <tr>
                                                        <!-- ID Đơn Hàng -->
                                                        <td>{{ $order->id }}</td>

                                                        <!-- Khách Hàng -->
                                                        <td>{{ $order->user->name ?? 'Khách vãng lai' }}</td>

                                                        <!-- Địa Chỉ -->
                                                        <td>{{ $order->address }}</td>

                                                        <!-- Số Điện Thoại -->
                                                        <td>{{ $order->phone }}</td>

                                                        <!-- Tổng Tiền -->
                                                        <td>{{ number_format($order->total_price, 0, ',', '.') }} VND</td>

                                                        <!-- Trạng Thái -->
                                                        <td>
                                                            <form action="{{ route('orders.updateStatus', $order->id) }}"
                                                                method="POST" style="display:inline;">
                                                                @csrf
                                                                @method('PUT')
                                                                <select name="status" class="form-control d-inline"
                                                                    onchange="this.form.submit()">
                                                                    @foreach ($orderStatuses as $key => $label)
                                                                        <option value="{{ $key }}"
                                                                            {{ $order->status == $key ? 'selected' : '' }}>
                                                                            {{ $label }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </form>
                                                        </td>

                                                        <!-- Hành Động -->
                                                        <td>
                                                            <ul class="action-list">
                                                                <li>
                                                                    <a href="{{ route('user.orders.show', $order->id) }}"
                                                                        title="Xem chi tiết">
                                                                        <span class="lnr lnr-eye"></span>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <form
                                                                        action="{{ route('orders.destroy', $order->id) }}"
                                                                        method="POST"
                                                                        onsubmit="return confirm('Bạn có chắc chắn muốn xóa đơn hàng này?');">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit" class="btn btn-danger btn-sm"
                                                                            title="Xóa">
                                                                            <span class="lnr lnr-trash"></span>
                                                                        </button>
                                                                    </form>
                                                                </li>
                                                            </ul>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <!-- Pagination -->
                            <div class="pagination-box">
                                <nav class="ms-auto me-auto" aria-label="Pagination">

                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div> --}}
    <div class="page-body">
        <div class="container-fluid">
            <div class="title-header">
                <h5>Danh Sách Đơn Hàng</h5>
            </div>

            @if ($orders->isEmpty())
                <div class="alert alert-info text-center">
                    Không có đơn hàng nào.
                </div>
            @else
                @php
                    $orderStatuses = [
                        'pending' => 'Chờ xác nhận',
                        'confirmed' => 'Đã xác nhận',
                        'shipping' => 'Đang giao hàng',
                        'delivered' => 'Đã giao thành công',
                        'canceled' => 'Đã hủy',
                    ];
                @endphp

                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-1d all-package">
                                        <thead>
                                            <tr>
                                                <th>ID Đơn Hàng</th>
                                                <th>Khách Hàng</th>
                                                <th>Địa Chỉ</th>
                                                <th>Số Điện Thoại</th>
                                                <th>Tổng Tiền</th>
                                                <th>Trạng Thái</th>
                                                <th>Hành Động</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($orders as $order)
                                                <tr>
                                                    <!-- ID Đơn Hàng -->
                                                    <td>{{ $order->id }}</td>

                                                    <!-- Khách Hàng -->
                                                    <td>{{ $order->user->name ?? 'Khách vãng lai' }}</td>

                                                    <!-- Địa Chỉ -->
                                                    <td>{{ $order->address }}</td>

                                                    <!-- Số Điện Thoại -->
                                                    <td>{{ $order->phone }}</td>

                                                    <!-- Tổng Tiền -->
                                                    <td>{{ number_format($order->total_price, 0, ',', '.') }} VND</td>

                                                    <!-- Trạng Thái -->
                                                    <td>
                                                        <form action="{{ route('orders.updateStatus', $order->id) }}"
                                                            method="POST" style="display:inline;">
                                                            @csrf
                                                            @method('PUT')
                                                            <select name="status" class="form-control d-inline"
                                                                onchange="this.form.submit()">
                                                                @foreach ($orderStatuses as $key => $label)
                                                                    <option value="{{ $key }}"
                                                                        {{ $order->status == $key ? 'selected' : '' }}>
                                                                        {{ $label }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </form>
                                                    </td>

                                                    <!-- Hành Động -->
                                                    <td>
                                                        <ul class="action-list">
                                                            <li>
                                                                <a href="{{ route('user.orders.show', $order->id) }}"
                                                                    title="Xem chi tiết">
                                                                    <span class="lnr lnr-eye"></span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <form action="{{ route('orders.destroy', $order->id) }}"
                                                                    method="POST"
                                                                    onsubmit="return confirm('Bạn có chắc chắn muốn xóa đơn hàng này?');">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                                        title="Xóa">
                                                                        <span class="lnr lnr-trash"></span>
                                                                    </button>
                                                                </form>
                                                            </li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <!-- Pagination -->
                        <div class="pagination-box">
                            <nav class="ms-auto me-auto" aria-label="Pagination">

                            </nav>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <!-- Include Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>
@endsection

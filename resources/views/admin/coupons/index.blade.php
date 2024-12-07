@extends('admin.layouts.app')

@section('content')
    <h1>Danh sách mã giảm giá</h1>

    <a href="{{ route('admin.coupons.create') }}" class="btn-create">Tạo mã giảm giá mới</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="coupons-container">
        @foreach($coupons as $coupon)
            <div class="coupon-card">
                <div class="coupon-item">
                    <strong>Mã giảm giá:</strong>
                    <p>{{ $coupon->code }}</p>
                </div>
                <div class="coupon-item">
                    <strong>Ngày bắt đầu:</strong>
                    <p>{{ $coupon->start_date }}</p>
                </div>
                <div class="coupon-item">
                    <strong>Ngày kết thúc:</strong>
                    <p>{{ $coupon->end_date }}</p>
                </div>
                <div class="coupon-item">
                    <strong>Giảm giá:</strong>
                    <p>{{ $coupon->discount_value }} VND</p>
                </div>
                <div class="coupon-actions">
                    <a href="{{ route('admin.coupons.edit', $coupon->id) }}" class="btn-edit">Chỉnh sửa</a>
                    <form action="{{ route('admin.coupons.destroy', $coupon->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-delete" onclick="return confirm('Bạn có chắc chắn muốn xóa mã này?')">Xóa</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
@endsection
<style>
    /* Tổng thể giao diện */
body {
    font-family: Arial, sans-serif;
    background-color: #f9f9f9;
    margin: 0;
    padding: 0;
    margin-left: 100px;
}

/* Container chứa các ô mã giảm giá */
.coupons-container {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    justify-content: space-between;
    margin-top: 20px;
}

/* Mỗi ô mã giảm giá */
.coupon-card {
    background-color: white;
    border-radius: 10px;
    padding: 20px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    width: calc(33.33% - 20px); /* 3 cột, mỗi ô có chiều rộng 1/3 */
    box-sizing: border-box;
    margin-bottom: 20px;
}

/* Mỗi item trong ô */
.coupon-item {
    margin-bottom: 15px;
}

.coupon-item strong {
    font-weight: bold;
    color: #333;
}

.coupon-item p {
    margin: 5px 0;
}

/* Nút tạo mã giảm giá */
.btn-create {
    display: inline-block;
    padding: 10px 15px;
    background-color: #007bff;
    color: white;
    text-decoration: none;
    border-radius: 5px;
    margin-bottom: 20px;
}

.btn-create:hover {
    background-color: #0056b3;
}

/* Nút chỉnh sửa và xóa */
.coupon-actions {
    margin-top: 10px;
}

.coupon-actions a,
.coupon-actions button {
    padding: 8px 15px;
    background-color: #007bff;
    color: white;
    border: none;
    border-radius: 5px;
    text-decoration: none;
    cursor: pointer;
    margin-right: 10px;
}

.coupon-actions a:hover,
.coupon-actions button:hover {
    background-color: #0056b3;
}

.btn-delete {
    background-color: #dc3545;
}

.btn-delete:hover {
    background-color: #c82333;
}

/* Đảm bảo ô không quá nhỏ trên các màn hình nhỏ */
@media (max-width: 768px) {
    .coupon-card {
        width: 100%;
    }
}

    </style>
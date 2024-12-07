@extends('admin.layouts.app')

@section('content')
    <h1>Chỉnh sửa mã giảm giá</h1>

    <form action="{{ route('admin.coupons.update', $coupon->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="code">Mã giảm giá</label>
            <input type="text" id="code" name="code" value="{{ old('code', $coupon->code) }}" required>
        </div>
        <div class="form-group">
            <label for="start_date">Ngày bắt đầu</label>
            <input type="date" id="start_date" name="start_date" value="{{ old('start_date', $coupon->start_date) }}" required>
        </div>
        <div class="form-group">
            <label for="end_date">Ngày kết thúc</label>
            <input type="date" id="end_date" name="end_date" value="{{ old('end_date', $coupon->end_date) }}" required>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Cập nhật mã giảm giá</button>
        </div>
    </form>
@endsection
<style>
    /* Đảm bảo form có khoảng cách hợp lý */
form {
    max-width: 600px;
    margin: 120px auto;
    padding: 20px;
    background-color: #f9f9f9;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

/* Định dạng cho các phần tử input */
form .form-group {
    margin-bottom: 20px;
}

/* Label cho các trường nhập liệu */
form .form-group label {
    font-size: 16px;
    color: #333;
    margin-bottom: 8px;
    display: block;
}

/* Input */
form .form-group input[type="text"],
form .form-group input[type="date"] {
    width: 100%;
    padding: 10px;
    font-size: 14px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    transition: border 0.3s ease;
}

/* Thêm hiệu ứng border khi focus */
form .form-group input[type="text"]:focus,
form .form-group input[type="date"]:focus {
    border-color: #4CAF50;
    outline: none;
}

/* Nút submit */
form .form-group button {
    width: 100%;
    padding: 12px;
    background-color: #4CAF50;
    color: white;
    font-size: 16px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

/* Thêm hiệu ứng hover cho nút */
form .form-group button:hover {
    background-color: #45a049;
}

    </style>
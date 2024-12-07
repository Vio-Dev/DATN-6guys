@extends('admin.layouts.app')

@section('content')
    <h1>Tạo mã giảm giá mới</h1>

    <form action="{{ route('admin.coupons.store') }}" method="POST">
        @csrf
        <div>
            <label for="code">Mã giảm giá</label>
            <input type="text" id="code" name="code" required>
        </div>
        <div>
            <label for="start_date">Ngày bắt đầu</label>
            <input type="date" id="start_date" name="start_date" required>
        </div>
        <div>
            <label for="end_date">Ngày kết thúc</label>
            <input type="date" id="end_date" name="end_date" required>
        </div>
        <div>
            <label for="usage_limit">Số lần sử dụng</label>
            <input type="number" id="usage_limit" name="usage_limit" required>
        </div>
        <div>
            <label for="minimum_order_value">Giá trị đơn hàng tối thiểu</label>
            <input type="number" id="minimum_order_value" name="minimum_order_value" required>
        </div>
        <div>
            <label for="discount_value">Giảm giá (VND)</label>
            <input type="number" id="discount_value" name="discount_value" required>
        </div>
        <button type="submit">Tạo mã giảm giá</button>
    </form>
@endsection
<style>
 /* Container */
/* Form container */
form {
    background-color: #fff;
    margin: 100px auto;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    max-width: 500px; /* Đặt chiều rộng tối đa cho form */
    
    box-sizing: border-box;
    overflow: hidden; /* Đảm bảo không có phần tử nào tràn ra ngoài */
}

/* Form title */
form h1 {
    text-align: center;
    color: #333;
    margin-bottom: 20px;
}

/* Container for individual input fields */
form div {
    display: flex;
    flex-direction: column;
    gap: 10px; /* Giảm khoảng cách giữa các trường */
}

/* Form label */
form label {
    font-size: 14px;
    font-weight: bold;
    color: #555;
    display: block;
}

/* Form input fields */
form input[type="text"],
form input[type="date"],
form input[type="number"] {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 14px;
    box-sizing: border-box;
    
    /* Tăng padding cho input */
}

/* Focus effect for inputs */
form input[type="text"]:focus,
form input[type="date"]:focus,
form input[type="number"]:focus {
    border-color: #4CAF50;
    outline: none;
}

/* Submit button */
form button[type="submit"] {
    width: 100%; /* Giữ chiều rộng 100% cho nút */
    padding: 12px; /* Thêm padding cho nút */
    background-color: #4CAF50;
    color: #fff;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

/* Hover effect for submit button */
form button[type="submit"]:hover {
    background-color: #45a049;
}

/* Giới hạn chiều rộng của form nếu cần */
@media (max-width: 600px) {
    form {
        max-width: 90%; /* Đảm bảo form vẫn đẹp trên các màn hình nhỏ */
    }
}


    </style>
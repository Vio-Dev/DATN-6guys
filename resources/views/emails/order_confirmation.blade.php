<!DOCTYPE html>
<html>
<head>
    <title>Xác nhận đặt hàng</title>
</head>
<body>
    <h2>Xin chào {{ $order->name }},</h2>
    <p>Cảm ơn bạn đã đặt hàng tại cửa hàng của chúng tôi!</p>
    <p>Thông tin đơn hàng của bạn:</p>
    <ul>
        <li>Mã đơn hàng: {{ $order->id }}</li>
        <li>Họ tên: {{ $order->name }}</li>
        <li>Email: {{ $order->email }}</li>
        <li>Địa chỉ: {{ $order->address }}</li>
        <li>Số điện thoại: {{ $order->phone }}</li>
        <li>Tổng giá trị: {{ number_format($order->total_price, 0, ',', '.') }} VNĐ</li>
    </ul>
    <p>Chúng tôi sẽ xử lý đơn hàng và giao hàng đến bạn trong thời gian sớm nhất.</p>
    <p>Trân trọng,</p>
    <p>Đội ngũ hỗ trợ.</p>
</body>
</html>

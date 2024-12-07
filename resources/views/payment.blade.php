<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thanh toán VNPay</title>
</head>
<body>
    <h1>Thanh toán qua VNPay</h1>
    <form action="{{ route('vnpay.payment') }}" method="get">
        <button type="submit">Thanh toán ngay</button>
    </form>
</body>
</html>

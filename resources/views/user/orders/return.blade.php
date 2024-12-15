@extends('layout')
@section('content')
<div class="container">
    <h3>Đổi trả đơn hàng #{{ $order->id }}</h3>

    <form action="{{ route('user.orders.processReturn', $order->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="reason">Lý do đổi trả</label>
            <textarea id="reason" name="reason" class="form-control" rows="4" required></textarea>
        </div>

        <div class="form-group">
            <label for="image">Tải lên hình ảnh thực tế của đơn hàng</label>
            <input type="file" id="image" name="image" class="form-control" accept="image/*">
        </div>

        <button type="submit" class="btn btn-warning mt-3">Gửi yêu cầu đổi trả</button>
    </form>
</div>
@endsection

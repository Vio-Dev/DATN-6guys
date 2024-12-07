<!-- resources/views/user/products/showall.blade.php -->
@extends('layout')

@section('content')
<div class="container">
    <h1>Tất cả sản phẩm</h1>
    
    <!-- Hiển thị các sản phẩm -->
    <div class="row">
        <h1>Danh sách sản phẩm</h1>
    
        @foreach($products as $product)
            <div class="product-item">
                <img src="{{ asset('storage/' . json_decode($product->image)[0]) }}" alt="{{ $product->name }}" style="width: 150px; height: 150px;">
                <h3>{{ $product->name }}</h3>
                <p>{{ $product->content }}</p>
                <p>{{ number_format($product->price, 0, ',', '.') }} VND</p>
                <a href="{{ route('product.show', $product->id) }}" class="btn btn-primary">Xem chi tiết</a>
            </div>
        @endforeach
    </div>
</div>
@endsection

@extends('admin.layouts.app')

@section('content')
{{-- <div class="page-body">
    <div class="container-fluid">
        <div class="container">
            <h2>Quản lý kho hàng</h2>
            <table class="table table-bordered" style="margin-left: auto; margin-right: 0;">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Ảnh</th>
                        <th>Tên sản phẩm</th>
                        <th>Số lượng còn</th>
                        <th>Giá</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>
                                @php
                                    $images = json_decode($product->image, true);
                                @endphp
                                @if ($images && count($images) > 0)
                                    <img src="{{ asset('storage/' . $images[0]) }}" alt="{{ $product->name }}"
                                        style="width: 100px; height: 100px;">
                                @else
                                    <img src="{{ asset('storage/default-image.png') }}" alt="No image available"
                                        style="width: 100px; height: 100px;">
                                @endif
                            </td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->quantity }}</td>
                            <td>{{ number_format($product->price, 0, ',', '.') }} VND</td>
                            <td>
                                <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-primary">Chỉnh
                                    sửa</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $products->links() }}
        </div>
    </div>
</div> --}}
<div class="page-body">
    <div class="container-fluid">
        <div class="container">
            <h2>Quản lý kho hàng</h2>

            <!-- Table with Bootstrap styling -->
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Ảnh</th>
                            <th>Tên sản phẩm</th>
                            <th>Số lượng còn</th>
                            <th>Giá</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>
                                    @php
                                        $images = json_decode($product->image, true);
                                    @endphp
                                    @if ($images && count($images) > 0)
                                        <img src="{{ asset('storage/' . $images[0]) }}" alt="{{ $product->name }}"
                                            class="img-thumbnail" style="width: 100px; height: 100px;">
                                    @else
                                        <img src="{{ asset('storage/default-image.png') }}" alt="No image available"
                                            class="img-thumbnail" style="width: 100px; height: 100px;">
                                    @endif
                                </td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->quantity }}</td>
                                <td>{{ number_format($product->price, 0, ',', '.') }} VND</td>
                                <td>
                                    <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-primary btn-sm">Chỉnh sửa</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Pagination Links -->
            <div class="d-flex justify-content-center">
                {{ $products->links() }}
            </div>
        </div>
    </div>
</div>

    <style>
        .table-bordered {
            padding-left: 500px;
        }
    </style>
@endsection

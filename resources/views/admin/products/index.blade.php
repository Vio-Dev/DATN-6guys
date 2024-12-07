@extends('admin.layouts.app')
@section('content')
    <div class="page-body">
        <div class="title-header">
            <h5>Danh Sách Sản Phẩm</h5>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div>
                                <div class="table-responsive table-desi table-product">
                                    <table class="table table-1d all-package">
                                        <thead>
                                            <tr>
                                                <th>Ảnh Sản Phẩm</th>
                                                <th>Tên Sản Phẩm</th>
                                                <th>Giá</th>
                                                <th>Hành Động</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($product as $item)
                                                <tr>
                                                    
                                                    <td>
                                                        @if ($item->image)
                                                            @php
                                                                $images = json_decode($item->image); // Giải mã chuỗi JSON
                                                            @endphp
                                                            @if (is_array($images) && count($images) > 0) 
                                                                {{-- Hiển thị ảnh đầu tiên trong mảng --}}
                                                                <img src="{{ asset('storage/' . $images[0]) }}" class="img-fluid" alt="Product Image" style="max-width: 100px; margin: 5px;">
                                                            @else
                                                                <p>Invalid image data</p>
                                                            @endif
                                                        @else
                                                            <p>No image available</p>
                                                        @endif
                                                    </td>

                                                    <td>
                                                        {{ $item->name }}
                                                    </td>

                                                    <td class="td-price">@if ($item->sale_percentage)
                                                        <span class="old-price" style="text-decoration: line-through;">{{ $item->price }}<small>/</small></span>
                                                        <span class="new-price" style="color:red;">{{ $item->price - ($item->price * ($item->sale_percentage / 100)) }}<small> VND</small></span>
                                                    @else
                                                        <span>{{ $item->price }}<small> VND</small></span>
                                                    @endif</td>

                                                    <td>
                                                        <ul>
                                                            <li>
                                                                <a href="{{ route('admin.products.edit', $item->id) }}">
                                                                    <span class="lnr lnr-pencil"></span>
                                                                </a>
                                                            </li>

                                                            <li>
                                                                <form action="{{ route('admin.products.destroy', $item->id) }}" method="post">
                                                                    @csrf
                                                                    @method('delete')
                                                                    <input type="submit" value="Xóa">
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

                        <div class="pagination-box">
                            <nav class="ms-auto me-auto" aria-label="...">
                                <ul class="pagination pagination-primary">
                                    <li class="page-item disabled">
                                        <a class="page-link" href="javascript:void(0)" tabindex="-1">Previous</a>
                                    </li>

                                    <li class="page-item active">
                                        <a class="page-link" href="javascript:void(0)">1</a>
                                    </li>

                                    <li class="page-item">
                                        <a class="page-link" href="javascript:void(0)">2 <span class="sr-only">(current)</span></a>
                                    </li>

                                    <li class="page-item">
                                        <a class="page-link" href="javascript:void(0)">3</a>
                                    </li>

                                    <li class="page-item">
                                        <a class="page-link" href="javascript:void(0)">Next</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->

        <div class="container-fluid">
            <!-- footer start-->
            <footer class="footer">
                <div class="row">
                    <div class="col-md-12 footer-copyright text-center">
                        <p class="mb-0">Copyright 2021 © Voxo theme by pixelstrap</p>
                    </div>
                </div>
            </footer>
        </div>
    </div>
@endsection

@extends('admin.layouts.app')
@section('content')
<div class="page-body">
        <div class="title-header">
            <h5>Chỉnh Sửa Sản Phẩm</h5>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        
                        <form action="{{ route('admin.products.update', $product->id) }}" method="POST"
                              class="theme-form theme-form-2 mega-form" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="mb-4 row align-items-center">
                                <label class="form-label-title col-sm-2 mb-0">Tên Sản Phẩm</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="name" value="{{ $product->name }}">
                                </div>
                            </div>

                            <div class="mb-4 row align-items-center">
                                <label class="col-sm-2 col-form-label form-label-title">Giá</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="price" value="{{ $product->price }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="quantity">Số Lượng</label>
                                
                                <input class="form-control" type="number" name="quantity" value="{{ $product->quantity }}" required>
                            </div>
                            <div class="form-group">
                                <label for="sale">Đang Sale:</label>
                                <input type="checkbox" name="sale" id="sale" {{ $product->sale ? 'checked' : '' }}>
                            </div>
                                <div class="mb-4 row align-items-center">
                                    <label class="col-sm-2 col-form-label form-label-title">Tỷ Lệ Giảm (%)</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="number" name="sale_percentage" value="{{ $product->sale_percentage }}" step="0.01">
                                    </div>
                                </div>
                            <div class="mb-4 row align-items-center">
                                <label class="col-sm-2 col-form-label form-label-title">Danh Mục</label>
                                <div class="col-sm-10">
                                    <select class="js-example-basic-single w-100" name="category_id">
                                        <option disabled>Category Menu</option>
                                        @foreach ($category as $item)
                                            <option value="{{ $item->id }}" {{ $item->id == $product->category_id ? 'selected' : '' }}>
                                                {{ $item->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-body">
                                    <div class="card-header-2">
                                        <h5>Mô Tả</h5>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <label class="form-label-title col-sm-2 mb-0">Mô Tả Sản Phẩm</label>
                                            <div class="col-sm-10">
                                                <textarea class="form-control" name="content" rows="5">{{ $product->content }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-body">
                                    <div class="card-header-2">
                                        <h5>Ảnh Sản Phẩm</h5>
                                    </div>
                                    <div class="mb-4 row align-items-center">
                                        <label class="col-sm-2 col-form-label form-label-title">Ảnh</label>
                                        <div class="col-sm-10">
                                            <input class="form-control form-choose" type="file" name="image[]" id="formFileMultiple" multiple>
                                        </div>
                                    </div>
                                    <input type="submit" value="Cập Nhật" class="btn btn-primary">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <footer class="footer">
            <div class="row">
                <div class="col-md-12 footer-copyright text-center">
                    <p class="mb-0">Copyright 2021 © Voxo theme by pixelstrap</p>
                </div>
            </div>
        </footer>
    </div>
@endsection

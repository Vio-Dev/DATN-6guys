@extends('admin.layouts.app')
@section('content')

<div class="page-body">
    <div class="title-header">
        <h5>Thêm Sản Phẩm Mới</h5>
    </div>


    <!-- Thêm Sản Phẩm Mới Bắt Đầu -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <h5>Thông Tin Sản Phẩm</h5>
                        </div>
                        <div class="row">
                            <form action="{{ route('admin.products.store') }}" method="POST" class="theme-form theme-form-2 mega-form" enctype="multipart/form-data">
                                @csrf

                                <div class="mb-4 row align-items-center">
                                    <label class="form-label-title col-sm-2 mb-0">Tên Sản Phẩm</label>
                                    <div class="col-sm-10">
                                        <input type="text" id="name" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror">
                                        @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
                                    </div>
                                </div>

                                <div class="mb-4 row align-items-center">
                                    <label class="col-sm-2 col-form-label form-label-title">Giá</label>
                                    <div class="col-sm-10">
                                        <input class="form-control @error('price') is-invalid @enderror" type="number" name="price" placeholder="Giá" value="{{ old('price') }}" min="0" required>
                                        @error('price')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="mb-4 row align-items-center">
                                        <label class="col-sm-2 col-form-label form-label-title">Đang Sale</label>
                                        <div class="col-sm-10">
                                            <input type="checkbox" name="sale" id="saleCheckbox" class="form-check-input">
                                            <label class="form-check-label" for="saleCheckbox">Chọn nếu sản phẩm đang được giảm giá</label>
                                        </div>
                                    </div>
                                    
                                    <div class="mb-4 row align-items-center" id="salePercentageGroup" style="display: none;">
                                        <label class="col-sm-2 col-form-label form-label-title">Phần Trăm Giảm Giá</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="number" name="sale_percentage" placeholder="Nhập phần trăm giảm giá (VD: 20 cho 20%)" min="1" max="100">
                                        </div>
                                    </div>
                                    
                                    <div class="mb-4 row align-items-center">
                                        <label class="form-label-title col-sm-2 mb-0">Product Description</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" name="content" rows="5" placeholder="Product Description" required></textarea>
                                        </div>

                                    </div>
                                </div>

                                <div class="mb-4 row align-items-center">
                                    <label class="form-label-title col-sm-2 mb-0">Số Lượng</label>
                                    <div class="col-sm-10">
                                        <input class="form-control @error('quantity') is-invalid @enderror" type="number" name="quantity" placeholder="Số Lượng" value="{{ old('quantity') }}" min="1" required>
                                        @error('quantity')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>

                                </div>

                                <div class="mb-4 row align-items-center">
                                    <label class="col-sm-2 col-form-label form-label-title">Danh Mục</label>
                                    <div class="col-sm-10">
                                        <select class="js-example-basic-single w-100 @error('category_id') is-invalid @enderror" name="category_id" required>
                                            <option disabled selected>Chọn Danh Mục</option>
                                            @foreach ($category as $item)
                                                <option value="{{ $item->id }}" {{ old('category_id') == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-body">
                                        <div class="card-header-2">
                                            <h5>Hình Ảnh Sản Phẩm</h5>
                                        </div>
                                        <div class="mb-4 row align-items-center">
                                            <label class="col-sm-2 col-form-label form-label-title">Hình Ảnh</label>
                                            <div class="col-sm-10">
                                                <input class="form-control form-choose @error('image') is-invalid @enderror" type="file" name="image[]" id="formFileMultiple" multiple required>
                                                @error('image')
                                                    <span class="invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="mb-4 row align-items-center">
                                            <label class="col-sm-2 col-form-label form-label-title">Xem Trước</label>
                                            <div class="col-sm-10" id="imagePreview"></div>
                                        </div>
                                    </div>
                                </div>

                                <input type="submit" value="Thêm Sản Phẩm" class="btn btn-primary">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <footer class="footer">
            <div class="row">
                <div class="col-md-12 footer-copyright text-center">
                    <p class="mb-0">6Guys</p>
                </div>
            </div>
        </footer>
    </div>
</div>

@endsection

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const fileInput = document.getElementById('formFileMultiple');
        const previewContainer = document.getElementById('imagePreview');

        fileInput.addEventListener('change', function () {
            // Xóa toàn bộ ảnh đã hiển thị trước đó
            previewContainer.innerHTML = '';

            const files = fileInput.files;

            if (files.length > 0) {
                Array.from(files).forEach(file => {
                    // Kiểm tra xem file có phải là ảnh hay không
                    if (file.type.match('image.*')) {
                        const reader = new FileReader();

                        // Khi đọc file hoàn tất
                        reader.onload = function (event) {
                            // Tạo thẻ <img> để hiển thị ảnh
                            const img = document.createElement('img');
                            img.src = event.target.result;
                            img.style.width = '100px';
                            img.style.marginRight = '10px';
                            img.style.marginBottom = '10px';
                            img.style.border = '1px solid #ddd';
                            img.style.padding = '5px';
                            img.style.borderRadius = '5px';

                            previewContainer.appendChild(img);
                        };

                        // Đọc file dưới dạng DataURL
                        reader.readAsDataURL(file);
                    } else {
                        console.warn(`File không phải là ảnh: ${file.name}`);
                    }
                });
            }
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const saleCheckbox = document.getElementById('saleCheckbox');
        const salePercentageGroup = document.getElementById('salePercentageGroup');

        // Lắng nghe sự kiện thay đổi của checkbox
        saleCheckbox.addEventListener('change', function () {
            if (this.checked) {
                salePercentageGroup.style.display = 'flex';
            } else {
                salePercentageGroup.style.display = 'none';
                // Đặt giá trị sale_percentage về rỗng khi không chọn sale
                document.querySelector('input[name="sale_percentage"]').value = '';
            }
        });
    });
</script>

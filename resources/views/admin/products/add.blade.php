@extends('admin.layouts.app')

@section('content')
    <div class="page-body">
        <div class="title-header">
            <h5>Thêm Sản Phẩm Mới</h5>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <h5 class="card-header">Thông Tin Sản Phẩm</h5>
                        <div class="card-body">
                            <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data"
                                class="theme-form theme-form-2 mega-form">
                                @csrf

                                <!-- Tên Sản Phẩm -->
                                <div class="mb-4 row align-items-center">
                                    <label class="form-label-title col-sm-2">Tên Sản Phẩm</label>
                                    <div class="col-sm-10">
                                        <input class="form-control @error('name') is-invalid @enderror" type="text"
                                            name="name" placeholder="Tên Sản Phẩm" value="{{ old('name') }}" required>
                                        @error('name')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Giá -->
                                <div class="mb-4 row align-items-center">
                                    <label class="form-label-title col-sm-2">Giá</label>
                                    <div class="col-sm-10">
                                        <input class="form-control @error('price') is-invalid @enderror" type="number"
                                            name="price" placeholder="Giá" value="{{ old('price') }}" min="0"
                                            required>
                                        @error('price')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Số Lượng -->
                                <div class="mb-4 row align-items-center">
                                    <label class="form-label-title col-sm-2">Số Lượng</label>
                                    <div class="col-sm-10">
                                        <input class="form-control @error('quantity') is-invalid @enderror" type="number"
                                            name="quantity" placeholder="Số Lượng" value="{{ old('quantity') }}"
                                            min="1" required>
                                        @error('quantity')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Danh Mục -->
                                <div class="mb-4 row align-items-center">
                                    <label class="form-label-title col-sm-2">Danh Mục</label>
                                    <div class="col-sm-10">
                                        <select class="form-control @error('category_id') is-invalid @enderror"
                                            name="category_id" required>
                                            <option disabled selected>Chọn Danh Mục</option>
                                            @foreach ($categories as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ old('category_id') == $item->id ? 'selected' : '' }}>
                                                    {{ $item->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Đang Sale -->
                                <div class="mb-4 row align-items-center">
                                    <label class="form-label-title col-sm-2">Đang Sale</label>
                                    <div class="col-sm-10">
                                        <input type="checkbox" name="sale" id="saleCheckbox" class="form-check-input">
                                        <label class="form-check-label" for="saleCheckbox">Sản phẩm đang giảm giá</label>
                                    </div>
                                </div>

                                <!-- Phần Trăm Giảm Giá -->
                                <div class="mb-4 row align-items-center" id="salePercentageGroup" style="display: none;">
                                    <label class="form-label-title col-sm-2">Phần Trăm Giảm Giá</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="number" name="sale_percentage"
                                            placeholder="Nhập phần trăm giảm giá" min="1" max="100">
                                    </div>
                                </div>

                                <!-- Mô Tả -->
                                <div class="mb-4 row align-items-center">
                                    <label class="form-label-title col-sm-2">Mô Tả</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control @error('content') is-invalid @enderror" name="content" rows="5"
                                            placeholder="Mô tả sản phẩm">{{ old('content') }}</textarea>
                                        @error('content')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Hình Ảnh -->
                                <div class="mb-4 row align-items-center">
                                    <label class="form-label-title col-sm-2">Hình Ảnh</label>
                                    <div class="col-sm-10">
                                        <input class="form-control @error('image') is-invalid @enderror" type="file"
                                            name="image[]" id="formFileMultiple" multiple required>
                                        @error('image')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Preview Hình Ảnh -->
                                <div class="mb-4 row">
                                    <label class="form-label-title col-sm-2">Xem Trước</label>
                                    <div class="col-sm-10" id="imagePreview"></div>
                                </div>

                                <!-- Submit -->
                                <div class="mb-4 row align-items-center">
                                    <div class="col-sm-10 offset-sm-2">
                                        <input type="submit" value="Thêm Sản Phẩm" class="btn btn-primary">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <div class="container-fluid">
        <footer class="footer text-center">
            <p class="mb-0">6Guys</p>
        </footer>
    </div>
@endsection

@push('scripts')
    <script>
        // Sale Checkbox Logic
        document.getElementById('saleCheckbox').addEventListener('change', function() {
            document.getElementById('salePercentageGroup').style.display = this.checked ? 'flex' : 'none';
            if (!this.checked) document.querySelector('input[name="sale_percentage"]').value = '';
        });

        // Image Preview Logic
        document.getElementById('formFileMultiple').addEventListener('change', function() {
            const preview = document.getElementById('imagePreview');
            preview.innerHTML = '';

            Array.from(this.files).forEach(file => {
                if (file.type.match('image.*')) {
                    const reader = new FileReader();
                    reader.onload = e => {
                        const img = document.createElement('img');
                        img.src = e.target.result;
                        img.style.width = '100px';
                        img.style.margin = '10px';
                        img.style.border = '1px solid #ddd';
                        preview.appendChild(img);
                    };
                    reader.readAsDataURL(file);
                }
            });
        });
    </script>
@endpush

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
                                <form action="{{ route('admin.products.store') }}" method="POST"
                                    class="theme-form theme-form-2 mega-form" enctype="multipart/form-data">
                                    @csrf

                                    <div class="mb-4 row align-items-center">
                                        <label class="form-label-title col-sm-2 mb-0">Tên Sản Phẩm</label>
                                        <div class="col-sm-10">
                                            <input class="form-control @error('name') is-invalid @enderror" type="text"
                                                name="name" placeholder="Tên Sản Phẩm" value="{{ old('name') }}"
                                                required>
                                            @error('name')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="mb-4 row align-items-center">
                                        <label class="col-sm-2 col-form-label form-label-title">Giá</label>
                                        <div class="col-sm-10">
                                            <input class="form-control @error('price') is-invalid @enderror" type="number"
                                                name="price" placeholder="Giá" value="{{ old('price') }}" min="0"
                                                required>
                                            @error('price')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="mb-4 row align-items-center">
                                            <label class="col-sm-2 col-form-label form-label-title">Đang Sale</label>
                                            <div class="col-sm-10">
                                                <input type="checkbox" name="sale" id="saleCheckbox"
                                                    class="form-check-input">
                                                <label class="form-check-label" for="saleCheckbox">Chọn nếu sản phẩm đang
                                                    được giảm giá</label>
                                            </div>
                                        </div>

                                        <div class="mb-4 row align-items-center" id="salePercentageGroup"
                                            style="display: none;">
                                            <label class="col-sm-2 col-form-label form-label-title">Phần Trăm Giảm
                                                Giá</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="number" name="sale_percentage"
                                                    placeholder="Nhập phần trăm giảm giá (VD: 20 cho 20%)" min="1"
                                                    max="100">
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
                                            <input class="form-control @error('quantity') is-invalid @enderror"
                                                type="number" name="quantity" placeholder="Số Lượng"
                                                value="{{ old('quantity') }}" min="1" required>
                                            @error('quantity')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>

                                    </div>

                                    <div class="mb-4 row align-items-center">
                                        <label class="col-sm-2 col-form-label form-label-title">Danh Mục</label>
                                        <div class="col-sm-10">
                                            <select
                                                class="js-example-basic-single w-100 @error('category_id') is-invalid @enderror"
                                                name="category_id" required>
                                                <option disabled selected>Chọn Danh Mục</option>
                                                @foreach ($category as $item)
                                                    <option value="{{ $item->id }}"
                                                        {{ old('category_id') == $item->id ? 'selected' : '' }}>
                                                        {{ $item->name }}</option>
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
                                                    <input
                                                        class="form-control form-choose @error('image') is-invalid @enderror"
                                                        type="file" name="image[]" id="formFileMultiple" multiple
                                                        required>
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

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    function previewImages() {
        var preview = document.getElementById('imagePreview');
        preview.innerHTML = "";
        var files = document.getElementById('formFileMultiple').files;

        for (var i = 0; i < files.length; i++) {
            var file = files[i];

            if (file.type.match('image.*')) {
                var reader = new FileReader();

                reader.onload = (function(file) {
                    return function(e) {
                        var img = document.createElement('img');
                        img.src = e.target.result;
                        img.style.width = '100px';
                        img.style.marginRight = '10px';
                        img.style.marginBottom = '10px';
                        preview.appendChild(img);
                    };
                })(file);

                reader.readAsDataURL(file);
            }
        }
    }
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const saleCheckbox = document.getElementById('saleCheckbox');
        const salePercentageGroup = document.getElementById('salePercentageGroup');

        // Lắng nghe sự kiện thay đổi của checkbox
        saleCheckbox.addEventListener('change', function() {
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

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.querySelector('form');
        const saleCheckbox = document.getElementById('saleCheckbox');
        const salePercentageGroup = document.getElementById('salePercentageGroup');

        // Validate form trước khi submit
        form.addEventListener('submit', async function(e) {
            e.preventDefault(); // Ngăn form submit mặc định
            let isValid = true;
            let errorMessages = [];

            // Validate tên sản phẩm
            const name = form.querySelector('input[name="name"]');
            if (!name.value.trim()) {
                errorMessages.push('- Vui lòng nhập tên sản phẩm');
                isValid = false;
            } else if (name.value.length > 100) {
                errorMessages.push('- Tên sản phẩm không được vượt quá 100 ký tự');
                isValid = false;
            }

            // Validate giá
            const price = form.querySelector('input[name="price"]');
            if (!price.value) {
                errorMessages.push('- Vui lòng nhập giá sản phẩm');
                isValid = false;
            } else if (price.value <= 0) {
                errorMessages.push('- Giá sản phẩm phải lớn hơn 0');
                isValid = false;
            }

            // Validate số lượng
            const quantity = form.querySelector('input[name="quantity"]');
            if (!quantity.value) {
                errorMessages.push('- Vui lòng nhập số lượng');
                isValid = false;
            } else if (quantity.value < 1) {
                errorMessages.push('- Số lượng phải lớn hơn 0');
                isValid = false;
            }

            // Validate mô tả
            const content = form.querySelector('textarea[name="content"]');
            if (!content.value.trim()) {
                errorMessages.push('- Vui lòng nhập mô tả sản phẩm');
                isValid = false;
            }

            // Validate danh mục
            const category = form.querySelector('select[name="category_id"]');
            if (!category.value || category.value === "Chọn Danh Mục") {
                errorMessages.push('- Vui lòng chọn danh mục');
                isValid = false;
            }

            // Validate hình ảnh
            const images = form.querySelector('input[name="image[]"]');
            if (images.files.length === 0) {
                errorMessages.push('- Vui lòng chọn ít nhất một hình ảnh');
                isValid = false;
            } else {
                for (let i = 0; i < images.files.length; i++) {
                    const file = images.files[i];
                    const validTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/gif'];
                    const maxSize = 2 * 1024 * 1024; // 2MB

                    if (!validTypes.includes(file.type)) {
                        errorMessages.push(
                            '- Chỉ chấp nhận file ảnh có định dạng: JPEG, PNG, JPG, GIF');
                        isValid = false;
                        break;
                    }

                    if (file.size > maxSize) {
                        errorMessages.push('- Kích thước file không được vượt quá 2MB');
                        isValid = false;
                        break;
                    }
                }
            }

            // Validate sale percentage nếu checkbox được chọn
            if (saleCheckbox.checked) {
                const salePercentage = form.querySelector('input[name="sale_percentage"]');
                if (!salePercentage.value) {
                    errorMessages.push('- Vui lòng nhập phần trăm giảm giá');
                    isValid = false;
                } else if (salePercentage.value < 1 || salePercentage.value > 100) {
                    errorMessages.push('- Phần trăm giảm giá phải từ 1 đến 100');
                    isValid = false;
                }
            }

            if (!isValid) {
                // Hiển thị thông báo lỗi với SweetAlert2
                Swal.fire({
                    title: 'Lỗi!',
                    html: errorMessages.join('<br>'),
                    icon: 'error',
                    confirmButtonText: 'Đóng'
                });
            } else {
                // Nếu không có lỗi, submit form
                form.submit();
            }
        });

        // Xử lý preview ảnh
        const formFileMultiple = document.getElementById('formFileMultiple');
        formFileMultiple.addEventListener('change', previewImages);

        // Xử lý checkbox sale
        saleCheckbox.addEventListener('change', function() {
            if (this.checked) {
                salePercentageGroup.style.display = 'flex';
            } else {
                salePercentageGroup.style.display = 'none';
                document.querySelector('input[name="sale_percentage"]').value = '';
            }
        });
    });

    // Hàm preview ảnh (giữ nguyên như cũ)
    function previewImages() {
        var preview = document.getElementById('imagePreview');
        preview.innerHTML = "";
        var files = document.getElementById('formFileMultiple').files;

        for (var i = 0; i < files.length; i++) {
            var file = files[i];
            if (file.type.match('image.*')) {
                var reader = new FileReader();
                reader.onload = (function(file) {
                    return function(e) {
                        var img = document.createElement('img');
                        img.src = e.target.result;
                        img.style.width = '100px';
                        img.style.marginRight = '10px';
                        img.style.marginBottom = '10px';
                        preview.appendChild(img);
                    };
                })(file);
                reader.readAsDataURL(file);
            }
        }
    }
</script>

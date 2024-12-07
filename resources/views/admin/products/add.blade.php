@extends('admin.layouts.app')
@section('content')
    <div class="page-body">
        <div class="title-header">
            <h5>Add New Product</h5>
        </div>

        <!-- New Product Add Start -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <h5>Product Information</h5>
                            </div>
                            <div class="row">
                                <form action="{{ route('admin.products.store') }}" method="POST" class="theme-form theme-form-2 mega-form" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-4 row align-items-center">
                                        <label class="form-label-title col-sm-2 mb-0">Product Name</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" name="name" placeholder="Product Name" required>
                                        </div>
                                    </div>
                                
                                    <div class="mb-4 row align-items-center">
                                        <label class="col-sm-2 col-form-label form-label-title">Price</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="number" name="price" placeholder="Price" min="0" required>
                                        </div>
                                    </div>
                                
                                    <div class="mb-4 row align-items-center">
                                        <label class="form-label-title col-sm-2 mb-0">Product Description</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" name="content" rows="5" placeholder="Product Description" required></textarea>
                                        </div>
                                    </div>
                                
                                    <div class="mb-4 row align-items-center">
                                        <label class="form-label-title col-sm-2 mb-0">Quantity</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="number" name="quantity" placeholder="Quantity" min="1" required>
                                        </div>
                                    </div>
                                
                                    <div class="mb-4 row align-items-center">
                                        <label class="col-sm-2 col-form-label form-label-title">Category</label>
                                        <div class="col-sm-10">
                                            <select class="js-example-basic-single w-100" name="category_id" required>
                                                <option disabled selected>Category Menu</option>
                                                @foreach ($category as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="card-header-2">
                                                <h5>Product Images</h5>
                                            </div>
                                
                                            <div class="row">
                                                <div class="mb-4 row align-items-center">
                                                    <label class="col-sm-2 col-form-label form-label-title">Images</label>
                                                    <div class="col-sm-10">
                                                        <input class="form-control form-choose" type="file" name="image[]" id="formFileMultiple" multiple required onchange="previewImages()">
                                                    </div>
                                                </div>
                                                <div class="mb-4 row align-items-center">
                                                    <label class="col-sm-2 col-form-label form-label-title">Preview</label>
                                                    <div class="col-sm-10" id="imagePreview"></div>
                                                </div>
                                            </div>
                                
                                            <input type="submit" value="Add Product" class="btn btn-primary">
                                        </form>
                                    </div>
                                </div>
                                
                               
    
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
                        <p class="mb-0">Copyright 2021 © Voxo theme by pixelstrap</p>
                    </div>
                </div>
            </footer>
        </div>
    </div>
@endsection

<script>
    function previewImages() {
        var preview = document.getElementById('imagePreview');
        preview.innerHTML = "";
        var files = document.getElementById('formFileMultiple').files;

        for (var i = 0; i < files.length; i++) {
            var file = files[i];

            if (file.type.match('image.*')) {
                var reader = new FileReader();

                reader.onload = (function (file) {
                    return function (e) {
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
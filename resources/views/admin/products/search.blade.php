@extends('layout')

@section('content')
    
    <section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('{{ asset('img/banner1.jpg') }}');">
        <h2 class="ltext-105 cl0 txt-center">
            Kết quả tìm kiếm
        </h2>
    </section>	
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            @include('includes.fileproduct')
            <div class="col-lg-9 col-md-12">
                <div class="row pb-3">
                    <div class="col-12 pb-1">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <form action="{{ route('search') }}" method="GET">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search by name">
                                    <div class="input-group-append">
                                        <span class="input-group-text bg-transparent text-primary">
                                            <i class="fa fa-search"></i>
                                        </span>
                                    </div>
                                </div>
                            </form>
                            <div class="dropdown ml-4">
                                <button class="btn border dropdown-toggle" type="button" id="triggerId" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                            Sort by
                                        </button>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="triggerId">
                                    <a class="dropdown-item" href="#">Latest</a>
                                    <a class="dropdown-item" href="#">Popularity</a>
                                    <a class="dropdown-item" href="#">Best Rating</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @foreach ($products as $product)
                    <div class="col-lg-4 col-md-6 col-sm-12 pb-1">
                        <div class="card product-item border-0 mb-4">
                            <!-- Hình ảnh sản phẩm -->
                            <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                <img class="img-fluid w-100" 
                                    src="{{ asset('storage/' . ($product->image ? json_decode($product->image)[0] : 'images/default-placeholder.jpg')) }}" 
                                    alt="{{ $product->name }}" 
                                    style="height: 250px; object-fit: cover;">
                                <!-- Nhãn Sale -->
                                @if ($product->sale_percentage)
                                    <span class="badge bg-danger text-white position-absolute" style="top: 10px; left: 10px; z-index: 2;">
                                        Sale {{ $product->sale_percentage }}%
                                    </span>
                                @endif
                                
                                <!-- Nhãn Hết hàng -->
                                @if ($product->quantity == 0)
                                    <span class="badge bg-dark text-white position-absolute" style="top: 10px; right: 10px; z-index: 2;">
                                        Hết hàng
                                    </span>
                                @endif
                            </div>
        
                            <!-- Thông tin sản phẩm -->
                            <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                <h6 class="text-truncate mb-3">{{ $product->name }}</h6>
                                <div class="d-flex justify-content-center">
                                    @if ($product->sale_percentage)
                                        <h6>{{ number_format($product->price - $product->price * ($product->sale_percentage / 100), 0, ',', '.') }} VND</h6>
                                        <h6 class="text-muted ml-2"><del>{{ number_format($product->price, 0, ',', '.') }} VND</del></h6>
                                    @else
                                        <h6>{{ number_format($product->price, 0, ',', '.') }} VND</h6>
                                    @endif
                                </div>
                            </div>
        
                            <!-- Nút thao tác -->
                            <div class="card-footer d-flex justify-content-between bg-light border">
                                <a href="{{ route('products.show', $product->id) }}" 
                                   class="btn btn-sm text-dark p-0 @if ($product->quantity == 0) disabled @endif">
                                    <i class="fas fa-eye text-primary mr-1"></i>Xem chi tiết
                                </a>
                                <form action="{{ route('wishlist.store', $product->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-sm text-dark p-0">
                                        <i class="fas fa-heart text-danger mr-1"></i>Yêu thích
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
                    <div class="col-12 pb-1">
                        <nav aria-label="Page navigation">
                          <ul class="pagination justify-content-center mb-3">
                            <li class="page-item disabled">
                              <a class="page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                                <span class="sr-only">Previous</span>
                              </a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                              <a class="page-link" href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                                <span class="sr-only">Next</span>
                              </a>
                            </li>
                          </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('admin.layouts.app')

@section('content')
    <div class="page-body">
        <div class="title-header">
            <h5>Thêm Người Dùng</h5>
        </div>
        <!-- New User start -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                                                data-bs-target="#pills-home" type="button">Quản Trị Viên</button>
                                        </li>
                                    </ul>

                                    <div class="tab-content" id="pills-tabContent">
                                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel">
                                            <form action="{{ route('admin.user.store') }}"
                                                class="theme-form theme-form-2 mega-form" method="POST">
                                                @csrf
                                                @method('POST')
                                                <div class="card-header-1">
                                                    <h5>Thông Tin Tài Khoản</h5>
                                                </div>

                                                <div class="row">
                                                    <!-- Tên Người Dùng -->
                                                    <div class="mb-4 row align-items-center">
                                                        <label class="form-label-title col-lg-2 col-md-3 mb-0">
                                                            Tên Người Dùng</label>
                                                        <div class="col-md-9 col-lg-10">
                                                            <input class="form-control @error('name') is-invalid @enderror" 
                                                                type="text" name="name" value="{{ old('name') }}">
                                                            @error('name')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <!-- Email Người Dùng -->
                                                    <div class="mb-4 row align-items-center">
                                                        <label class="col-lg-2 col-md-3 col-form-label form-label-title">
                                                           Email Người Dùng</label>
                                                        <div class="col-md-9 col-lg-10">
                                                            <input class="form-control @error('email') is-invalid @enderror" 
                                                                type="email" name="email" value="{{ old('email') }}">
                                                            @error('email')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <!-- Mật Khẩu -->
                                                    <div class="mb-4 row align-items-center">
                                                        <label class="col-lg-2 col-md-3 col-form-label form-label-title">Mật Khẩu</label>
                                                        <div class="col-md-9 col-lg-10">
                                                            <input class="form-control @error('password') is-invalid @enderror" 
                                                                type="password" name="password">
                                                            @error('password')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <!-- Xác Nhận Mật Khẩu -->
                                                    <div class="mb-4 row align-items-center">
                                                        <label class="col-lg-2 col-md-3 col-form-label form-label-title">Xác Nhận Mật Khẩu</label>
                                                        <div class="col-md-9 col-lg-10">
                                                            <input class="form-control @error('password_confirmation') is-invalid @enderror" 
                                                                type="password" name="password_confirmation">
                                                            @error('password_confirmation')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <!-- Vị Trí -->
                                                    <div class="col-md-9 col-lg-10">
                                                        <div class="form-group">
                                                            <label>Vị Trí</label>
                                                            <select class="form-select" name="role">
                                                                <option value="user">Người Dùng</option>
                                                                <option value="admin">Quản Trị Viên</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <!-- Nút Lưu -->
                                                    <div class="col-md-9 col-lg-10">
                                                        <input type="submit" value="Lưu" class="btn btn-primary">
                                                    </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- New User End -->

        <!-- footer start -->
        <div class="container-fluid">
            <footer class="footer">
                <div class="row">
                    <div class="col-md-12 footer-copyright text-center">
                        <p class="mb-0">Copyright 2021 © Voxo theme by pixelstrap</p>
                    </div>
                </div>
            </footer>
        </div>
        <!-- footer end -->
    </div>
@endsection

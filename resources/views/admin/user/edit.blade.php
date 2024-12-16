@extends('admin.layouts.app')

@section('content')
    <div class="page-body">
        <div class="title-header">
            <h5>Chỉnh Sửa Người Dùng</h5>
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
                                            <form action="{{ route('admin.user.update', $user->id) }}" method="POST"
                                                class="theme-form theme-form-2 mega-form">
                                                @csrf
                                                @method('put')
                                                <div class="card-header-1">
                                                    <h5>Thông Tin Tài Khoản</h5>
                                                </div>

                                                <div class="row">
                                                    <!-- Tên Người Dùng -->
                                                    <div class="mb-4 row align-items-center">
                                                        <label class="form-label-title col-lg-2 col-md-3 mb-0">Tên Người
                                                            Dùng</label>
                                                        <div class="col-md-9 col-lg-10">
                                                            <input class="form-control " type="text" name="name"
                                                                value="{{ old('name', $user->name) }}">
                                                            @error('name')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <!-- Email Người Dùng -->
                                                    <div class="mb-4 row align-items-center">
                                                        <label
                                                            class="col-lg-2 col-md-3 col-form-label form-label-title">Email
                                                            Người Dùng</label>
                                                        <div class="col-md-9 col-lg-10">
                                                            <input class="form-control " type="email" name="email"
                                                                value="{{ old('email', $user->email) }}">
                                                            @error('email')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <!-- Mật Khẩu -->
                                                    <div class="mb-4 row align-items-center">
                                                        <label class="col-lg-2 col-md-3 col-form-label form-label-title">Mật
                                                            Khẩu</label>
                                                        <div class="col-md-9 col-lg-10">
                                                            <input class="form-control " type="password" name="password"
                                                                placeholder="Nhập mật khẩu mới (nếu muốn thay đổi)">
                                                            @error('password')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="mb-4 row align-items-center">
                                                    <label class="col-lg-2 col-md-3 col-form-label form-label-title">Vị
                                                        Trí</label>
                                                    <div class="col-md-9 col-lg-10">
                                                        <select class="form-select" name="role">
                                                            <option value="user">Người Dùng</option>
                                                            <option value="admin">Quản Trị Viên</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-9 col-lg-10">


                                                    <input class = "btn btn-primary mt-1" type="submit" value="cập nhật">
                                                </div>
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
                    <p class="mb-0">Copyright 2024 sixguy</p>
                </div>
            </div>
        </footer>
    </div>
    <!-- footer end -->
    </div>
@endsection

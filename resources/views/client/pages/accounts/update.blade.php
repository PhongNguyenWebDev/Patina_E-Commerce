@extends('layouts.client')
@section('css')
    <style>
        .header__menu ul li a {
            text-decoration: none
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
@endsection
@section('content')
    @include('client.blocks.banner')
    <section class="breadcrumb-option my-xl-5">
        <div class="container">
            <h4>Cập nhât tài khoản</h4>
            <div class="col-lg-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="text-dark" href="#">Home</a></li>
                        <li class="breadcrumb-item"><a class="text-dark" href="#">Tài khoản</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Cập nhật tài khoản</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>
    <div class="container-md my-5">
        <div class="row gx-4">
            <div class="col-12">
                <div class="row gx-5">
                    <div class="col-lg-4 col-md-4 col-12">
                        <div class="nav nav-pills flex-column" role="tablist">
                            <div class="card rounded-0">
                                <a href="{{ route('client.account.profile-page') }}"
                                    class=" btn nav-link border-0 border-bottom p-3 pdcatt" style="color:black;">THÔNG
                                    TIN TÀI KHOẢN
                                </a>
                                <a href="{{ route('client.account.hoadon') }}"
                                    class=" btn nav-link border-0 border-bottom p-3 pdcatt" style="color:black;">HÓA ĐƠN
                                </a>
                                <button class="nav-link border-0 border-bottom p-3 pdcatt active bg-secondary rounded-0"
                                    id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab"
                                    aria-controls="home" aria-selected="false">THAY ĐỔI
                                    THÔNG TIN
                                </button>
                                <a href="{{ route('client.account.updatePass') }}"
                                    class=" btn nav-link border-0 border-bottom p-3 pdcatt" style="color:black;">ĐỔI MẬT
                                    KHẨU
                                </a>
                                <a style="color:black;" class="btn p-3 pdcatt" href="{{ route('logout') }}">ĐĂNG
                                    XUẤT</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-8 col-12">
                        <div class="tab-content border-0">
                            <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab"
                                tabindex="0">
                                <div class="row justify-content-center">
                                    <div class="col-xl-12 card rounded-0 p-4">
                                        <h3 class="mb-3">Cập nhật tài khoản</h3>
                                        <form action="#" method="POST">
                                            @csrf
                                            <div class="row g-3">
                                                <div class="col-lg-6 col-12 ">
                                                    <label class="p-2">Mã tài khoản</label>
                                                    <input name="id" disabled value="" type="text"
                                                        class="form-control p-2">
                                                </div>
                                                <div class="col-lg-6 col-12 ">
                                                    <label class="p-2">Họ và tên</label>
                                                    <input name="name" value="{{ $users->name }}" type="text"
                                                        class="form-control p-2">
                                                    @error('name')
                                                        <span style="color: red"><i
                                                                class="fa-solid fa-circle-exclamation fa-beat"></i>
                                                            {{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="col-lg-6 col-12 ">
                                                    <label class="p-2">Số điện thoại</label>
                                                    <input name="phone" value="{{ $users->phone }}" type="text"
                                                        class="form-control p-2">
                                                    @error('phone')
                                                        <span style="color: red"><i
                                                                class="fa-solid fa-circle-exclamation fa-beat"></i>
                                                            {{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="col-lg-6 col-12 ">
                                                    <label class="p-2">Email</label>
                                                    <input name="email" value="{{ $users->email }}" type="email"
                                                        class="form-control p-2">
                                                    @error('email')
                                                        <span style="color: red"><i
                                                                class="fa-solid fa-circle-exclamation fa-beat"></i>
                                                            {{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="col-lg-12 col-12 mb-3">
                                                    <label class="p-2">Địa chỉ</label>
                                                    <input name="address" value="{{ $users->address }}" type="text"
                                                        class="form-control p-2" placeholder="Nhập địa chỉ...">
                                                </div>
                                                <div class="col-12 mb-3">
                                                    <label class="p-2">Mật khẩu</label>
                                                    <input name="password" placeholder="Mật khẩu" type="password"
                                                        class="form-control p-2">
                                                    @error('password')
                                                        <span style="color: red"><i
                                                                class="fa-solid fa-circle-exclamation fa-beat"></i>
                                                            {{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="col-12">
                                                    <button type="submit" class="btn btn-dark float-end">Lưu thông
                                                        tin</button>
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
@endsection
@section('script')
    <script src="https://kit.fontawesome.com/3377b5a3db.js" crossorigin="anonymous"></script>
@endsection

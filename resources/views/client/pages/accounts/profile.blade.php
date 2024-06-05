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
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Đổi Mật Khẩu</h4>
                        <div class="breadcrumb__links">
                            <a href="/">Home</a>
                            <span>Tài Khoản</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="container-md mt-5">
        <div class="row g-3">
            <div class="col-12">
                <div class="row g-3">
                    <div class="col-lg-3 col-md-4 col-12">
                        <div class="nav nav-pills flex-column" role="tablist">
                            <div class="card">
                                <button class="nav-link border-0 border-bottom p-3 pdcatt active" id="home-tab"
                                    data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab"
                                    aria-controls="home" aria-selected="true" style="font-size: 17px;; background-color:black;">THÔNG TIN TÀI
                                    KHOẢN
                                </button>
                                <a href="{{ route('account.hoadon') }}"
                                    class=" btn nav-link border-0 border-bottom p-3 pdcatt" style="font-size: 17px; color:black;">HÓA ĐƠN
                                </a>
                                <a href="{{ route('account.update') }}"
                                    class=" btn nav-link border-0 border-bottom p-3 pdcatt" style="font-size: 17px; color:black;">THAY
                                    ĐỔI THÔNG TIN
                                </a>
                                <a href="{{ route('account.updatePass') }}"
                                    class=" btn nav-link border-0 border-bottom p-3 pdcatt" style="font-size: 17px; color:black;">ĐỔI MẬT
                                    KHẨU
                                </a>
                                <a style="font-size: 17px; color:black;" class="btn p-3 pdcatt" href="{{ route('logout') }}">ĐĂNG
                                    XUẤT</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-8 col-12">
                        <div class="tab-content border-0">
                            <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab"
                                tabindex="0">
                                <div class="row row-40 justify-content-center">
                                    <div class="col-md-9 justify-content-center card p-4">
                                        <div id="billing-form" class="mb-10">
                                            <div class="row g-3">
                                                <div class="col-md-12 col-12 mb-3">
                                                    <label class="p-2">Mã Tài Khoản</label>
                                                    <input type="text" disabled name="id"
                                                        value="{{ $users->id }}" class="form-control">
                                                </div>
                                                <div class="col-md-12 col-12 mb-3">
                                                    <label class="p-2">Họ và tên</label>
                                                    <input type="text" disabled name="name"
                                                        value="{{ $users->name }}" class="form-control">
                                                </div>
                                                <div class="col-md-12 col-12 mb-3">
                                                    <label class="p-2">Email</label>
                                                    <input type="email" disabled name="email"
                                                        value="{{ $users->email }}" class="form-control">
                                                </div>
                                                <div class="col-md-12 col-12 mb-3">
                                                    <label class="p-2">Số điện thoại</label>
                                                    <input type="text" disabled name="phone"
                                                        value="{{ $users->phone }}" class="form-control">
                                                </div>
                                                <div class="col-md-12 col-12 mb-3">
                                                    <label class="p-2">Địa chỉ</label>
                                                    <input type="text" disabled name="address"
                                                        value="{{ $users->address }}" class="form-control">
                                                </div>
                                                <div class="col-md-12 col-12 mb-3">
                                                    <label class="p-2">Trạng Thái</label>
                                                    <input type="text" disabled name="active"
                                                        value="{{ $users->active == 1 ? 'Đã kích hoạt' : 'Chưa kích hoạt' }}"
                                                        class="form-control">
                                                </div>
                                            </div>
                                        </div>
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

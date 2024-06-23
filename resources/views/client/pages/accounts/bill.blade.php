@extends('layouts.client')
@section('content')
    @include('client.blocks.banner')
    <main class="container-fluid">
        <div class="container d-flex flex-column flex-xl-row align-items-center justify-content-between ">
            <div class="col-12 col-xl-6">
                <h1>Hoá đơn</h1>
                <p class="text-banner pt-3 pt-xl-5 pb-3">Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet
                    velit.
                    Aliquam vulputate velit imperdiet
                    dolor tempor tristique.</p>
                <div class="d-flex align-items-center">
                    <a class="btn-home nav-link">Trang chủ</a>
                    <a class="btn-explore nav-link">Khám phá</a>
                </div>
            </div>
            <div class="col-12 col-xl-6 d-flex justify-content-xl-end justify-content-center">
                <img class="w-75" src="./img/Image-banner.png" alt="">
            </div>
        </div>
    </main>
    <section class="container my-5 hoadon">
        <div class="justify-content-between mx-xl-5 px-xl-5">
            <div class="row g-2">
                <h1 class="logo-hoadon fs-1 col-6">PATINA</h1>
                <div class="col-6 text-end">
                    <p>Mã hóa đơn: 4</p>
                    <p>Ngày tạo: 10/4/2024</p>
                </div>
            </div>
            <div class="row g-2 my-2">
                <div class="col-6">
                    <p class="fw-semibold">Thông tin cửa hàng</p>
                    <p>Patina</p>
                    <p>phongdeptrai@gmail.com</p>
                    <p>+84 305 6666</p>
                    <p>66 Bạch Đằng, Gò Vấp, Tp-HCM</p>
                </div>
                <div class="col-6 text-end">
                    <p class="fw-semibold">Thông tin của bạn</p>
                    <p>Phong Nguyễn</p>
                    <p>phong@gmail.com</p>
                    <p>+84 333 9999</p>
                    <p>99 Trường Chinh, Tân Bình, TP-HCM</p>
                </div>
            </div>
            <div class="row g-2 my-2" style="background-color: #F0F0F0;">
                <p class="col-6 fw-semibold">Trạng thái đơn hàng</p>
                <p class="col-6 text-end fw-semibold">Kiểm tra #</p>
            </div>
            <div class="row g-2 my-2">
                <p class="col-6">Trạng thái</p>
                <p class="col-6 text-end fw-semibold">Đã giao hàng</p>
            </div>
            <div class="row g-2 my-2" style="background-color: #F0F0F0;">
                <p class="col-6 fw-semibold">Sản phẩm</p>
                <p class="col-6 text-end fw-semibold">Giá</p>
            </div>
            <div class="row g-2 my-2">
                <div class="col-6">
                    <p>Áo sơ mi - Màu vàng - Hiệu Hades - Size XL
                    </p>
                    <p>Số lượng: 1</p>
                </div>
                <div class="col-6 text-end">
                    <p class="fw-semibold">$ 156.56</p>
                </div>
                <hr>
                <div class="col-6">
                    <p>Quần tây - Màu đen - Hiệu Hades - Size L
                    </p>
                    <p>Số lượng: 2</p>
                </div>
                <div class="col-6 text-end">
                    <p class="fw-semibold">$ 450.44</p>
                </div>
            </div>
            <div class="row g-2">
                <div class="col-6">
                    <button class="btn btn-hoadon">Quay lại</button>
                </div>
                <div class="col-6">
                    <p class="text-end fw-semibold fs-5">Tổng: $ 454.00</p>
                </div>
            </div>

        </div>
    </section>
@endsection

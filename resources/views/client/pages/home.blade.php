@extends('layouts.client')
@section('content')
    <div class="modal fade custom-modal-dialog" id="voucherModal" tabindex="-1" aria-labelledby="voucherModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content coupon text-center d-flex align-items-center rounded-0" style="width: 60%;">
                <div class="rounded-2 w-100 pt-5">
                    <div class="content mb-5">
                        <p class="text-secondary m-0">Giảm giá lên đến</p>
                        <h1 style="font-size:5rem; font-weight:400;">50%</h1>
                        <p class="text-secondary m-0">Để sử dụng, vui lòng sao chép <br> mã giảm giá và đăng ký tại</p>
                        <div class="pt-4">
                            <a href="{{ route('client.list-coupon.index') }}" class="btn btn-warning rounded-0">Săn ngay</a>
                            <button class="btn btn-secondary rounded-0" data-bs-dismiss="modal">Đóng</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="main-content">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                @foreach ($sliders as $key => $slider)
                    <button type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide-to="{{ $key }}" class="{{ $key == 0 ? 'active' : '' }}" aria-current="true"
                        aria-label="Slide {{ $key + 1 }}"></button>
                @endforeach
            </div>
            <div class="carousel-inner position-relative">
                @foreach ($sliders as $key => $slider)
                    <div class="carousel-item w-100 h-100 {{ $key == 0 ? 'active' : '' }}">
                        <div class="object-fit-cover">
                            <img src="{{ $slider->image }}" class="img-fluid" alt="Slide {{ $key + 1 }}">
                        </div>
                        <div class="carousel-caption text-white w-75" style="font-family:'Josefin Sans', sans-serif">
                            <h3>{{ $slider->event }}</h3>
                            <h1 class="mb-xl-2 mb-2">{{ $slider->title }}</h1>
                            <h4 class="mb-xl-4 mb-2 text-wrap w-50">{{ $slider->summary }}
                            </h4>
                            <a href="{{ $slider->link }}"
                                class="btn btn-white rounded-0 border px-xl-4 py-xl-2 text-white animated-link"
                                style="font-size:20px;">Đến ngay -></a>
                        </div>
                    </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    {{-- Danh mục sản phẩm --}}
    <section class="DMSP container-fluid py-xl-5 my-5">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-sm-12 ">
                    <h2 class="my-xl-2 my-3">Sản phẩm bạn có thể thích</h2>
                    <p class="d-xl-block d-none" style="color: #000516A4; font-size:14px;">Cửa hàng chuyên cung cấp các sản
                        phẩm thời trang hiện đại
                        <br> của các hãng Local Brand nổi tiếng tại Việt Nam
                    </p>
                </div>
                <div class="col-xl-6 col-sm-12">
                    <ul class="d-flex cate-frame list-unstyled justify-content-between my-xl-2 my-3 ">
                        @foreach ($categories as $category)
                            <li class="col-auto text-center">
                                <a href="{{ route('client.shop-page', $category->slug) }}"
                                    class="nav-link categories d-block p-2 my-xl-0 my-2">
                                    <img class="img-fluid rounded-circle bg-light object-fit-contain"
                                        src="{{ asset('assets/clients/img/Cate_img/' . $category->slug . '.png') }}"
                                        alt="{{ $category->name }}">
                                    <span class="d-xl-block d-none mt-2">{{ $category->name }}</span>
                                    <span
                                        class="d-xl-block d-none small">{{ $category->parent()->count() > 0 ? $category->totalChildProducts() : $category->products_count }}
                                        Sản phẩm</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>
    {{-- Dịch vụ --}}
    <div class="DV container-fluid m-0 text-center" style="background:#F0EFF5;">
        <div class="container">
            <div class="row g-3 py-xl-4 py-4">
                <div class="col-xl-4 col-4">
                    <img src="{{ asset('assets/clients/img/Icon/credit-card.png') }}" class="img-fluid" style="width: 10%"
                        alt="" srcset="">
                    <h5 class="my-1 fw-medium">Thanh toán an toàn</h5>
                    <p>Miễn phí giao hàng</p>
                </div>
                <div class="col-xl-4 col-4">
                    <img src="{{ asset('assets/clients/img/Icon/transportation.png') }}" class="img-fluid"
                        style="width: 10%" alt="" srcset="">
                    <h5 class="my-1 fw-medium">Miễn phí vận chuyển</h5>
                    <p>Miễn phí giao hàng</p>

                </div>
                <div class="col-xl-4 col-4">
                    <img src="{{ asset('assets/clients/img/Icon/support.png') }}" class="img-fluid" style="width: 10%"
                        alt="" srcset="">
                    <h5 class="my-1 fw-medium">Hỗ trợ 24/7</h5>
                    <p>Miễn phí giao hàng</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Flash Sales --}}
    <section class="container my-5 p-0">
        <div class="p-xl-5 p-3" style="background-color:#F0EFF5; ">
            <div class="d-flex flex-column flex-xl-row p-xl-5  bg-white w-100">
                <!-- Left -->
                <div class="col-xl-6 col-12 d-flex align-items-center">
                    <div class="container pt-3 pt-xl-0">
                        @php
                            $percent = (($proMoiNhat->price - $proMoiNhat->sale_price) / $proMoiNhat->price) * 100;
                        @endphp
                        @if ($percent > 0 && $percent < 90)
                            <span class="badge px-3 fs-5 text-bg-danger">- {{ number_format($percent, 2) }}%</span>
                        @endif
                        <div class="py-3">
                            <h3 class="fw-bold">Bộ sưu tập mới</h3>
                            <p style="color: var(--secondary-1000-color);">Xin giới thiệu bộ sưu tập thời trang sang trọng
                                của chúng tôi – sự kết hợp hoàn hảo giữa sự thoải mái và phong cách cho tủ đồ của bạn.</p>
                        </div>
                        <div class="d-flex align-items-center justify-content-between w-100">
                            <div class="d-flex flex-column border py-3 align-items-center time-flash-sales"
                                style="width: 6rem; background-color: #F0EFF5; color: black;">
                                <h5 class="fw-medium" id="days"></h5>
                                <p class="m-0">Ngày</p>
                            </div>
                            <div class="d-flex flex-column border py-3 align-items-center time-flash-sales"
                                style="width: 6rem; background-color: #F0EFF5; color: black;">
                                <h5 class="fw-medium" id="hours"></h5>
                                <p class="m-0">Giờ</p>
                            </div>
                            <div class="d-flex flex-column border py-3 align-items-center time-flash-sales"
                                style="width: 6rem; background-color: #F0EFF5; color: black;">
                                <h5 class="fw-medium" id="minutes"></h5>
                                <p class="m-0">Phút</p>
                            </div>
                            <div class="d-flex flex-column border py-3 align-items-center time-flash-sales"
                                style="width: 6rem; background-color: #F0EFF5; color: black;">
                                <h5 class="fw-medium" id="seconds"></h5>
                                <p class="m-0">Giây</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Right -->
                <div class="col-12 col-xl-6 d-flex justify-xl-content-end justify-content-center my-xl-0 my-4">
                    <a class="text-center" href="http://127.0.0.1:8000/shop/{{ $proMoiNhat->slug }}">
                        <img class="w-75" src="{{ $proMoiNhat->images }}" alt="">
                    </a>
                </div>
            </div>
        </div>
    </section>
    {{-- Sản phẩm bán chạy --}}
    <section class="container-fluid mb-xl-5 pb-xl-5">
        <div class="container p-0">
            <h2 class="text-center my-xl-5">Sản phẩm bán chạy</h2>
            <div class="container-fluid">
                <div class="container">
                    <div class="row position-relative">
                        @foreach ($proMuaNhieu as $product)
                            <div
                                class="col-xl-3 col-12 position-relative d-flex flex-wrap flex-column align-items-center change my-2">
                                <div class="position-relative">
                                    <a class="nav-link" href="{{ route('client.detail', $product->slug) }}">
                                        <img class="object-fit-cover w-100" src="{{ $product->images }}" alt="">
                                    </a>
                                    <a class="test-xct" href="{{ route('client.detail', $product->slug) }}">Xem chi
                                        tiết</a>
                                </div>
                                <div class="position-absolute top-0 p-3 w-100 end-0">
                                    <div class="d-flex align-items-center justify-content-between">
                                        @php
                                            $isFavorite = $favorite->contains('product_id', $product->id);
                                        @endphp
                                        @if (!$isFavorite)
                                            <a class="nav-link mx-3"
                                                href="{{ route('client.favorite.add', $product->id) }}">
                                                <i style="background-color:#fff; color:#d8d8d8"
                                                    class="fas fa-heart rounded-5 p-2"></i>
                                            </a>
                                        @else
                                            <a class="nav-link mx-3" href="{{ route('client.favorite.index') }}">
                                                <i style="background-color: rgb(203, 51, 51); color:white;"
                                                    class="fas fa-heart rounded-5 p-2"></i>
                                            </a>
                                        @endif
                                        @php
                                            $percent =
                                                (($product->price - $product->sale_price) / $product->price) * 100;
                                        @endphp
                                        @if ($percent > 0 && $percent < 90)
                                            <span class="badge text-bg-danger mx-3">-
                                                {{ number_format($percent, 2) }}%</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="text-center">
                                    <h6 class="text-center my-2 fw-medium">{{ $product->name }}</h6>
                                    <div class="d-flex justify-content-center text-center">
                                        @if ($product->sale_price > 0)
                                            <p style="font-size: var(--font-size); margin: 0;"
                                                class="text-decoration-line-through text-danger mx-2">
                                                {{ number_format($product->price, 0, ',', ',') }} VND
                                            </p>
                                            <p style="font-size: var(--font-size); margin: 0; color: black;">
                                                {{ number_format($product->sale_price, 0, ',', ',') }} VND
                                            </p>
                                        @else
                                            <p style="font-size: var(--font-size); margin: 0;">
                                                {{ number_format($product->price, 0, ',', ',') }} VND
                                            </p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- Sản phẩm bán chạy --}}
    <section class="container-fluid mb-xl-5 pb-xl-5">
        <div class="container p-0">
            <h2 class="text-center my-xl-51" style="margin-top: -65px; margin-bottom: 3rem !important;">Sản phẩm mới</h2>
            <div class="container-fluid">
                <div class="container">
                    <div class="row position-relative">
                        @foreach ($proNew as $product)
                            <div
                                class="col-xl-3 col-12 position-relative d-flex flex-wrap flex-column align-items-center change my-2">
                                <div class="position-relative">
                                    <a class="nav-link" href="{{ route('client.detail', $product->slug) }}">
                                        <img class="object-fit-cover w-100" src="{{ $product->images }}" alt="">
                                    </a>
                                    <a class="test-xct" href="{{ route('client.detail', $product->slug) }}">Xem chi
                                        tiết</a>
                                </div>
                                <div class="position-absolute top-0 p-3 w-100 end-0">
                                    <div class="d-flex align-items-center justify-content-between">
                                        @php
                                            $isFavorite = $favorite->contains('product_id', $product->id);
                                        @endphp
                                        @if (!$isFavorite)
                                            <a class="nav-link mx-3"
                                                href="{{ route('client.favorite.add', $product->id) }}">
                                                <i style="background-color:#fff; color:#d8d8d8"
                                                    class="fas fa-heart rounded-5 p-2"></i>
                                            </a>
                                        @else
                                            <a class="nav-link mx-3" href="{{ route('client.favorite.index') }}">
                                                <i style="background-color: rgb(203, 51, 51); color:white;"
                                                    class="fas fa-heart rounded-5 p-2"></i>
                                            </a>
                                        @endif
                                        @php
                                            $percent =
                                                (($product->price - $product->sale_price) / $product->price) * 100;
                                        @endphp
                                        @if ($percent > 0 && $percent < 90)
                                            <span class="badge text-bg-danger mx-3">-
                                                {{ number_format($percent, 2) }}%</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="text-center">
                                    <h6 class="text-center my-2 fw-medium">{{ $product->name }}</h6>
                                    <div class="d-flex justify-content-center text-center">
                                        @if ($product->sale_price > 0)
                                            <p style="font-size: var(--font-size); margin: 0;"
                                                class="text-decoration-line-through text-danger mx-2">
                                                {{ number_format($product->price, 0, ',', ',') }} VND
                                            </p>
                                            <p style="font-size: var(--font-size); margin: 0; color: black;">
                                                {{ number_format($product->sale_price, 0, ',', ',') }} VND
                                            </p>
                                        @else
                                            <p style="font-size: var(--font-size); margin: 0;">
                                                {{ number_format($product->price, 0, ',', ',') }} VND
                                            </p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Giới thiệu dịch vụ --}}
    <div class="container-fluid" style="background:#F0EFF5;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-3 col-6 p-xl-4 p-1">
                    <div class="d-flex flex-column justify-content-between align-items-center my-2">
                        <img src="{{ asset('assets/clients/img/Icon/user.png') }}" class="img-fluid" style="width: 15%"
                            alt="" srcset="">
                        <h5 class="py-xl-2">53k</h5>
                        <span class="" style="color: #797b86;">Khách hàng</span>
                    </div>
                </div>
                <div class="col-xl-3 col-6 p-xl-4 p-1">
                    <div class="d-flex flex-column justify-content-between align-items-center my-2">
                        <img src="{{ asset('assets/clients/img/Icon/box.png') }}" class="img-fluid" style="width: 15%"
                            alt="" srcset="">
                        <h5 class="py-xl-2">2000</h5>
                        <span style="color: #797b86;">Sản phẩm</span>
                    </div>
                </div>
                <div class="col-xl-3 col-6 p-xl-4 p-1">
                    <div class="d-flex flex-column justify-content-between align-items-center my-2">
                        <img src="{{ asset('assets/clients/img/Icon/briefcase.png') }}" class="img-fluid"
                            style="width: 15%" alt="" srcset="">
                        <h5 class="py-xl-2">25</h5>
                        <span style="color: #797b86;">Số năm kinh nghiệm</span>
                    </div>
                </div>
                <div class="col-xl-3 col-6 p-xl-4 p-1">
                    <div class="d-flex flex-column justify-content-between align-items-center my-2">
                        <img src="{{ asset('assets/clients/img/Icon/heart.png') }}" class="img-fluid" style="width: 15%"
                            alt="" srcset="">
                        <h5 class="py-xl-2">5</h5>
                        <span style="color: #797b86;">Thương hiệu</span>
                    </div>
                </div>
            </div>
        </div>

    </div>
    {{-- Sản phẩm chung --}}
    <div class="container-fluid d-flex flex-column align-items-center mt-3">
        <div class="polular-product w-100 d-flex flex-column align-items-center justify-content-center">
            <h2 class="text-center py-2">Sản phẩm của chúng tôi</h2>
        </div>

        @livewire('user-search-product')

        <div class="container-fluid">
            <div class="container">
                <div class="row position-relative">
                    @foreach ($products as $product)
                        <div
                            class="col-xl-3 col-12 position-relative d-flex flex-wrap flex-column align-items-center my-2 change">
                            <div class="position-relative">
                                <a class="nav-link" href="{{ route('client.detail', $product->slug) }}">
                                    <img class="object-fit-cover w-100" src="{{ $product->images }}" alt="">
                                </a>
                                <a class="test-xct" href="{{ route('client.detail', $product->slug) }}">Xem chi tiết</a>
                            </div>
                            <div class="position-absolute top-0 p-3 w-100 end-0">
                                <div class="d-flex align-items-center justify-content-between">
                                    @php
                                        $isFavorite = false;
                                        foreach ($favorite as $item) {
                                            if ($item->product_id === $product->id) {
                                                $isFavorite = true;
                                                break;
                                            }
                                        }
                                    @endphp
                                    @if (!$isFavorite)
                                        <a class="nav-link mx-3"
                                            href="{{ route('client.favorite.add', $product->id) }}"><i
                                                style=" background-color:#fff; color:#d8d8d8"
                                                class="fas fa-heart rounded-5 p-2"></i></a>
                                    @else
                                        <a class="nav-link mx-3" href="{{ route('client.favorite.index') }}"><i
                                                style=" background-color: rgb(203, 51, 51); color:white;"
                                                class="fas fa-heart rounded-5 p-2"></i></a>
                                    @endif
                                    @php
                                        $percent = (($product->price - $product->sale_price) / $product->price) * 100;
                                    @endphp
                                    @if ($percent > 0 && $percent < 90)
                                        <span class="badge text-bg-danger mx-3">- {{ number_format($percent, 2) }}%</span>
                                    @endif
                                </div>
                            </div>
                            <div class="text-center">
                                <h6 class="text-center my-2 fw-medium">{{ $product->name }}</h6>
                                <div class="d-flex justify-content-center text-center">
                                    @if ($product->sale_price > 0)
                                        <p style="font-size: var(--font-size); margin: 0;"
                                            class="text-decoration-line-through text-danger mx-2">
                                            {{ number_format($product->price, 0, ',', ',') }} VND</p>
                                        <p style="font-size: var(--font-size); margin: 0; color: black;">
                                            {{ number_format($product->sale_price, 0, ',', ',') }} VND
                                        </p>
                                    @else
                                        <p style="font-size: var(--font-size); margin: 0;">
                                            {{ number_format($product->price, 0, ',', ',') }} VND</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div style="float: right"><a
                        class="btn btn-white rounded-0 border px-xl-4 py-xl-2 text-dark animated-link"
                        href="{{ route('client.shop-page') }}">Xem thêm <i class="fa-solid fa-arrow-right"></i></a></div>
            </div>
        </div>
    </div>
    {{-- Thương hiệu của hàng --}}
    <div class="container-fluid px-4 my-5 logo-brand">
        <div class="container">
            <div class="row align-items-center py-2" style="background:#F0EFF5;">
                @foreach ($brands as $brand)
                    <div class="col-xl col-6 text-center">
                        <span class="w-100">
                            <img class="w-75" src="{{ $brand->image }}" alt="">
                        </span>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    {{-- Blog --}}
    <section class="my-xl-5 py-xl-5 py-4">
        <div class="container px-4">
            <h2 class="text-center mb-4">Bài viết nổi bật</h2>
            <div class="row g-4">
                @foreach ($blogs as $blog)
                    <div class="col-sm-6 col-md-4 col-lg-4">
                        <div class="card-custom border-0 shadow-sm m-0" style="height: fit-content">
                            <img src="{{ $blog->image }}" height="200" class="card-img-top" alt="...">
                            <div class="card-body px-3 py-2">
                                <h5 class="card-title fw-medium">{{ $blog->name }}</h5>
                                <p class="card-text mb-2">
                                    {!! substr($blog->content, 40, 80) !!}
                                    <span>...</span>
                                </p>
                                <a class="text-secondary" href="{{ route('client.blog-detail', $blog->slug) }}"
                                    class="stretched-link nav-link">Xem thêm</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </section>
@endsection
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var carouselElement = document.querySelector('#carouselProducts');
        var carousel = new bootstrap.Carousel(carouselElement, {
            interval: 3000, // Thời gian giữa các slide (3000ms = 3s)
            ride: 'carousel'
        });

        carouselElement.addEventListener('mouseover', function() {
            carousel.pause();
        });

        carouselElement.addEventListener('mouseout', function() {
            carousel.cycle();
        });
    });
    $(document).ready(function() {
        $('.change').hover(
            function() {
                $(this).find('.test-xct').css('opacity', '1');
            },
            function() {
                $(this).find('.test-xct').css('opacity', '0');
            }
        );
    });
    $(document).ready(function() {
        var lastCloseTime = localStorage.getItem('voucherPopupClosedTime');
        var currentTime = new Date().getTime();

        if (!lastCloseTime || currentTime - lastCloseTime >= 5 * 60 * 1000) {
            $('#voucherModal').modal('show');
        }

        // Khi modal đóng, cập nhật thời gian đóng vào localStorage
        $('#voucherModal').on('hidden.bs.modal', function() {
            localStorage.setItem('voucherPopupClosedTime', new Date().getTime());
        });
    });
</script>

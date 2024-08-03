@extends('layouts.client')
@section('content')
    <div class="main-content">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                @foreach ($sliders as $key => $slider)
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $key }}"
                        class="{{ $key == 0 ? 'active' : '' }}" aria-current="true"
                        aria-label="Slide {{ $key + 1 }}"></button>
                @endforeach
            </div>
            <div class="carousel-inner">
                @foreach ($sliders as $key => $slider)
                    <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                        <img src="{{ $slider->image }}" class="object-cover d-block w-100 h-100"
                            alt="Slide {{ $key + 1 }}">
                        {{-- <div style="z-index: 99;">
                            <h3 class="carousel-caption d-none d-md-block">{{ $slider->title }}</h3>
                            <p class="carousel-caption d-none d-md-block">{{ $slider->description }}</p>
                            <a href="" class="btn btn-primary">Xem thêm</a>
                        </div> --}}
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
    <section class="container-fluid py-xl-5 my-3">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-sm-12 ">
                    <h2>Sản phẩm bạn có thể thích</h2>
                    <p style="color: #000516A4; font-size:14px;">Cửa hàng chuyên cung cấp các sản phẩm thời trang hiện đại
                        <br> của các hãng Local Brand nổi tiếng tại Việt Nam
                    </p>
                </div>
                <div class="col-xl-6 col-sm-12">
                    <ul class="row g-2 pb-5 px-0 cate-frame">
                        <li class="rounded-5 text-center me-xl-5 nav-link">
                            <a href="http://127.0.0.1:8000/shop-page/quan" class="nav-link categories d-block">
                                <img class="object-fit-contain" style="background:#F0EFF5; border-radius:50%;"
                                    src="/assets/clients/img/Cate_img/pants.png" alt="Quần">
                                <span class="d-block mt-2">Quần</span>
                                <span style="font-size:var(--font-small-size)">28 Sản phẩm</span>
                            </a>
                        </li>
                        <li class="rounded-5 text-center me-xl-5 nav-link">
                            <a href="http://127.0.0.1:8000/shop-page/ao" class="nav-link categories d-block">
                                <img class="object-fit-contain" style="background:#F0EFF5; border-radius:50%;"
                                    src="{{ asset('assets/clients/img/Cate_img/shirt.png') }}" alt="Áo">
                                <span class="d-block mt-2">Áo</span>
                                <span style="font-size:var(--font-small-size)">28 Sản phẩm</span>
                            </a>
                        </li>
                        <li class="rounded-5 text-center me-xl-5 nav-link">
                            <a href="http://127.0.0.1:8000/shop-page/quan" class="nav-link categories d-block">
                                <img class="object-fit-contain" style="background:#F0EFF5; border-radius:50%;"
                                    src="{{ asset('assets/clients/img/Cate_img/footware.png') }}" alt="Giày">
                                <span class="d-block mt-2">Giày</span>
                                <span style="font-size:var(--font-small-size)">28 Sản phẩm</span>
                            </a>
                        </li>
                        <li class="rounded-5 text-center me-xl-5 nav-link">
                            <a href="http://127.0.0.1:8000/shop-page/quan" class="nav-link categories d-block">
                                <img class="object-fit-contain" style="background:#F0EFF5; border-radius:50%;"
                                    src="{{ asset('assets/clients/img/Cate_img/setofclothes.png') }}" alt="Bộ quần áo">
                                <span class="d-block mt-2">Bộ quần áo</span>
                                <span style="font-size:var(--font-small-size)">28 Sản phẩm</span>
                            </a>
                        </li>
                        <li class="rounded-5 text-center me-xl-5 nav-link">
                            <a href="http://127.0.0.1:8000/shop-page/quan" class="nav-link categories d-block">
                                <img class="object-fit-contain" style="background:#F0EFF5; border-radius:50%;"
                                    src="{{ asset('assets/clients/img/Cate_img/assor.png') }}" alt="Phụ kiện">
                                <span class="d-block mt-2">Phụ kiện</span>
                                <span style="font-size:var(--font-small-size)">28 Sản phẩm</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    {{-- Dịch vụ --}}
    <div class="container-fluid m-0 text-center" style="background:#F0EFF5;">
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
                        <span class="badge px-3 fs-5 text-bg-danger">- 20%</span>
                        <div class="py-3">
                            <h3 class="fw-bold">New Collection</h3>
                            <p style="color: var(--secondary-1000-color);">Introducing our luxurious
                                Harmony Chair – a perfect blend of comfort and style for your
                                living space.</p>
                        </div>
                        <div class="d-flex align-items-center justify-content-between w-100">
                            <div class="d-flex flex-column border py-3 align-items-center time-flash-sales"
                                style="width: 6rem; background-color: #F0EFF5; color: black;">
                                <h5 class="fw-medium" id="days"></h5>
                                <p class="m-0">Days</p>
                            </div>
                            <div class="d-flex flex-column border py-3 align-items-center time-flash-sales"
                                style="width: 6rem; background-color: #F0EFF5; color: black;">
                                <h5 class="fw-medium" id="hours"></h5>
                                <p class="m-0">Hours</p>
                            </div>
                            <div class="d-flex flex-column border py-3 align-items-center time-flash-sales"
                                style="width: 6rem; background-color: #F0EFF5; color: black;">
                                <h5 class="fw-medium" id="minutes"></h5>
                                <p class="m-0">Minutes</p>
                            </div>
                            <div class="d-flex flex-column border py-3 align-items-center time-flash-sales"
                                style="width: 6rem; background-color: #F0EFF5; color: black;">
                                <h5 class="fw-medium" id="seconds"></h5>
                                <p class="m-0">Seconds</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Right -->
                <div class="col-12 col-xl-6 d-flex justify-xl-content-end justify-content-center">
                    <img class="w-75" src="{{ asset('assets/clients/img/Products/Shirt/24POLO-CREAM.webp') }}"
                        alt="">
                </div>
            </div>
        </div>
    </section>
    {{-- Sản phẩm bán chạy --}}
    <section class="container-fluid mb-xl-5 pb-xl-5">
        <div class="container p-0">
            <h2 class="text-center my-xl-5">Sản phẩm bán chạy</h2>
            <div id="carouselProducts" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @foreach ($proMuaNhieu->chunk(4) as $chunkIndex => $chunk)
                        <div class="carousel-item {{ $chunkIndex === 0 ? 'active' : '' }}">
                            <div class="container-fluid">
                                <div class="row">
                                    @foreach ($chunk as $product)
                                            <div
                                                class="col-xl-3 col-12 position-relative d-flex flex-wrap flex-column align-items-center">
                                                <a class="nav-link" href="{{ route('client.detail', $product->slug) }}">
                                                    <img class="img-thumbnail" src="{{ $product->images }}"
                                                        alt="">
                                                </a>
                                                <div class="position-absolute top-0 p-3 w-100 end-0">
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        @if ($product->hot === 1)
                                                            <span class="badge text-bg-danger">hot</span>
                                                        @endif
                                                        @php
                                                            $isFavorite = false;
                                                            foreach ($favorite as $item) {
                                                                if ($item->product_id === $product->id) {
                                                                    $isFavorite = true;
                                                                    break;
                                                                }
                                                            }
                                                        @endphp
                                                        @if ($isFavorite)
                                                            <a class="nav-link"
                                                                href="{{ route('client.favorite.add', $product->id) }}"><i
                                                                    style=" background-color: rgb(203, 51, 51); color:white;"
                                                                    class="fas fa-heart rounded-5 p-2"></i></a>
                                                        @else
                                                            <a class="nav-link"
                                                                href="{{ route('client.favorite.index') }}"><i
                                                                    style=" background-color:#fff; color:#d8d8d8"
                                                                    class="fas fa-heart rounded-5 p-2"></i></a>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="text-center my-3">
                                                    <h6 class="text-center">{{ $product->name }}</h6>
                                                    {{-- <p style="font-size: var(--font-size); margin:0">{{ $product->category->name }}</p> --}}
                                                    <div class="d-flex justify-content-center text-center">
                                                        <p style="font-size: var(--font-size); margin: 0;"
                                                            class="text-decoration-line-through text-danger mx-2">
                                                            ${{ $product->price }}</p>
                                                        <p style="font-size: var(--font-size); margin: 0; color: black;">
                                                            ${{ $product->sale_price }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselProducts"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselProducts"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
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
            <h2 class="text-center">Sản phẩm của chúng tôi</h2>
        </div>

        @livewire('user-search-product')

        <div class="container-fluid">
            <div class="container">
                <div class="row position-relative">
                    @foreach ($products as $product)
                        <div
                            class="col-xl-3 col-12 position-relative d-flex flex-wrap flex-column align-items-center change">
                            <a class="nav-link" href="{{ route('client.detail', $product->slug) }}">
                                <img class="object-fit-cover w-100" src="{{ $product->images }}" alt="">
                            </a>
                            <a class="test-xct" href="">Xem chi tiết</a>
                            <div class="position-absolute top-0 p-3 w-100 end-0">
                                <div class="d-flex align-items-center justify-content-between">
                                    <span class="badge text-bg-danger">- 20%</span>
                                    @php
                                        $isFavorite = false;
                                        foreach ($favorite as $item) {
                                            if ($item->product_id === $product->id) {
                                                $isFavorite = true;
                                                break;
                                            }
                                        }
                                    @endphp
                                    @if ($isFavorite)
                                        <a class="nav-link" href="{{ route('client.favorite.add', $product->id) }}"><i
                                                style=" background-color: rgb(203, 51, 51); color:white;"
                                                class="fas fa-heart rounded-5 p-2"></i></a>
                                    @else
                                        <a class="nav-link" href="{{ route('client.favorite.index') }}"><i
                                                style=" background-color:#fff; color:#d8d8d8"
                                                class="fas fa-heart rounded-5 p-2"></i></a>
                                    @endif
                                </div>
                            </div>
                            <div class="text-center">
                                <h6 class="text-center my-2 fw-medium">{{ $product->name }}</h6>
                                <div class="d-flex justify-content-center text-center">
                                    <p style="font-size: var(--font-size); margin: 0;"
                                        class="text-decoration-line-through text-danger mx-2">
                                        {{ number_format($product->price, 0, ',', ',') }} VND</p>
                                    <p style="font-size: var(--font-size); margin: 0; color: black;">
                                        {{ number_format($product->sale_price, 0, ',', ',') }} VND
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    {{-- Thương hiệu của hàng --}}
    <div class="container-fluid px-4 mt-5 logo-brand">
        <div class="container">
            <div class="row align-items-center py-2" style="background:#F0EFF5;">
                @foreach ($brands as $brand)
                    <span class="col-lg-2 text-center">
                        <img class="w-75" src="{{ $brand->image }}" alt="">
                    </span>
                @endforeach
            </div>
        </div>
    </div>
    {{-- Blog --}}
    <section class="my-xl-5 py-xl-5">
        <div class="container px-4">
            <h2 class="text-center mb-4">Bài viết nổi bật</h2>
            <div class="row g-4">
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="card border-0 shadow-sm">
                        <img src="{{ asset('assets/clients/img/blogimage.png') }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Tin tức 1</h5>
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vel justo ac
                                neque
                                convallis
                                semper.</p>
                            <a href="#" class="stretched-link nav-link">Xem thêm</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="card border-0 shadow-sm">
                        <img src="{{ asset('assets/clients/img/blogimage.png') }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Tin tức 1</h5>
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vel justo ac
                                neque
                                convallis
                                semper.</p>
                            <a href="#" class="stretched-link nav-link">Xem thêm</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="card border-0 shadow-sm">
                        <img src="{{ asset('assets/clients/img/blogimage.png') }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Tin tức 1</h5>
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vel justo ac
                                neque
                                convallis
                                semper.</p>
                            <a href="#" class="stretched-link nav-link">Xem thêm</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="card border-0 shadow-sm">
                        <img src="{{ asset('assets/clients/img/blogimage.png') }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Tin tức 1</h5>
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vel justo ac
                                neque
                                convallis
                                semper.</p>
                            <a href="#" class="stretched-link nav-link">Xem thêm</a>
                        </div>
                    </div>
                </div>
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
</script>

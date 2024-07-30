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
                        <img src="{{ $slider->image }}" class="d-block w-100" alt="Slide {{ $key + 1 }}">
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
        <div class="container-fluid m-0 text-center" style="background:#F0EFF5;">
            <div class="row g-3 py-xl-4 py-4">
                <div class="col-xl-4 col-4">
                    <img src="{{ asset('assets/clients/img/Icon/credit-card.png') }}" class="img-fluid" style="width: 10%"
                        alt="" srcset="">
                    <h5 class="my-1">Thanh toán an toàn</h5>
                    <div class="d-flex justify-content-center">
                        <p class="text-xl-center col-xl-6 col-12"
                            style="font-size: var(--font-small-size); color: #000516A4;">
                            Khách hàng có thể đặt cọc từ 10% hoặc thanh toán 100% giá trị hàng hóa cho cửa hàng.
                        </p>
                    </div>
                </div>
                <div class="col-xl-4 col-4">
                    <img src="{{ asset('assets/clients/img/Icon/transportation.png') }}" class="img-fluid"
                        style="width: 10%" alt="" srcset="">
                    <h5 class="my-1">Miễn phí vận chuyển</h5>
                    <div class="d-flex justify-content-center">
                        <p class="text-xl-center col-xl-6 col-12"
                            style="font-size: var(--font-small-size);color: #000516A4;">
                            Với đơn hàng có giá trị từ 399k trở lên thì dù bạn ở nơi đâu tại Việt Nam thì sẽ được miễn phí
                            cho phí vận chuyển
                        </p>
                    </div>
                </div>
                <div class="col-xl-4 col-4">
                    <img src="{{ asset('assets/clients/img/Icon/support.png') }}" class="img-fluid" style="width: 10%"
                        alt="" srcset="">
                    <h5 class="my-1">Hỗ trợ 24/7</h5>
                    <div class="d-flex justify-content-center">
                        <p class="text-xl-center col-xl-6 col-12"
                            style="font-size: var(--font-small-size) ; color: #000516A4;">
                            Đội ngũ nhân viên thân thiện của chúng tôi sẽ nhiệt tình giải đáp những thắc mắc của quý khách
                            tại mọi thời điểm
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Danh mục sản phẩm --}}
    <section class="container-fluid my-xl-5 py-xl-5" style="width: 85%">
        <div class="py-xl-3 py-2 d-flex flex-column align-items-center text-center">
            <h2>Sản phẩm bạn có thể thích</h2>
            <p style="color: #000516A4;">Cửa hàng chuyên cung cấp các sản phẩm thời trang hiện đại
                <br> của các hãng Local Brand nổi tiếng tại Việt Nam
            </p>
        </div>
        <div class="container-fluid p-0 d-flex justify-content-center">
            <ul class="row g-2 pb-5">
                <li class="rounded-5 text-center me-5 nav-link" style="width: 7rem; height: 7rem;">
                    <a href="http://127.0.0.1:8000/shop-page/quan" class="nav-link d-block h-100">
                        <img class="object-fit-contain w-100 h-100" style="background:#F0EFF5; border-radius:50%;"
                            src="/assets/clients/img/Cate_img/pants.png" alt="Quần">
                        <span class="d-block mt-2">Quần</span>
                        <span style="font-size:var(--font-small-size)">28 Sản phẩm</span>
                    </a>
                </li>
                <li class="rounded-5 text-center me-5 nav-link" style="width: 7rem; height: 7rem;">
                    <a href="http://127.0.0.1:8000/shop-page/ao" class="nav-link d-block h-100">
                        <img class="object-fit-contain w-100 h-100" style="background:#F0EFF5; border-radius:50%;"
                            src="{{ asset('assets/clients/img/Cate_img/shirt.png') }}" alt="Áo">
                        <span class="d-block mt-2">Áo</span>
                        <span style="font-size:var(--font-small-size)">28 Sản phẩm</span>
                    </a>
                </li>
                <li class="rounded-5 text-center me-5 nav-link" style="width: 7rem; height: 7rem;">
                    <a href="http://127.0.0.1:8000/shop-page/quan" class="nav-link d-block h-100">
                        <img class="object-fit-contain w-100 h-100" style="background:#F0EFF5; border-radius:50%;"
                            src="{{ asset('assets/clients/img/Cate_img/footware.png') }}" alt="Giày">
                        <span class="d-block mt-2">Giày</span>
                        <span style="font-size:var(--font-small-size)">28 Sản phẩm</span>
                    </a>
                </li>
                <li class="rounded-5 text-center me-5 nav-link" style="width: 7rem; height: 7rem;">
                    <a href="http://127.0.0.1:8000/shop-page/quan" class="nav-link d-block h-100">
                        <img class="object-fit-contain w-100 h-100" style="background:#F0EFF5; border-radius:50%;"
                            src="{{ asset('assets/clients/img/Cate_img/setofclothes.png') }}" alt="Bộ quần áo">
                        <span class="d-block mt-2">Bộ quần áo</span>
                        <span style="font-size:var(--font-small-size)">28 Sản phẩm</span>
                    </a>
                </li>
                <li class="rounded-5 text-center me-5 nav-link" style="width: 7rem; height: 7rem;">
                    <a href="http://127.0.0.1:8000/shop-page/quan" class="nav-link d-block h-100">
                        <img class="object-fit-contain w-100 h-100" style="background:#F0EFF5; border-radius:50%;"
                            src="{{ asset('assets/clients/img/Cate_img/assor.png') }}" alt="Phụ kiện">
                        <span class="d-block mt-2">Phụ kiện</span>
                        <span style="font-size:var(--font-small-size)">28 Sản phẩm</span>
                    </a>
                </li>
            </ul>
        </div>
    </section>
    {{-- Sản phẩm bán chạy --}}
    <section class="container-fluid mb-xl-5 pb-xl-5">
        <div>
            <h2 class="text-center my-xl-5">Sản phẩm bán chạy</h2>
        </div>
        <div id="carouselProducts" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                @foreach ($products->chunk(4) as $chunkIndex => $chunk)
                    <div class="carousel-item {{ $chunkIndex === 0 ? 'active' : '' }}">
                        <div class="container-fluid" style="width: 90%;">
                            <div class="row g-2">
                                @foreach ($chunk as $product)
                                    @if ($product->hot === 1)
                                        <div
                                            class="col-xl-3 col-12 position-relative d-flex flex-wrap flex-column align-items-center">
                                            <a class="nav-link" href="{{ route('client.detail', $product->slug) }}">
                                                <img class="img-thumbnail" src="{{ $product->images }}" alt="">
                                            </a>
                                            <div class="position-absolute top-0 p-3 w-100 end-0">
                                                <div class="d-flex align-items-center justify-content-between">
                                                    @if ($product->hot === 1)
                                                        <span class="badge text-bg-danger fs-6">hot</span>
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
                                                                class="fa-regular fa-heart rounded-5 p-2"></i></a>
                                                    @else
                                                        <a class="nav-link"
                                                            href="{{ route('client.favorite.index') }}"><i
                                                                style=" background-color:#fff; color:#d8d8d8"
                                                                class="fas fa-heart rounded-5 p-2"></i></a>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="text-center">
                                                <h6 class="text-center my-2">{{ $product->name }}</h6>
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
                                    @endif
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
    </section>

    <div class="container-fluid" style="background:#F0EFF5;">
        <div class="d-flex justify-content-center">
            <div class="col-xl-2 col-6 p-xl-4 p-1">
                <div class="d-flex flex-column justify-content-between align-items-center my-2">
                    <img src="{{ asset('assets/clients/img/Icon/user.png') }}" class="img-fluid" style="width: 15%"
                        alt="" srcset="">
                    <h5 class="py-2">53k</h5>
                    <span class="" style="color: #797b86;">Khách hàng</span>
                </div>
            </div>
            <div class="col-xl-2 col-6 p-xl-4 p-1">
                <div class="d-flex flex-column justify-content-between align-items-center my-2">
                    <img src="{{ asset('assets/clients/img/Icon/box.png') }}" class="img-fluid" style="width: 15%"
                        alt="" srcset="">
                    <h5 class="py-2">2000</h5>
                    <span style="color: #797b86;">Sản phẩm</span>
                </div>
            </div>
            <div class="col-xl-2 col-6 p-xl-4 p-1">
                <div class="d-flex flex-column justify-content-between align-items-center my-2">
                    <img src="{{ asset('assets/clients/img/Icon/briefcase.png') }}" class="img-fluid" style="width: 15%"
                        alt="" srcset="">
                    <h5 class="py-2">25</h5>
                    <span style="color: #797b86;">Số năm kinh nghiệm</span>
                </div>
            </div>
            <div class="col-xl-2 col-6 p-xl-4 p-1">
                <div class="d-flex flex-column justify-content-between align-items-center my-2">
                    <img src="{{ asset('assets/clients/img/Icon/heart.png') }}" class="img-fluid" style="width: 15%"
                        alt="" srcset="">
                    <h5 class="py-2">5</h5>
                    <span style="color: #797b86;">Thương hiệu</span>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid d-flex flex-column align-items-center mt-3">
        <div class="polular-product w-100 d-flex flex-column align-items-center justify-content-center">
            <h2 class="text-center">Sản phẩm của chúng tôi</h2>
            <div class="w-75">
                <p class="mt-2 text-center" style="color: #797b86;">
                </p>
            </div>
        </div>

        @livewire('user-search-product')

        <div class="container-fluid" style="width: 90%;">
            <div class="row g-2">
                @foreach ($products as $product)
                    <div class="col-xl-3 col-12 position-relative d-flex flex-wrap flex-column align-items-center">
                        <a class="nav-link" href="{{ route('client.detail', $product->slug) }}">
                            <img class="img-thumbnail" src="{{ $product->images }}" alt="">
                        </a>
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
                                            class="fa-regular fa-heart rounded-5 p-2"></i></a>
                                @else
                                    <a class="nav-link" href="{{ route('client.favorite.index') }}"><i
                                            style=" background-color:#fff; color:#d8d8d8"
                                            class="fas fa-heart rounded-5 p-2"></i></a>
                                @endif
                            </div>
                        </div>
                        <div class="text-center">
                            <h6 class="text-center my-2">{{ $product->name }}</h6>
                            {{-- <p style="font-size: var(--font-size); margin:0">{{ $product->category->name }}</p> --}}
                            <div class="d-flex justify-content-center text-center">
                                <p style="font-size: var(--font-size); margin: 0;"
                                    class="text-decoration-line-through text-danger mx-2">${{ $product->price }}</p>
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
    <div class="container-fluid px-4 mt-5 logo-brand">
        <div class="row g-2 px-5 d-flex justify-content-between align-items-center" style="background:#F0EFF5;">
            @foreach ($brands as $brand)
                <span class="col-lg-2 text-center">
                    <img class="w-75" src="{{ $brand->image }}" alt="">
                </span>
            @endforeach
        </div>
    </div>
@endsection
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.min.js"></script>
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
</script>

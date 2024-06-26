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
        <div class="container-fluid m-0 text-center" style="background-color: #F7F2EE;">
            <div class="row g-3 py-xl-4 py-4">
                <div class="col-xl-4 col-4">
                    <i class="fa-regular fa-credit-card fs-1" style="color: #5F2D00C9;"></i>
                    <p class="my-1 fs-4 fw-semibold">Thanh toán an toàn</p>
                    <div class="d-flex justify-content-center">
                        <p class="text-xl-center col-xl-6 col-12" style="font-size: 14px; color: #000516A4;">
                            Khách hàng có thể đặt cọc từ 10% hoặc thanh toán 100% giá trị hàng hóa cho cửa hàng. Số tiền này
                            sẽ được giữ an toàn cho đến khi quý khách nhận được hàng đúng như mong muốn
                        </p>
                    </div>
                </div>
                <div class="col-xl-4 col-4">
                    <i class="fa-solid fa-truck-fast fs-1" style="color: #5F2D00C9;"></i>
                    <p class="my-1 fs-4 fw-semibold">Miễn phí vận chuyển</p>
                    <div class="d-flex justify-content-center">
                        <p class="text-xl-center col-xl-6 col-12" style="font-size: 14px; color: #000516A4;">
                            Với đơn hàng có giá trị từ 399k trở lên thì dù bạn ở nơi đâu tại Việt Nam thì sẽ được miễn phí
                            cho phí vận chuyển
                        </p>
                    </div>
                </div>
                <div class="col-xl-4 col-4">
                    <i class="fa-regular fa-comments fs-1" style="color: #5F2D00C9;"></i>
                    <p class="my-1 fs-4 fw-semibold">Hỗ trợ 24/7</p>
                    <div class="d-flex justify-content-center">
                        <p class="text-xl-center col-xl-6 col-12" style="font-size: 14px; color: #000516A4;">
                            Đội ngũ nhân viên thân thiện của chúng tôi sẽ nhiệt tình giải đáp những thắc mắc của quý khách
                            tại mọi thời điểm
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="container my-5">
        <div class="py-xl-5 py-2 d-flex flex-column align-items-center text-center">
            <h2 class="fs-0 fw-bold">Phân loại</h2>
            <p class="grid-catogory" style="color: #000516A4;">Cửa hàng chuyên cung cấp các sản phẩm thời trang hiện đại của
                các hãng Local
                Brand nổi tiếng tại Việt Nam </p>
        </div>
        <div class="container-fluid p-0 img-category">
            <div class="row g-2">
                <div class="col-xl-3 position-relative" style="height: 31.7em;">
                    <img class="object-fit-contain border rounded w-100 h-100" src="/assets/clients/img/Cate_img/pants.png"
                        alt="">
                    <div class="container-fluid position-absolute" style="top: 88%;">
                        <div class="d-flex flex-row justify-content-between align-items-center">
                            <div class="d-flex flex-column">
                                <h6 style="color: black;" class="fw-regular">Quần
                                </h6>
                                <span style="color: black;">28 Products</span>
                            </div>
                            <div class="ps-5 ms-5">
                                <a href="#">
                                    <i style="color: #5F2D00C9;" class="fa-regular fa-circle-right fa-2xl"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-9">
                    <div class="row g-2">
                        <div class="col-xl-8 position-relative" style="height: 15.625em;">
                            <img class="object-fit-contain border rounded w-100 h-100"
                                src="/assets/clients/img/Cate_img/setofclothes.png" alt="">
                            <div class="container-fluid position-absolute" style="top: 78%;">
                                <div class="d-flex flex-row justify-content-between align-items-center">
                                    <div class="d-flex flex-column">
                                        <h6 style="color: black;" class="fw-regular">Bộ
                                            quần áo
                                        </h6>
                                        <span style="color: black;">28 Products</span>
                                    </div>
                                    <div class="ps-5 ms-5">
                                        <a href="#">
                                            <i style="color: #5F2D00C9;" class="fa-regular fa-circle-right fa-2xl"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 position-relative" style="height: 15.625em;">
                            <img class="object-fit-contain border rounded w-100 h-100"
                                src="/assets/clients/img/Cate_img/assor.png" alt="">
                            <div class="container-fluid position-absolute" style="top: 78%;">
                                <div class="d-flex flex-row justify-content-between align-items-center">
                                    <div class="d-flex flex-column">
                                        <h6 style="color: black;" class="fw-regular">Phụ kiện
                                        </h6>
                                        <span style="color: black;">28 Products</span>
                                    </div>
                                    <div class="ps-5 ms-5">
                                        <a href="#">
                                            <i style="color: #5F2D00C9;" class="fa-regular fa-circle-right fa-2xl"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row g-2 pt-2">
                        <div class="col-xl-4 position-relative" style="height: 15.625em;">
                            <img class="object-fit-contain border rounded w-100 h-100"
                                src="/assets/clients/img/Cate_img/footware.png" alt="">
                            <div class="container-fluid position-absolute" style="top: 78%;">
                                <div class="d-flex flex-row justify-content-between align-items-center">
                                    <div class="d-flex flex-column">
                                        <h6 style="color: black;" class="fw-regular">Giày
                                        </h6>
                                        <span style="color: black;">28 Products</span>
                                    </div>
                                    <div class="ps-5 ms-5">
                                        <a href="#">
                                            <i style="color: #5F2D00C9;" class="fa-regular fa-circle-right fa-2xl"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-xl-8 position-relative" style="height: 15.625em;">
                            <img class="object-fit-contain border rounded w-100 h-100"
                                src="/assets/clients/img/Cate_img/shirt.png" alt="">
                            <div class="container-fluid position-absolute" style="top: 78%;">
                                <div class="d-flex flex-row justify-content-between align-items-center">
                                    <div class="d-flex flex-column">
                                        <h6 style="color: black;" class="fw-regular">Áo
                                        </h6>
                                        <span style="color: black;">28 Products</span>
                                    </div>
                                    <div class="ps-5 ms-5">
                                        <a href="#">
                                            <i style="color: #5F2D00C9;" class="fa-regular fa-circle-right fa-2xl"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    </div>
    <div class="container-fluid" style="background-color:#F7F2EE;">
        <div class="row g-2">
            <div class="col-xl-3 col-6 p-xl-4 p-1">
                <div class="d-flex flex-column justify-content-between align-items-center my-2">
                    <i style="color:#5F2D00C9;" class="fa-solid fa-user-group fs-1"></i>
                    <h3 class="fs-3 py-2" style="font-weight: var(--Medium);">53k</h3>
                    <span class="fs-4" style="color: #797b86;">Khách hàng</span>
                </div>
            </div>
            <div class="col-xl-3 col-6 p-xl-4 p-1">
                <div class="d-flex flex-column justify-content-between align-items-center my-2">
                    <i style="color:#5F2D00C9;" class="fa-solid fa-box-open fs-1"></i>
                    <h3 class="fs-3 py-2" style="font-weight: var(--Medium);">2000</h3>
                    <span class="fs-4" style="color: #797b86;">Sản phẩm</span>
                </div>
            </div>
            <div class="col-xl-3 col-6 p-xl-4 p-1">
                <div class="d-flex flex-column justify-content-between align-items-center my-2">
                    <i style="color:#5F2D00C9;" class="fa-solid fa-briefcase fs-1"></i>
                    <h3 class="fs-3 py-2" style="font-weight: var(--Medium);">25</h3>
                    <span class="fs-4" style="color: #797b86;">Số năm kinh nghiệm</span>
                </div>
            </div>
            <div class="col-xl-3 col-6 p-xl-4 p-1">
                <div class="d-flex flex-column justify-content-between align-items-center my-2">
                    <i style="color:#5F2D00C9;" class="fa-solid fa-heart fs-1"></i>
                    <h3 class="fs-3 py-2" style="font-weight: var(--Medium);">5</h3>
                    <span class="fs-4" style="color: #797b86;">Thương hiệu</span>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid d-flex flex-column align-items-center mt-3">
        <div class="polular-product w-100 d-flex flex-column align-items-center justify-content-center">
            <h2>Sản phẩm của chúng tôi</h2>
            <div class="w-75">
                <p class="mt-2 text-center" style="color: #797b86;">
                </p>
            </div>
        </div>
        <div class="my-xl-5 my-2 w-75 d-flex justify-content-center">
            <form class="d-flex search-popular-products w-75" method="GET" action="{{ route('client.shop-page') }}">
                <input class="w-100 form-control" type="text" name="query" placeholder="Hãy nhập tên của một sản phẩm mà bạn đang tìm kiếm...">
                <button class="border-0" type="submit">
                    <i class="fa-solid fa-magnifying-glass fa-xl"></i>
                </button>
            </form>

        </div>
        <div class="container">
            <div class="row g-2">
                @foreach ($products as $product)
                    <div class="col-xl-3 col-12 position-relative d-flex flex-wrap flex-column align-items-center">
                        <a href="{{ route('client.detail', $product->slug) }}">
                            <img class="img-thumbnail" src="{{ $product->images }}" alt="">
                        </a>
                        <div class="position-absolute top-0 p-3 w-100 end-0">
                            <div class="d-flex align-items-center justify-content-between">
                                <span class="badge text-bg-danger fs-6">- 20%</span>
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
                                <a href="{{ route('client.favorite.index') }}"><i style="border: 0.5px solid var(--primary-800-color); background-color: var(--primary-800-color); color:white"
                                        class="fas fa-heart rounded-5 p-2 fs-5"></i></a>
                                @else
                                    <a href="{{ route('client.favorite.add', $product->id) }}"><i
                                            style="border: 0.5px solid var(--primary-800-color); background-color: white; color:var(--primary-800-color)"
                                            class="fa-regular fa-heart rounded-5 p-2 fs-5"></i></a>
                                @endif
                            </div>
                        </div>
                        <h4 class="pt-1 mt-1">{{ $product->name }}</h4>
                        <p style="font-size: 16px; color:#000516A4; margin: 0;">{{ $product->category->name }}</p>
                        <div class="d-flex">
                            <p style="font-size: var(--font-size); margin: 0;"
                                class="text-decoration-line-through text-danger mx-2">${{ $product->price }}</p>
                            <p style="font-size: var(--font-size); margin: 0; color: black;">${{ $product->sale_price }}
                            </p>
                        </div>
                    </div>
                @endforeach

                {{-- <div class="col-xl-3 col-12 position-relative d-flex flex-wrap flex-column align-items-center">
                    <a href="/"><img class="img-thumbnail" src="/assets/clients/img/Products/Shirt/AoThunOverSizeRetro9AS.jpg" alt=""></a>
                    <div class="position-absolute top-0 p-3 w-100 end-0">
                        <div class="d-flex align-items-center justify-content-between">
                            <span class="badge text-bg-dark fs-6">New</span>
                            <i style="border: 0.5px solid var(--primary-800-color); background-color: white; color:var(--primary-800-color)"
                                class="fa-regular fa-heart rounded-5 p-2 fs-5"></i>
                        </div>
                    </div>
                    <h4 class="pt-1 mt-1">Products Name</h4>
                    <p style="font-size: 16px; color:#000516A4; margin: 0;">Shirt</p>
                    <div class="d-flex">
                        <p style="font-size: var(--font-size); margin: 0; color: black;">$160
                        </p>
                    </div>
                </div>
                <div class="col-xl-3 col-12 position-relative d-flex flex-wrap flex-column align-items-center">
                    <a href="/"><img class="img-thumbnail" src="/assets/clients/img/Products/Shirt/AoThunOverSizeRetro9AS.jpg" alt=""></a>
                    <div class="position-absolute top-0 p-3 w-100 end-0">
                        <div class="d-flex align-items-center justify-content-end">
                            <i style="border: 0.5px solid var(--primary-800-color); background-color: var(--primary-800-color); color:white"
                                class="fas fa-heart rounded-5 p-2 fs-5"></i>
                        </div>
                    </div>
                    <h4 class="pt-1 mt-1">Products Name</h4>
                    <p style="font-size: 16px; color:#000516A4; margin: 0;">Shirt</p>
                    <div class="d-flex">
                        <p style="font-size: var(--font-size); margin: 0; color: black;">$160
                        </p>
                    </div>
                </div>
                <div class="col-xl-3 col-12 position-relative d-flex flex-wrap flex-column align-items-center">
                    <a href="/"><img class="img-thumbnail" src="/assets/clients/img/Products/Shirt/AoThunOverSizeRetro9AS.jpg" alt=""></a>
                    <div class="position-absolute top-0 p-3 w-100 end-0">
                        <div class="d-flex align-items-center justify-content-end">
                            <i style="border: 0.5px solid var(--primary-800-color); background-color: white; color:var(--primary-800-color)"
                                class="fa-regular fa-heart rounded-5 p-2 fs-5"></i>
                        </div>
                    </div>
                    <h4 class="pt-1 mt-1">Products Name</h4>
                    <p style="font-size: 16px; color:#000516A4; margin: 0;">Shirt</p>
                    <div class="d-flex">
                        <p style="font-size: var(--font-size); margin: 0; color: var(--primary-1200-color);">$160
                        </p>
                    </div>
                </div>
                <div class="col-xl-3 col-12 position-relative d-flex flex-wrap flex-column align-items-center">
                    <a href="/"><img class="img-thumbnail" src="/assets/clients/img/Products/Shirt/AoThunOverSizeRetro9AS.jpg" alt=""></a>
                    <div class="position-absolute top-0 p-3 w-100 end-0">
                        <div class="d-flex align-items-center justify-content-between">
                            <span class="badge text-bg-danger fs-6">- 20%</span>
                            <i style="border: 0.5px solid var(--primary-800-color); background-color: white; color:var(--primary-800-color)"
                                class="fa-regular fa-heart rounded-5 p-2 fs-5"></i>
                        </div>
                    </div>
                    <h4 class="pt-1 mt-1">Products Name</h4>
                    <p style="font-size: 16px; color:#000516A4; margin: 0;">Shirt</p>
                    <div class="d-flex">
                        <p style="font-size: var(--font-size); margin: 0;"
                            class="text-decoration-line-through text-danger mx-2">$200</p>
                        <p style="font-size: var(--font-size); margin: 0; color: var(--primary-1200-color);">$160
                        </p>
                    </div>
                </div>
                <div class="col-xl-3 col-12 position-relative d-flex flex-wrap flex-column align-items-center">
                    <a href="/"><img class="img-thumbnail" src="/assets/clients/img/Products/Shirt/AoThunOverSizeRetro9AS.jpg" alt=""></a>
                    <div class="position-absolute top-0 p-3 w-100 end-0">
                        <div class="d-flex align-items-center justify-content-between">
                            <span class="badge text-bg-dark fs-6">New</span>
                            <i style="border: 0.5px solid var(--primary-800-color); background-color: white; color:var(--primary-800-color)"
                                class="fa-regular fa-heart rounded-5 p-2 fs-5"></i>
                        </div>
                    </div>
                    <h4 class="pt-1 mt-1">Products Name</h4>
                    <p style="font-size: 16px; color:#000516A4; margin: 0;">Shirt</p>
                    <div class="d-flex">
                        <p style="font-size: var(--font-size); margin: 0; color: var(--primary-1200-color);">$160
                        </p>
                    </div>
                </div>
                <div class="col-xl-3 col-12 position-relative d-flex flex-wrap flex-column align-items-center">
                    <a href="/"><img class="img-thumbnail" src="/assets/clients/img/Products/Shirt/AoThunOverSizeRetro9AS.jpg" alt=""></a>
                    <div class="position-absolute top-0 p-3 w-100 end-0">
                        <div class="d-flex align-items-center justify-content-end">
                            <i style="border: 0.5px solid var(--primary-800-color); background-color: var(--primary-800-color); color:white"
                                class="fas fa-heart rounded-5 p-2 fs-5"></i>
                        </div>
                    </div>
                    <h4 class="pt-1 mt-1">Products Name</h4>
                    <p style="font-size: 16px; color:#000516A4; margin: 0;">Shirt</p>
                    <div class="d-flex">
                        <p style="font-size: var(--font-size); margin: 0; color: var(--primary-1200-color);">$160
                        </p>
                    </div>
                </div>
                <div class="col-xl-3 col-12 position-relative d-flex flex-wrap flex-column align-items-center">
                    <a href="/"><img class="img-thumbnail" src="/assets/clients/img/Products/Shirt/AoThunOverSizeRetro9AS.jpg" alt=""></a>
                    <div class="position-absolute top-0 p-3 w-100 end-0">
                        <div class="d-flex align-items-center justify-content-end">
                            <i style="border: 0.5px solid var(--primary-800-color); background-color: white; color:var(--primary-800-color)"
                                class="fa-regular fa-heart rounded-5 p-2 fs-5"></i>
                        </div>
                    </div>
                    <h4 class="pt-1 mt-1">Products Name</h4>
                    <p style="font-size: 16px; color:#000516A4; margin: 0;">Shirt</p>
                    <div class="d-flex">
                        <p style="font-size: var(--font-size); margin: 0; color: var(--primary-1200-color);">$160
                        </p>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
    <div class="container-fluid px-4 mt-5 logo-brand">
        <div class="row g-2 px-5 d-flex justify-content-between align-items-center">
            @foreach ($bannerbots as $bannerbot)
                <span class="col-lg-2 text-center">
                    <img class="w-75" src="{{ $bannerbot->image }}" alt="">
                </span>
            @endforeach
        </div>
    </div>
@endsection

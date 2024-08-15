@extends('layouts.client')
@section('content')
    @include('client.blocks.banner')
    <section class="container">
        <div class="my-5">
            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
                aria-label="breadcrumb">
                <ol class="breadcrumb align-items-center d-flex">
                    <li class="breadcrumb-item "><a href="/" style="color: var(--primary-900-color);">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('client.shop-page') }}"
                            style="color: var(--primary-900-color);">Shop</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Detail: {{ $product->name }}</li>
                </ol>
            </nav>
            <h3>{{ $product->name }}</h3>
            <hr style="color:black;">
        </div>
    </section>
    <!-- Item Detail -->
    <section class="container">
        <div class="row g-xl-5">
            <div class="col-12 col-xl-5 d-flex justify-content-center">
                <div class="row w-100">
                    <div class="container p-0 position-relative mb-3">
                        <div class="container position-absolute top-50">
                            <div class="d-flex flex-row justify-content-between mx-4">
                                <i id="prevButton" class="fa-solid fa-arrow-left fa-fw fs-3"
                                    style="color: var(--primary-1200-color); cursor: pointer;"></i>
                                <i id="nextButton" class="fa-solid fa-arrow-right fa-fw fs-3"
                                    style="color: var(--primary-1200-color); cursor: pointer;"></i>
                            </div>
                        </div>
                        <img class="w-100" id="mainImage" src="{{ $product->images }}" alt="">
                    </div>
                    <div class="container-fluid p-0">
                        <div class="row h-50">
                            @foreach ($product->gallery as $item)
                                <div class="col h-75">
                                    <img class="img-fluid thumbnail h-100" src="{{ $item->name }}" alt="">
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-xl-7 my-5">
                <div class="column w-100">
                    <!-- Price Products -->
                    <div class="d-flex flex-row justify-content-between">
                        <div class="d-flex flex-row">
                            @if ($product->sale_price > 0)
                                <h5 id="sale_price" class="text-danger pe-3">
                                    {{ number_format($product->sale_price, 0, ',', ',') }} VND
                                </h5>
                                <h5 class="text-secondary text-decoration-line-through" id="price">
                                    {{ number_format($product->price, 0, ',', ',') }} VND
                                </h5>
                            @else
                                <h5 id="price">
                                    {{ number_format($product->price, 0, ',', ',') }} VND
                                </h5>
                            @endif
                        </div>
                        <h5>SKU: PTN{{ $product->id }}</h5>
                    </div>

                    <!-- Reviews -->
                    <div class="d-flex flex-row align-items-center">
                        <div class="row ps-2 reviews-detail">
                            <img src="/assets/clients/img/Icon/Star 1.png" alt="">
                            <img src="/assets/clients/img/Icon/Star 1.png" alt="">
                            <img src="/assets/clients/img/Icon/Star 1.png" alt="">
                            <img src="/assets/clients/img/Icon/Star 1.png" alt="">
                            <img src="/assets/clients/img/Icon/Star 1.png" alt="">
                        </div>
                        <p class="m-0 px-3" style="color: var(--secondary-1000-color);">({{ $reviewCount }} reviews)</p>
                    </div>
                    <!-- Color Products -->
                    <form action="{{ route('client.cart-page.add', $product->id) }}" method="POST">
                        @csrf
                        <div class="py-3">
                            <h5 class="py-1" style="font-weight: var(--Medium);">Color
                            </h5>
                            <div>

                                @foreach ($uniqueColors as $index => $color)
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input color-radio" type="radio" name="color_id"
                                            id="color_{{ $color->id }}" value="{{ $color->id }}"
                                            data-price="{{ $color->price }}" data-sale-price="{{ $color->sale_price }}"
                                            {{ $index == 0 ? 'checked' : '' }}>
                                        <label class="form-check-label fs-5"
                                            for="color_{{ $color->id }}">{{ $color->name }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <!-- Size Products -->
                        <div>
                            <h5 style="font-weight: var(--Medium);">Select Size</h5>
                            <div class="py-3 d-flex justify-content-between" style="width: fit-content;">
                                @foreach ($product->productDetails as $index => $detail)
                                    <div class="form-check form-check-inline size-option p-0"
                                        data-color-id="{{ $detail->color_id }}" data-quantity="{{ $detail->quantity }}">
                                        <input class="form-check-input size-radio visually-hidden" type="radio"
                                            name="size_id" id="size_{{ $detail->size_id }}" value="{{ $detail->size_id }}"
                                            data-price="{{ $detail->price }}" data-sale-price="{{ $detail->sale_price }}"
                                            {{ $index == 0 ? 'checked' : '' }}>
                                        <label class="form-check-label fs-5 size-label"
                                            for="size_{{ $detail->size_id }}">{{ $detail->size->name }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Add to card -->
                        <div class="container">
                            <div class="row g-3">
                                <input id="quantityInput" class="px-xl-2 col-2 col-xl-1" type="number" name="quantity"
                                    min="1" value="1">
                                <div class=" col-6 col-xl-4 d-flex align-items-center justify-content-center">
                                    <button class="btn btn-dark p-2" type="submit"><i
                                            class="fa-solid fa-cart-shopping me-2 "></i>Thêm giỏ
                                        hàng</button>
                                </div>
                                <div class="col-xl-3 col-4">
                                    <a class="btn btn-danger p-2 d-flex align-items-center justify-content-center">
                                        <i class="fa-regular fs-5 fa-heart"></i>
                                        <p class="m-0 px-1" style="font-size:18px">Yêu thích</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="my-3">
                    <p style="font-weight: var(--Medium);color:rgba(255, 0, 0, 0.453)">Tồn kho: <span
                            id="stockQuantity"></span></p>

                </div>
                <!-- Description -->
                <div class="my-3">
                    <h5 style="font-weight: var(--Medium);">Summary: </h5>
                    {!! $product->summary !!}
                </div>
                <!-- share & Tags -->
                <div class="d-flex flex-row w-100">
                    <div class="ps-3 d-flex align-items-center me-4">
                        <h6 class="me-3">Share: </h6>
                        <div class="d-flex justify-content-between">
                            <div class="icon-footer">
                                <i class="fa-brands fa-facebook-f "></i>
                            </div>
                            <div class="icon-footer mx-2">
                                <i class="fa-brands fa-instagram"></i>
                            </div>
                            <div class="icon-footer">
                                <i class="fa-brands fa-youtube"></i>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex flex-row">
                        <h6>Tags: </h6>
                        <div class="d-flex">
                            @foreach ($product->tags as $tag)
                                <a class="mx-2 text-dark" href="#">{{ $tag->name }}</a>
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    <!-- Comment & Review -->
    <section class="container">
        <div class="product-detail-tab wow fadeInUp" data-wow-delay="0.4s">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 py-5">
                        <ul class="mt-tabs p-0 text-center text-uppercase d-flex justify-content-center">
                            <li class="nav-link me-3"><a class="nav-link item-detail fs-5" href="#tab1"
                                    class="active">DESCRIPTION</a></li>
                            <li class="nav-link"><a class="nav-link item-detail fs-5" href="#tab3">REVIEWS
                                    ({{ $reviewCount }})</a>
                            </li>
                        </ul>
                        <hr>
                        <div class="tab-content">
                            <div id="tab1" class="tab-pane active">
                                <p>{!! $product->description !!}</p>
                            </div>
                            <div id="tab3" class="tab-pane">
                                <div class="product-comment">
                                    <div id="reviews">
                                        @include('client.pages.partials.reviews')
                                    </div>
                                    @if (!$userReview)
                                        <form action="{{ route('client.review', $product->slug) }}" method="POST"
                                            class="p-commentform" id="formRating">
                                            @csrf
                                            <fieldset>
                                                <h2 class="fs-4 fw-semibold py-2">Đánh giá</h2>
                                                <p class="stars">
                                                    <span>
                                                        <a class="star-1" href="#" data-rating="1">1</a>
                                                        <a class="star-2" href="#" data-rating="2">2</a>
                                                        <a class="star-3" href="#" data-rating="3">3</a>
                                                        <a class="star-4" href="#" data-rating="4">4</a>
                                                        <a class="star-5" href="#" data-rating="5">5</a>
                                                    </span>
                                                </p>
                                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                <input type="hidden" name="rating_point" id="rating_point"
                                                    value="">
                                                <input type="hidden" name="product_detail_id"
                                                    value="{{ $product->productDetails->first()->id }}">
                                                <div class="d-flex justify-content-between">
                                                    <label class="col-xl-1 col-12 fs-5"></label>
                                                    <textarea name="reviews" id="reviews" class="w-100 rounded-2 p-1" style="height: 10rem; border-color: gray;"></textarea>
                                                </div>
                                                <div class="w-25 text-center pe-xl-2">
                                                    <button type="button"
                                                        class="btn border my-2 me-xl-5 shadow-sm mb-5 rounded btn-dark"
                                                        id="submitReview">Gửi</button>
                                                </div>
                                            </fieldset>
                                        </form>
                                    @else
                                        <div class="alert alert-info" role="alert">
                                            Bạn đã đánh giá sản phẩm này trước đó.
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Related Product  -->
    <section class="container">
        <h2 style="font-weight: var(--Medium);" class="text-center my-5 fs-1">Sản phẩm liên quan</h2>
        <div class="container mb-5">
            <div class="row position-relative">
                @foreach ($relatedProducts as $product)
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
                                    <a class="nav-link mx-3" href="{{ route('client.favorite.add', $product->id) }}"><i
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
        </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const priceElement = document.getElementById('price');
            const salePriceElement = document.getElementById('sale_price');
            const colorRadios = document.querySelectorAll('.color-radio');
            const sizeOptions = document.querySelectorAll('.size-option');
            const stockQuantityElement = document.getElementById('stockQuantity');
            const quantityInput = document.getElementById('quantityInput');

            // Hàm cập nhật giá và hiển thị các kích cỡ tương ứng với màu sắc chọn
            const updatePricesAndSizes = (colorId) => {
                const selectedColorRadio = document.querySelector(`.color-radio[value="${colorId}"]`);
                const selectedColorPrice = selectedColorRadio.getAttribute('data-price');
                const selectedColorSalePrice = selectedColorRadio.getAttribute('data-sale-price');

                // Định dạng giá thành VND với dấu phân cách hàng nghìn
                const formattedPrice = Number(selectedColorPrice).toLocaleString('vi-VN') + ' VND';
                const formattedSalePrice = selectedColorSalePrice ? Number(selectedColorSalePrice)
                    .toLocaleString('vi-VN') + ' VND' : '';

                // Cập nhật nội dung phần tử HTML
                priceElement.textContent = formattedPrice;
                salePriceElement.textContent = formattedSalePrice;


                let hasVisibleSize = false;

                sizeOptions.forEach(option => {
                    const optionColorId = option.getAttribute('data-color-id');
                    const quantity = option.getAttribute('data-quantity');

                    if (optionColorId === colorId || optionColorId === "all") {
                        option.style.display = quantity > 0 ? 'inline-block' : 'none';
                        if (quantity > 0) {
                            hasVisibleSize = true;
                        }
                    } else {
                        option.style.display = 'none';
                    }
                });

                if (!hasVisibleSize) {
                    stockQuantityElement.textContent = '0';
                    quantityInput.max = 0;
                }
            };

            // Hàm cập nhật số lượng tồn kho khi thay đổi kích cỡ
            const updateStockQuantity = (quantity) => {
                stockQuantityElement.textContent = quantity;
                quantityInput.max = quantity; // Cập nhật thuộc tính max của input số lượng
            };

            // Xử lý sự thay đổi của màu sắc
            colorRadios.forEach(radio => {
                radio.addEventListener('change', function() {
                    const selectedColorId = this.value;
                    updatePricesAndSizes(selectedColorId);

                    // Đặt trạng thái kích cỡ đầu tiên hiển thị (nếu có)
                    const firstVisibleSizeOption = document.querySelector(
                        '.size-option[style="display: inline-block;"] input.size-radio');
                    if (firstVisibleSizeOption) {
                        firstVisibleSizeOption.checked = true;
                        firstVisibleSizeOption.dispatchEvent(new Event('change'));
                    } else {
                        // Không có kích cỡ hiển thị, đặt số lượng tồn kho về 0
                        stockQuantityElement.textContent = '0';
                        quantityInput.max = 0;
                    }
                });
            });

            // Xử lý sự thay đổi của kích cỡ
            sizeOptions.forEach(option => {
                option.querySelector('input.size-radio').addEventListener('change', function() {
                    const selectedSizeQuantity = this.closest('.size-option').getAttribute(
                        'data-quantity');
                    updateStockQuantity(selectedSizeQuantity);
                });
            });

            // Kích hoạt sự kiện thay đổi trên màu sắc đầu tiên khi trang tải
            if (colorRadios.length > 0) {
                colorRadios[0].dispatchEvent(new Event('change'));
            }
        });
    </script>
    <script>
        $(document).ready(function() {
            // Xử lý sự kiện khi người dùng gửi đánh giá
            $('#submitReview').on('click', function(e) {
                e.preventDefault();

                var formData = $('#formRating').serialize();

                $.ajax({
                    url: "{{ route('client.review', $product->slug) }}",
                    type: "POST",
                    data: formData,
                    dataType: "json",
                    success: function(response) {
                        console.log(response.message);
                        fetchReviews
                            (); // Sau khi gửi thành công, cập nhật lại danh sách đánh giá
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                        // Xử lý lỗi nếu cần
                    }
                });
            });

            // Hàm AJAX để lấy danh sách đánh giá
            function fetchReviews() {
                $.ajax({
                    url: "{{ route('client.reviews', $product->slug) }}",
                    type: "GET",
                    dataType: "html",
                    success: function(response) {
                        $('#reviews').html(response); // Cập nhật nội dung danh sách đánh giá
                        $('#formRating')[0].reset(); // Xóa nội dung form sau khi gửi thành công
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                        // Xử lý lỗi nếu cần
                    }
                });
            }

            // Gọi hàm fetchReviews khi trang được tải
            fetchReviews();

            // Xử lý chọn số sao
            $('.stars a').on('click', function(e) {
                e.preventDefault();
                $('.stars span, .stars a').removeClass('active');

                $(this).addClass('active').prevAll().addClass('active');
                $(this).find('span').addClass('active');

                $('#rating_point').val($(this).attr('data-rating'));
            });
        });
    </script>
@endsection

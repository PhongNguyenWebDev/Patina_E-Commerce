@extends('layouts.client')
@section('content')
    <section class="container">
        <div class="my-5">
            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
                aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item fs-4"><a href="/" style="color: var(--primary-900-color);">Home</a></li>
                    <li class="breadcrumb-item fs-4"><a href="{{ route('client.shop-page') }}"
                            style="color: var(--primary-900-color);">Shop</a></li>
                    <li class="breadcrumb-item active fs-4" aria-current="page">Detail: {{ $product->name }}</li>
                </ol>
            </nav>
            <h1>{{ $product->name }}</h1>
            <hr style="color: orange;">
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
                    <div class="d-flex flex-row justify-content-between p-0">
                        @foreach ($product->gallery as $item)
                            <img class="img-thumbnail thumbnail w-25 h-75"
                            src="{{ $item->name }}" alt="">
                        @endforeach
                       
                    </div>
                </div>
            </div>
            <div class="col-12 col-xl-7">
                <div class="column w-100">
                    <!-- Price Products -->
                    <div class="d-flex flex-row justify-content-between">
                        <div class="d-flex flex-row">
                            <p id="sale_price" class="text-danger fs-3 pe-3">
                                ${{ number_format($product->sale_price) ? number_format($product->sale_price) : number_format($product->price) }}
                            </p>
                            <p id="price" class="fs-3 text-decoration-line-through"
                                style="color: var(--primary-1000-color);">
                                ${{ number_format($product->sale_price) ? number_format($product->price) : null }}</p>
                        </div>
                        <p class="fs-3">SKU: PTN{{ $product->id }}</p>
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
                        <p class="m-0 px-3" style="color: var(--secondary-1000-color);">(12 reviews)</p>
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
                                        <label class="form-check-label fs-5 fw-medium"
                                            for="color_{{ $color->id }}">{{ $color->name }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <!-- Size Products -->
                        <div>
                            <h5 style="font-weight: var(--Medium);">Select Size</h5>
                            <div class="py-3 d-flex justify-content-between" style="width: 16rem;">
                                @foreach ($product->productDetails as $index => $detail)
                                    <div class="form-check form-check-inline size-option"
                                        data-color-id="{{ $detail->color_id }}" data-quantity="{{ $detail->quantity }}">
                                        <input class="form-check-input size-radio" type="radio" name="size_id"
                                            id="size_{{ $detail->size_id }}" value="{{ $detail->size_id }}"
                                            data-price="{{ $detail->price }}" data-sale-price="{{ $detail->sale_price }}" {{ $index == 0 ? 'checked' : '' }}>
                                        <label class="form-check-label fs-5 fw-medium"
                                            for="size_{{ $detail->size_id }}">{{ $detail->size->name }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <!-- Add to card -->
                        <div class="container">
                            <div class="row g-3">
                                <input class="px-xl-2 col-2 col-xl-1" type="number" name="quantity" min="1"
                                    value="1">
                                <div class=" col-6 col-xl-4 d-flex align-items-center justify-content-center">
                                    <button style="background-color:#8D6440;"
                                        class="btn h-100 fs-5 d-flex align-items-center justify-content-center text-white"
                                        type="submit"><i class="fa-solid fa-cart-shopping me-2 "></i>Thêm giỏ
                                        hàng</button>
                                </div>
                                <div class="col-xl-3 col-4">
                                    <a class="btn favourite d-flex align-items-center justify-content-center w-100 h-100">
                                        <i class="fa-regular fs-5 fa-heart"></i>
                                        <p class="m-0 px-1 fs-5">Yêu thích</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </form>
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
                            <li class="nav-link"><a class="nav-link item-detail fs-5" href="#tab1"
                                    class="active">DESCRIPTION</a></li>
                            <li class="nav-link px-xl-5 px-2"><a class="nav-link item-detail fs-5"
                                    href="#tab2">INFORMATION</a>
                            </li>
                            <li class="nav-link"><a class="nav-link item-detail fs-5" href="#tab3">REVIEWS (12)</a>
                            </li>
                        </ul>
                        <hr>
                        <div class="tab-content">
                            <div id="tab1" class="tab-pane active">
                                <p>Koila is a chair designed for restaurants and food lovers in general...</p>
                            </div>
                            <div id="tab2" class="tab-pane">
                                <p>Koila is a seat designed for restaurants and gastronomic places in general...</p>
                            </div>
                            <div id="tab3" class="tab-pane">
                                <div class="product-comment">
                                    @foreach ($reviews as $review)
                                        <div class="mt-box">
                                            <div class="d-flex">
                                                <div class="rounded-circle border d-flex justify-content-center align-items-center mx-2"
                                                    style="width: 75px; height: 75px;">
                                                    <i class="fa-regular fa-user"></i>
                                                </div>
                                                <div class="column">
                                                    <span class="fs-4">{{ $review->user->name }}</span>
                                                    <ul class="m-0 p-0 d-flex">
                                                        @for ($i = 1; $i <= 5; $i++)
                                                            @if ($i <= $review->rating_point)
                                                                <li class="nav-link"><i
                                                                        class="fa fa-star text-warning"></i></li>
                                                            @else
                                                                <li class="nav-link"><i
                                                                        class="fa fa-star-o text-warning"></i></li>
                                                            @endif
                                                        @endfor
                                                    </ul>
                                                    <time
                                                        datetime="{{ $review->created_at }}">{{ $review->created_at->format('H:i M, d Y') }}</time>
                                                    <p class="pt-3">{{ $review->reviews }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                    <form action="{{ route('client.review', $product->slug) }}" method="POST"
                                        class="p-commentform" id="formRating">
                                        @csrf
                                        <fieldset>
                                            <h2 class="fs-4 fw-semibold py-2">Bình luận</h2>
                                            <p class="stars">
                                                <span>
                                                    <a class="star-1" href="#" data-rating="1">1</a>
                                                    <a class="star-2" href="#" data-rating="2">2</a>
                                                    <a class="star-3" href="#" data-rating="3">3</a>
                                                    <a class="star-4" href="#" data-rating="4">4</a>
                                                    <a class="star-5" href="#" data-rating="5">5</a>
                                                </span>
                                            </p>
                                            <input type="hidden" name="rating_point" id="rating_point" value="">
                                            <input type="hidden" name="product_detail_id"
                                                value="{{ $product->productDetails->first()->id }}">
                                            <div class="d-flex justify-content-between">
                                                <label class="col-xl-1 col-12 fs-5">Bình luận</label>
                                                <textarea name="reviews" id="reviews" class="w-100 rounded-2 p-1" style="height: 10rem; border-color: gray;"></textarea>
                                            </div>
                                            <div class="w-25 text-center pe-xl-2">
                                                <button type="button"
                                                    class="btn border fs-5 my-2 me-xl-5 shadow-sm mb-5 rounded btn-comment"
                                                    id="submitReview">Gửi</button>
                                            </div>
                                        </fieldset>
                                    </form>

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
        <div class="row g-2">
            @foreach ($relatedProducts as $relatedProduct)
                <a href="{{ route('client.detail', $relatedProduct->slug) }}"
                    class="text-decoration-none text-black col-xl-3 col-12 position-relative d-flex flex-wrap flex-column align-items-center">
                    <img class="img-thumbnail" src="{{ $relatedProduct->images }}" alt="">
                    <div class="position-absolute top-0 p-3 w-100 end-0">
                        <div class="d-flex align-items-center justify-content-between">
                            <span class="badge text-bg-danger fs-6">- 20%</span>
                            <i style="border: 0.5px solid var(--primary-800-color); background-color: white; color:var(--primary-800-color)"
                                class="fa-regular fa-heart rounded-5 p-2 fs-5"></i>
                        </div>
                    </div>
                    <h4 class="pt-1 mt-1 fs-5">{{ $relatedProduct->name }}</h4>
                    <p style="font-size: 16px; color:#000516A4; margin: 0;">{{ $relatedProduct->category->name }}</p>
                    <div class="d-flex">
                        <p style="font-size: var(--font-size); margin: 0;"
                            class="text-decoration-line-through text-danger mx-2">${{ $relatedProduct->price }}</p>
                        <p style="font-size: var(--font-size); margin: 0; color: black;">
                            ${{ $relatedProduct->sale_price }}
                        </p>
                    </div>
                </a>
            @endforeach
        </div>
    </section>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const priceElement = document.getElementById('price');
            const salePriceElement = document.getElementById('sale_price');
            const colorRadios = document.querySelectorAll('.color-radio');
            const sizeOptions = document.querySelectorAll('.size-option');

            // Show all sizes initially
            sizeOptions.forEach(option => {
                option.style.display = 'inline-block';
            });

            // Function to handle color change
            const handleColorChange = function() {
                const selectedColorPrice = this.getAttribute('data-price');
                const selectedColorSalePrice = this.getAttribute('data-sale-price');
                const selectedColorId = this.value;

                priceElement.textContent = `$${selectedColorPrice}`;
                salePriceElement.textContent = `$${selectedColorSalePrice}`;

                sizeOptions.forEach(option => {
                    const colorId = option.getAttribute('data-color-id');
                    const quantity = option.getAttribute('data-quantity');

                    if (colorId === selectedColorId || colorId === "all") {
                        if (quantity > 0) {
                            option.style.display = 'inline-block';
                        } else {
                            option.style.display = 'none';
                        }
                    } else {
                        option.style.display = 'none';
                    }
                });
            };

            // Attach change event listeners to color radios
            colorRadios.forEach(radio => {
                radio.addEventListener('change', handleColorChange);
            });

            // Automatically trigger change event on the first color radio
            if (colorRadios.length > 0) {
                colorRadios[0].dispatchEvent(new Event('change'));
            }
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
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
                        // Xử lý phản hồi thành công ở đây nếu cần
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                        // Xử lý lỗi ở đây nếu cần
                    }
                });
            });

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

@extends('layouts.client')
@section('content')
    @include('client.blocks.banner')
    <section class="container">
        <div class="my-5">
            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
                aria-label="breadcrumb">
                <ol class="breadcrumb align-items-center d-flex">
                    <li class="breadcrumb-item "><a href="/" style="color: var(--primary-900-color);">Trang chủ</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('client.shop-page') }}"
                            style="color: var(--primary-900-color);">Cửa hàng</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Chi tiết: {{ $product->name }}</li>
                </ol>
            </nav>
            <h3>{{ $product->name }}</h3>
            <hr style="color:black;">
        </div>
    </section>
    <!-- Item Detail -->
    <section class="container">
        <div class="row g-xl-5 my-1">
            <div class="col-12 col-xl-5 d-flex justify-content-center my-xl-0 my-2">
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
                        <div class="row">
                            @foreach ($product->gallery as $item)
                                <div class="col-3 col-md-3 col-lg-3">
                                    <img class="img-fluid thumbnail" src="{{ $item->name }}" alt="">
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-xl-7 my-xl-5 my-2">
                <div class="column w-100">
                    <!-- Price Products -->
                    <div class="d-flex flex-row justify-content-between">
                        <div class="d-flex flex-row align-items-center">
                            <h5 id="price"
                                class="{{ $product->sale_price > 0 ? 'text-danger pe-3 text-decoration-line-through' : '' }}">
                                {{ number_format($product->price, 0, ',', ',') }} VND
                            </h5>
                            <h5 class="text-secondary" id="sale_price">
                                {{ $product->sale_price > 0 ? number_format($product->sale_price, 0, ',', ',') . ' VND' : '' }}
                            </h5>
                        </div>
                        <h5>SKU: PTN{{ $product->id }}</h5>
                    </div>

                    <!-- Reviews -->
                    <div class="d-flex flex-row align-items-center">
                        <p class="stars">
                            <span>
                                <a class="star" href="#" data-rating="1"></a>
                                <a class="star" href="#" data-rating="2"></a>
                                <a class="star" href="#" data-rating="3"></a>
                                <a class="star" href="#" data-rating="4"></a>
                                <a class="star" href="#" data-rating="5"></a>
                            </span>
                        </p>
                        <p class="m-0 px-3" style="color: var(--secondary-1000-color);">
                            (<span id="averageRating">{{ $roundedAverageRating }}</span> / 5 từ {{ $reviewCount }} đánh
                            giá)
                        </p>
                    </div>
                    <!-- Color Products -->
                    <form action="{{ route('client.cart-page.add', $product->id) }}" method="POST">
                        @csrf
                        <div class="py-3">
                            <h5 class="py-1" style="font-weight: var(--Medium);">Chọn màu
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
                            <h5 style="font-weight: var(--Medium);">Chọn kích cỡ</h5>
                            <div class="py-3 d-flex justify-content-between" style="width: fit-content;">
                                @foreach ($product->productDetails as $index => $detail)
                                    <div class="form-check form-check-inline size-option p-0"
                                        data-color-id="{{ $detail->color_id }}" data-quantity="{{ $detail->quantity }}">
                                        <input class="form-check-input visually-hidden size-radio" type="radio"
                                            name="size_id" id="{{ $detail->color_id }}_size_{{ $detail->size_id }}"
                                            value="{{ $detail->size_id }}" data-price="{{ $detail->price }}"
                                            data-sale-price="{{ $detail->sale_price }}"
                                            {{ $index == 0 ? 'checked' : '' }}>
                                        <label class="form-check-label fs-5 size-label"
                                            for="{{ $detail->color_id }}_size_{{ $detail->size_id }}">{{ $detail->size->name }}</label>
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
                    <h5 style="font-weight: var(--Medium);">Mô tả ngắn: </h5>
                    {!! $product->summary !!}
                </div>
                <!-- share & Tags -->
                <div class="d-flex flex-row w-100">
                    <div class="d-flex align-items-center me-4">
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
                            <li class="nav-link me-3"><a class="nav-link item-detail fs-5 active" href="#tab1">Mô
                                    tả</a></li>
                            <li class="nav-link"><a class="nav-link item-detail fs-5" href="#tab3">Đánh giá
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
                                    <form action="{{ route('client.review', $product->slug) }}" method="POST"
                                        class="p-commentform" id="formRating">
                                        @csrf
                                        <fieldset>
                                            <h2 class="fs-4 fw-semibold py-2">Đánh giá</h2>
                                            <p class="stars">
                                                <span>
                                                    <a class="star-1" href="#" data-rating="1"></a>
                                                    <a class="star-2" href="#" data-rating="2"></a>
                                                    <a class="star-3" href="#" data-rating="3"></a>
                                                    <a class="star-4" href="#" data-rating="4"></a>
                                                    <a class="star-5" href="#" data-rating="5"></a>
                                                </span>
                                            </p>
                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                            <input type="hidden" name="rating_point" id="rating_point" value="">
                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                            <div class="form-floating">
                                                <label class="col-xl-1 col-12 fs-5"></label>
                                                <textarea name="reviews" id="content-review" class="form-control float-end" style=""></textarea>
                                                <div class="my-2 text-start float-end btn-review">
                                                    <button type="submit" class="btn btn-dark"
                                                        id="submitReview">Gửi</button>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </form>
                                    <div id="review-message" class="alert" style="display: none;"></div>

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
        <h2 class="text-center my-xl-4 my-2">Sản phẩm liên quan</h2>
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
            const colorRadios = document.querySelectorAll('.color-radio');
            const sizeOptions = document.querySelectorAll('.size-option');
            const stockQuantityElement = document.querySelector('#stockQuantity');
            const priceElement = document.querySelector('#price');
            const salePriceElement = document.querySelector('#sale_price');

            // Hàm cập nhật kích cỡ và tồn kho khi chọn màu
            const updateSizesForColor = (colorId) => {
                let firstVisibleSizeOption = null;

                sizeOptions.forEach(option => {
                    const optionColorId = option.getAttribute('data-color-id');
                    const quantity = parseInt(option.getAttribute('data-quantity'), 10);

                    // Chỉ hiển thị các kích cỡ thuộc màu đang chọn và có tồn kho > 0
                    if (optionColorId === colorId && quantity > 0) {
                        option.style.display = 'block'; // Hiển thị kích cỡ
                        if (!firstVisibleSizeOption) {
                            firstVisibleSizeOption = option;
                        }
                    } else {
                        option.style.display = 'none'; // Ẩn kích cỡ không phù hợp hoặc tồn kho bằng 0
                    }
                });

                // Nếu có kích cỡ hợp lệ, chọn kích cỡ đầu tiên
                if (firstVisibleSizeOption) {
                    const sizeInput = firstVisibleSizeOption.querySelector('input.size-radio');
                    if (sizeInput) {
                        sizeInput.checked = true;
                        updateStockQuantity(sizeInput.value, colorId); // Cập nhật tồn kho cho kích cỡ đầu tiên
                    }
                } else {
                    stockQuantityElement.textContent =
                        '0'; // Không có kích cỡ nào hợp lệ, đặt số lượng tồn kho là 0
                }
            };

            // Hàm cập nhật tồn kho khi chọn kích cỡ
            const updateStockQuantity = (sizeId, colorId) => {
                let quantity = '0';
                sizeOptions.forEach(option => {
                    const optionColorId = option.getAttribute('data-color-id');
                    const optionSizeId = option.querySelector('input.size-radio').value;

                    if (optionColorId === colorId && optionSizeId === sizeId) {
                        quantity = option.getAttribute('data-quantity');
                    }
                });

                stockQuantityElement.textContent = quantity;
            };

            // Hàm cập nhật giá theo màu sắc
            const updatePriceForColor = (colorId) => {
                const selectedColor = Array.from(colorRadios).find(radio => radio.value == colorId);
                const price = selectedColor.getAttribute('data-price');
                const salePrice = selectedColor.getAttribute('data-sale-price');

                if (salePrice > 0 ) {
                    priceElement.classList.add('text-decoration-line-through');
                    priceElement.textContent = numberFormat(price) + ' VND';
                    salePriceElement.textContent = numberFormat(salePrice) + ' VND';
                } else {
                    priceElement.classList.remove('text-decoration-line-through');
                    priceElement.textContent = numberFormat(price) + ' VND';
                    salePriceElement.textContent = '';
                }
            };

            // Xử lý khi màu được chọn
            colorRadios.forEach(radio => {
                radio.addEventListener('change', function() {
                    const selectedColorId = this.value;
                    updateSizesForColor(selectedColorId);
                    updatePriceForColor(selectedColorId); // Cập nhật giá khi chọn màu
                });
            });

            // Xử lý khi kích cỡ được chọn
            sizeOptions.forEach(option => {
                const sizeInput = option.querySelector('input.size-radio');
                if (sizeInput) {
                    sizeInput.addEventListener('change', function() {
                        const selectedColorId = document.querySelector('.color-radio:checked')
                        .value;
                        updateStockQuantity(this.value, selectedColorId);
                    });
                }
            });

            // Kích hoạt sự kiện chọn màu đầu tiên khi trang tải
            if (colorRadios.length > 0) {
                colorRadios[0].dispatchEvent(new Event('change'));
            }

            // Hàm format số
            function numberFormat(number) {
                return new Intl.NumberFormat('vi-VN').format(number);
            }
        });
    </script>
    <script>
        var userHasReviewed = @json($userReview);
        $(document).ready(function() {
            // Kiểm tra xem người dùng đã đánh giá sản phẩm chưa khi tải trang
            if (userHasReviewed) {
                $('#formRating').hide(); // Ẩn form nếu đã đánh giá
                $('#review-message').removeClass('alert-success').addClass('alert-info').text(
                    'Bạn đã đánh giá sản phẩm này trước đó.').show();
            }

            // Xử lý sự kiện khi người dùng gửi đánh giá
            $('#formRating').on('submit', function(e) {
                e.preventDefault();
                var form = $(this);
                var url = form.attr('action');
                var data = form.serialize();

                $.ajax({
                    url: url,
                    type: 'POST',
                    data: data,
                    dataType: 'json',
                    success: function(response) {
                        if (response.success) {
                            form.find('textarea[name="reviews"]').val(
                                ''); // Xóa nội dung textarea
                            $('#reviews').html(response
                                .reviewsHtml); // Cập nhật danh sách đánh giá
                            $('#review-message').hide(); // Ẩn thông báo nếu thành công

                            // Cập nhật giao diện sau khi gửi đánh giá
                            $('#formRating').hide(); // Ẩn form sau khi gửi đánh giá thành công
                            $('#review-message').removeClass('alert-success').addClass(
                                    'alert-info').text('Cảm ơn bạn đã đánh giá sản phẩm.')
                                .show();

                            // Cập nhật điểm đánh giá và sao
                            if (response.averageRating !== undefined) {
                                const averageRating = parseFloat(response.averageRating);
                                if (!isNaN(averageRating)) {
                                    const roundedRating = Math.ceil(averageRating);
                                    $('#averageRating').text(roundedRating.toFixed(1));
                                    updateStarRating(roundedRating);
                                } else {
                                    console.error('Invalid averageRating value:', response
                                        .averageRating);
                                }
                            }
                        } else {
                            if (response.message) {
                                $('#review-message').removeClass('alert-success').addClass(
                                    'alert-danger').text(response.message).show();
                            } else if (response.error) {
                                $('#review-message').removeClass('alert-success').addClass(
                                    'alert-danger').text(response.error).show();
                            }
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                        $('#review-message').removeClass('alert-success').addClass(
                                'alert-danger').text(
                                'Bạn không thể đánh giá khi chưa mua sản phẩm.')
                            .show();
                    }
                });
            });

            // Xử lý chọn số sao
            $('.stars a').on('click', function(e) {
                e.preventDefault();
                $('.stars a').removeClass('active'); // Xóa lớp active cho tất cả các sao
                $(this).addClass('active').prevAll().addClass(
                    'active'); // Thêm lớp active cho sao hiện tại và các sao trước đó
                $('#rating_point').val($(this).attr('data-rating')); // Cập nhật giá trị điểm đánh giá
            });
            // Hàm để cập nhật số sao dựa trên điểm đánh giá
            function updateStarRating(rating) {
                $('.stars a').each(function() {
                    const starRating = parseInt($(this).attr('data-rating'));
                    if (starRating <= rating) {
                        $(this).addClass('active');
                    } else {
                        $(this).removeClass('active');
                    }
                });
            }

            // Giả sử bạn đã truyền giá trị từ controller đến view
            const roundedAverageRating = parseFloat($('#averageRating').text()) || 0;

            // Cập nhật số sao dựa trên điểm đánh giá trung bình
            updateStarRating(roundedAverageRating);
        });
    </script>
@endsection

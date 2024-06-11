@extends('layouts.client')
@section('content')
    <section class="container">
        <div class="my-5">
            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
                aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item fs-4"><a href="#" style="color: var(--primary-900-color);">Home</a></li>
                    <li class="breadcrumb-item active fs-4" aria-current="page">Details</li>
                </ol>
            </nav>
            <h1>Basic hooded sweatshirt in pink</h1>
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
                        <img class="w-100" id="mainImage"
                            src="/assets/clients/img/Products/Shirt/AoThunOverSizeRetro9AS.jpg" alt="">
                    </div>
                    <div class="d-flex flex-row justify-content-between p-0">
                        <img class="img-thumbnail thumbnail w-25 h-75"
                            src="/assets/clients/img/Products/Shirt/AoThunOverSizeRetro9AS.jpg" alt="">
                        <img class="img-thumbnail thumbnail w-25 h-75"
                            src="/assets/clients/img/img_thumbnail/footware_1_1.avif" alt="">
                        <img class="img-thumbnail thumbnail w-25 h-75"
                            src="/assets/clients/img/img_thumbnail/footware_1_2.avif" alt="">
                        <img class="img-thumbnail thumbnail w-25 h-75"
                            src="/assets/clients/img/img_thumbnail/footware_1_3.avif" alt="">
                    </div>
                </div>
            </div>
            <div class="col-12 col-xl-7">
                <div class="column w-100">
                    <!-- Price Products -->
                    <div class="d-flex flex-row justify-content-between">
                        <div class="d-flex flex-row">
                            <p class="text-danger fs-3 pe-3">$15.75</p>
                            <p class="fs-3 text-decoration-line-through " style="color: var(--primary-1000-color);">
                                $30.5</p>
                        </div>
                        <p class="fs-3">SKU: AFF586</p>
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
                    <div class="py-3">
                        <h5 class="py-1" style="font-weight: var(--Medium);">Color
                        </h5>
                        <div>
                            <form action="">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                        id="inlineRadio1" value="option1">
                                    <label class="form-check-label fs-5 fw-medium" for="inlineRadio1">Red</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                        id="inlineRadio2" value="option2">
                                    <label class="form-check-label fs-5 fw-medium" for="inlineRadio2">Pink</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                        id="inlineRadio3" value="option3">
                                    <label class="form-check-label fs-5 fw-medium" for="inlineRadio3">Yellow</label>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- Size Products -->
                    <div>
                        <h5 style="font-weight: var(--Medium);">Select Size</h5>
                        <div class="py-3 d-flex justify-content-between" style="width: 16rem;">
                            <div class="item-size">
                                <span class="fs-3">S</span>
                            </div>
                            <div class="item-size">
                                <span class="fs-3">M</span>
                            </div>
                            <div class="item-size">
                                <span class="fs-3">L</span>
                            </div>
                            <div class="item-size">
                                <span class="fs-3">XL</span>
                            </div>
                        </div>
                    </div>
                    <!-- Add to card -->
                    <div class="container">
                        <div class="row g-3">
                            <input class="px-xl-2 col-2 col-xl-1" type="number" min="1" value="1">
                            <form action="" class=" col-6 col-xl-4 d-flex align-items-center justify-content-center">
                                <button style="background-color:#8D6440;"
                                    class="btn h-100 fs-5 d-flex align-items-center justify-content-center text-white"
                                    type="submit"><i class="fa-solid fa-cart-shopping me-2 "></i>Thêm giỏ hàng</button>
                            </form>
                            <form action="" class="col-xl-3 col-4">
                                <button class="btn favourite d-flex align-items-center justify-content-center w-100 h-100">
                                    <i class="fa-regular fs-5 fa-heart"></i>
                                    <p class="m-0 px-1 fs-5">Yêu thích</p>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Description -->
                <div class="my-3">
                    <h5 style="font-weight: var(--Medium);">Description: </h5>
                    <ul>
                        <li>
                            <p class="m-0">Lorem Ipsum is simply dummy text of the printing and typesetting
                                industry. Lorem
                                Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
                        </li>
                        <li>
                            <p class="m-0">When an unknown printer took a galley of type and scrambled it to make a
                                type
                                specimen book. It has survived not only five centuries, but also the leap into
                                electronic typesetting, remaining essentially unchanged. It was popularised in.</p>
                        </li>
                        <li>
                            <p class="m-0">The 1960s with the release of Letraset sheets containing Lorem Ipsum
                                passages, and
                                more recently with desktop publishing software like Aldus PageMaker including
                                versions of Lorem Ipsum.</p>
                        </li>
                    </ul>
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
                            <a class="mx-2 text-dark" href="#">Shirt</a>
                            <a class="text-dark" href="#">Hades</a>
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
                                    <!-- Reviews content here -->
                                    <div class="mt-box">
                                        <div class="d-flex">
                                            <div class="rounded-circle border d-flex justify-content-center align-items-center mx-2"
                                                style="width: 75px; height: 75px;">
                                                <i class="fa-regular fa-user"></i>
                                            </div>
                                            <div class="column">
                                                <span class="fs-4">Tuấn Anh</span>
                                                <ul class="m-0 p-0 d-flex">
                                                    <li class="nav-link"><i class="fa fa-star text-warning"></i></li>
                                                    <li class="nav-link"><i class="fa fa-star text-warning"></i></li>
                                                    <li class="nav-link"><i class="fa fa-star text-warning"></i></li>
                                                    <li class="nav-link"><i class="fa fa-star text-warning"></i></li>
                                                    <li class="nav-link"><i class="fa fa-star-o text-warning"></i></li>
                                                </ul>
                                                <time datetime="2016-01-01">09:10 Nov, 19 2016</time>
                                                <p class="pt-3">Consectetur adipisicing elit, sed do eiusmod tempor
                                                    incididunt ut labore et
                                                    dolore magna aliqua...
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <form action="#" class="p-commentform">
                                        <fieldset>
                                            <h2 class="fs-4 fw-semibold py-2">Bình luận</h2>
                                            <div class="d-flex flex-row align-items-center">
                                                <label class="fs-5">Đánh giá</label>
                                                <ul class="d-flex align-items-center m-0">
                                                    <li class="nav-link"><i class="fa fa-star text-warning"></i></li>
                                                    <li class="nav-link"><i class="fa fa-star text-warning"></i></li>
                                                    <li class="nav-link"><i class="fa fa-star text-warning"></i></li>
                                                    <li class="nav-link"><i class="fa fa-star-o text-warning"></i></li>
                                                    <li class="nav-link"><i class="fa fa-star-o text-warning"></i></li>
                                                </ul>
                                            </div>
                                            <div class="d-flex justify-content-between">
                                                <label class="col-xl-1 col-12 fs-5">Bình luận</label>
                                                <textarea class="w-100 rounded-2 p-1" style="height: 10rem; border-color: gray;"></textarea>
                                            </div>
                                            <div class="w-25 text-center pe-xl-2">
                                                <button type="submit"
                                                    class="btn border fs-5 my-2 me-xl-5 shadow-sm mb-5 rounded btn-comment">Gửi</button>
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
            <a href="{{ route('client.product-detail-page') }}"
                class="text-decoration-none text-black col-xl-3 col-12 position-relative d-flex flex-wrap flex-column align-items-center">
                <img class="img-thumbnail" src="/assets/clients/img/Products/Shirt/HadesNewBalanceLongSleeve.webp"
                    alt="">
                <div class="position-absolute top-0 p-3 w-100 end-0">
                    <div class="d-flex align-items-center justify-content-between">
                        <span class="badge text-bg-danger fs-6">- 20%</span>
                        <i style="border: 0.5px solid var(--primary-800-color); background-color: white; color:var(--primary-800-color)"
                            class="fa-regular fa-heart rounded-5 p-2 fs-5"></i>
                    </div>
                </div>
                <h4 class="pt-1 mt-1 fs-5">Products Name</h4>
                <p style="font-size: 16px; color:#000516A4; margin: 0;">Shirt</p>
                <div class="d-flex">
                    <p style="font-size: var(--font-size); margin: 0;"
                        class="text-decoration-line-through text-danger mx-2">$200</p>
                    <p style="font-size: var(--font-size); margin: 0; color: black;">$160
                    </p>
                </div>
            </a>
            <a href="{{ route('client.product-detail-page') }}"
                class="text-decoration-none text-black col-xl-3 col-12 position-relative d-flex flex-wrap flex-column align-items-center">
                <img class="img-thumbnail" src="/assets/clients/img/Products/Shirt/HadesNewBalanceLongSleeve.webp"
                    alt="">
                <div class="position-absolute top-0 p-3 w-100 end-0">
                    <div class="d-flex align-items-center justify-content-between">
                        <span class="badge text-bg-danger fs-6">- 20%</span>
                        <i style="border: 0.5px solid var(--primary-800-color); background-color: white; color:var(--primary-800-color)"
                            class="fa-regular fa-heart rounded-5 p-2 fs-5"></i>
                    </div>
                </div>
                <h4 class="pt-1 mt-1 fs-5">Products Name</h4>
                <p style="font-size: 16px; color:#000516A4; margin: 0;">Shirt</p>
                <div class="d-flex">
                    <p style="font-size: var(--font-size); margin: 0;"
                        class="text-decoration-line-through text-danger mx-2">$200</p>
                    <p style="font-size: var(--font-size); margin: 0; color: black;">$160
                    </p>
                </div>
            </a>
            <a href="{{ route('client.product-detail-page') }}"
                class="text-decoration-none text-black col-xl-3 col-12 position-relative d-flex flex-wrap flex-column align-items-center">
                <img class="img-thumbnail" src="/assets/clients/img/Products/Shirt/HadesNewBalanceLongSleeve.webp"
                    alt="">
                <div class="position-absolute top-0 p-3 w-100 end-0">
                    <div class="d-flex align-items-center justify-content-between">
                        <span class="badge text-bg-danger fs-6">- 20%</span>
                        <i style="border: 0.5px solid var(--primary-800-color); background-color: white; color:var(--primary-800-color)"
                            class="fa-regular fa-heart rounded-5 p-2 fs-5"></i>
                    </div>
                </div>
                <h4 class="pt-1 mt-1 fs-5">Products Name</h4>
                <p style="font-size: 16px; color:#000516A4; margin: 0;">Shirt</p>
                <div class="d-flex">
                    <p style="font-size: var(--font-size); margin: 0;"
                        class="text-decoration-line-through text-danger mx-2">$200</p>
                    <p style="font-size: var(--font-size); margin: 0; color: black;">$160
                    </p>
                </div>
            </a>
            <a href="{{ route('client.product-detail-page') }}"
                class="text-decoration-none text-black col-xl-3 col-12 position-relative d-flex flex-wrap flex-column align-items-center">
                <img class="img-thumbnail" src="/assets/clients/img/Products/Shirt/HadesNewBalanceLongSleeve.webp"
                    alt="">
                <div class="position-absolute top-0 p-3 w-100 end-0">
                    <div class="d-flex align-items-center justify-content-between">
                        <span class="badge text-bg-danger fs-6">- 20%</span>
                        <i style="border: 0.5px solid var(--primary-800-color); background-color: white; color:var(--primary-800-color)"
                            class="fa-regular fa-heart rounded-5 p-2 fs-5"></i>
                    </div>
                </div>
                <h4 class="pt-1 mt-1 fs-5">Products Name</h4>
                <p style="font-size: 16px; color:#000516A4; margin: 0;">Shirt</p>
                <div class="d-flex">
                    <p style="font-size: var(--font-size); margin: 0;"
                        class="text-decoration-line-through text-danger mx-2">$200</p>
                    <p style="font-size: var(--font-size); margin: 0; color: black;">$160
                    </p>
                </div>
            </a>
        </div>
    </section>
@endsection

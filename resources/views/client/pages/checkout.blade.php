@extends('layouts.client')
@section('content')
    <style>
        .hidden {
            display: none;
        }

        .code {
            font-size: 24px;
            font-weight: bold;
            color: #8d6440;
        }

        .border-dashed {
            border: 2px dashed #333;
            border-radius: 5px;
        }

        .discount {
            font-size: 30px;
            font-weight: bold;
            color: #8d6440;
        }

        .voucher .description {
            font-size: 16px;
            color: #666;
            margin-top: 10px;
        }

        .voucher .expiration {
            font-size: 14px;
            color: #888;
            margin-top: 10px;
        }

        .butor {
            background-color: #ff5722;
            color: #fff;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 20px;
        }
    </style>
    @include('client.blocks.banner')
    <!-- Checkout info & payment -->
    <section class="container my-5">
        <!-- Coupon -->
        <div class="row">
            <div class="col-xl-7 mb-5 voucher-container">
                <form action="{{ route('client.checkout.apply_coupon') }}" method="POST">
                    @csrf
                    <h3 class="fs-2" style="font-weight: 600">Mã giảm giá</h3>
                    <hr style="border: 1px solid; color: var(--primary-1000-color);">
                    <div class="input-group mb-3 mt-3">
                        <input type="text" class="form-control" name="coupon_code" placeholder="Nhập mã giảm giá">
                        <button class="btn btn-outline-secondary" type="submit">Áp dụng</button>
                    </div>
                </form>
                <div class="alert alert-info" role="alert">
                    Đã có mã giảm giá? <a href="#" id="showVoucher" class="alert-link">Nhấp vào đây</a> để
                    xem
                    các ưu đãi đang có.
                </div>
                <div id="clickedMessage" class="hidden">
                    <div class="container">
                        @foreach ($allCoupons as $coupon)
                            <div class="rounded-2 row gx-4 justify-content-center">
                                <div class="col-2 d-flex text-center justify-content-center align-items-center border-dashed shadow"
                                    style="background-color:#FCF9F4; color:#8d6440;">
                                    <h5><strong>Git <br> Voucher</strong></h5>
                                </div>
                                <div class="col-8 d-flex justify-content-between rounded-2 shadow">
                                    <div class="col-9 rounded-1 p-1">
                                        <div>
                                            <div class="code text-uppercase fs-3 fw-bold">{{ $coupon->code }}</div>
                                            <div class="discount text-uppercase fw-bold fs-3">
                                                @if ($coupon->discount_type === 'percentage')
                                                    Giảm giá {{ $coupon->discount }}%
                                                @elseif ($coupon->discount_type === 'fixed')
                                                    Giảm giá {{ number_format($coupon->discount) }}$
                                                @endif
                                            </div>
                                        </div>
                                        <div class="description">{{ $coupon->description }}</div>
                                        <div class="expiration">Hết hạn vào ngày
                                            {{ date('d/m/Y', strtotime($coupon->end_date)) }}
                                        </div>
                                    </div>
                                    <form class="d-flex align-items-center m-0"
                                        action="{{ route('client.checkout.apply_coupon') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="coupon_code" value="{{ $coupon->code }}">
                                        <button class="btn btn-giohang px-2 fs-6 border" type="submit">Áp dụng</button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-xl-5 d-flex align-items-center">
                <a href="{{ route('client.home-page') }}" class="d-flex align-items-center text-decoration-none">
                    <img src="/assets/clients/img/Logo_bran/logoweb.jpg" alt=""
                        style="border-radius: 50%; height: 260px; width: 260px;">
                    <p class="web-name ms-3 m-0" style="font-family: 'Dancing Script', cursive; font-size: 47px;">PATINA
                    </p>
                </a>
            </div>
        </div>
        <form class="checkout-form" action="">
            <div class="row g-xl-5">
                <div class="col-12 col-xl-7">
                    <!-- Personal Information -->
                    <div>
                        <h3 class="fs-2">Thông tin khách hàng</h3>
                        <hr style="border: 1px solid; color: var(--primary-1000-color);">
                        <input class="form-control" type="text" placeholder="Họ và tên" value="{{ $users->name }}"
                            disabled>
                        <div class="row g-2 my-1 ">
                            <div class="col-6">
                                <input class="form-control" type="Email" value="{{ $users->email }}" disabled
                                    placeholder="Địa chỉ Email">
                            </div>
                            <div class="col-6">
                                <input class="form-control" type="text" value="{{ $users->phone }}" disabled
                                    placeholder="Số điện thoại">
                            </div>
                        </div>
                    </div>
                    <!-- Shipping Address -->
                    <div class="my-5">
                        <h3 class="fs-2">Địa chỉ giao hàng</h3>
                        <hr style="border: 1px solid; color: var(--primary-1000-color);">
                        <div class="col-12">
                            <input class="form-control " type="text" value="{{ $users->address }}" placeholder="Address"
                                disabled>
                        </div>
                    </div>



                    <!-- Payment Methods -->
                    <div class="mb-5">
                        <h3 class="fs-2">Phương thức thanh toán</h3>
                        <hr style="border: 1px solid; color: var(--primary-1000-color);">
                        <div>
                            <div class="form-check form-check-inline my-3">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1"
                                    value="option1">
                                <label class="form-check-label" for="inlineRadio1">Cash On Delivery</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2"
                                    value="option2">
                                <label class="form-check-label" for="inlineRadio2">Credit or Debit</label>
                            </div>
                            <input class="form-control " type="text" placeholder="Cardholder Name">
                            <div class="position-relative my-3">
                                <input class="form-control " type="text" placeholder="Card Number">
                                <div class="position-absolute top-50 end-0 translate-middle-y me-4">
                                    <i class="fa-solid fa-circle fs-4 text-danger"></i>
                                    <i class="position-absolute start-50 fa-solid fa-circle fs-4 text-warning"></i>
                                </div>
                            </div>
                            <div class="row g-4">
                                <div class="col-4">
                                    <input class="form-control " type="text" placeholder="EXP Date">
                                </div>
                                <div class="col-4">
                                    <input class="form-control " type="text" placeholder="CVC">
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
                <!-- Item Cart in Checkout -->
                <div class="col-12 col-xl-5">
                    <h3 class="fs-2">Item</h3>
                    <hr style="border: 1px solid; color: var(--primary-1000-color);">
                    @foreach ($cart as $item)
                        <div>
                            <div class="row g-2 align-items-center">
                                <div class="col-3">
                                    <div class="position-relative">
                                        <img class="img-thumbnail w-75 h-75" src="{{ $item->product->images }}"
                                            alt="">
                                        <span
                                            class="w-25 position-absolute top-0 end-0 text-center rounded-circle translate-middle bg-white fw-bold"
                                            style="border:2px solid var(--primary-1000-color); color: var(--primary-1000-color);">{{ $item->quantity }}</span>
                                    </div>
                                </div>
                                <div class="col-5 mx-1">
                                    <h5 class="my-2">{{ $item->product->name }}</h5>
                                    <small>Size: {{ $item->size }} | Color: {{ $item->color }}</small>
                                </div>
                                <div class="col-3">
                                    <h5>${{ number_format($item->price) }}</h5>
                                </div>
                            </div>
                        </div> <br>
                    @endforeach

                    <hr style="border: 1px solid; color: var(--primary-1000-color);">
                    <div class="row my-2 g-2">
                        <div class="col-6">
                            <h5 class="fs-4">Tính tạm</h5>
                            <h5 class="my-2 fs-4">Phí vận chuyển</h5>
                            <h5 class="fs-4">Giảm giá</h5>
                        </div>
                        <div class="col-6 text-end">
                            <h5 class="fs-4">${{ number_format($item->subTotal) }}</h5>
                            <h5 class="fs-4">
                                @if ($transportFee == 0)
                                    <a style="font-weight:600">Free</a>
                                @else
                                    ${{ number_format($transportFee) }}
                                @endif
                            </h5>
                            <h5 class="my-2 fs-4">
                                @if ($appliedCouponCode)
                                    <span style="color: red">(voucher: {{ $appliedCouponCode }})</span>
                                    @if ($couponCode && $couponCode->discount_type === 'percentage')
                                        {{ $couponDiscount }}%
                                    @elseif ($couponCode && $couponCode->discount_type === 'fixed')
                                        ${{ number_format($couponDiscount) }}
                                    @endif
                                @else
                                    ${{ number_format($couponDiscount) }}
                                @endif
                            </h5>
                        </div>
                    </div>
                    <hr style="border: 1px solid; color: var(--primary-1000-color);">
                    <div class="d-flex justify-content-between">
                        <h3 class="fs-3">Total</h3>
                        @if ($totalPrice > 500)
                            @php
                                $discountedPrice = $totalPrice * 0.9;
                            @endphp
                            <small style="color: red; font-size:16px">(-10% với đơn hàng trên 500$)</small>
                            <h3 class="fs-3">
                                <del style="color: red">${{ number_format($totalPrice) }}</del>
                                ${{ number_format($discountedPrice) }}

                            </h3>
                        @else
                            <h3 class="fs-3">
                                ${{ number_format($totalPrice) }}
                            </h3>
                        @endif
                    </div>
                    <button class="btn fs-3 my-2 rounded-1 w-50 float-end btn-thanhtoan">Checkout</button>
                </div>
            </div>
        </form>
    </section>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('showVoucher').addEventListener('click', function(event) {
                event.preventDefault();
                document.getElementById('clickedMessage').classList.remove('hidden');
            });
        });
    </script>
@endsection

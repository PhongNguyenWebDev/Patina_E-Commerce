@extends('layouts.client')
@section('content')
    @include('client.blocks.banner')
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <!-- Checkout info & payment -->
    <section class="container my-5">
        <!-- Coupon -->
        <div class="row">
            <div class="col-xl-7 mb-xl-5 mb-2 voucher-container">
                <form action="{{ route('client.checkout.apply_coupon') }}" method="POST">
                    @csrf
                    <h5 class="fw-medium">Mã giảm giá</h5>
                    <hr style="border: 1px solid; color: var(--primary-1000-color);">
                    <div class="input-group mb-3 mt-3">
                        <input type="text" class="form-control" name="coupon_code" placeholder="Nhập mã giảm giá">
                        <button class="btn btn-outline-secondary" type="submit">Áp dụng</button>
                    </div>
                </form>
                <div class="alert alert-secondary" role="alert">
                    Đã có mã giảm giá? <a href="#" id="showVoucher" class="alert-link" data-bs-toggle="modal"
                        data-bs-target="#voucherModal">Nhấp vào đây</a> để xem các ưu đãi đang có.
                </div>

            </div>
            <div class="col-xl-5 d-flex align-items-center justify-content-center mb-xl-1 mb-3">
                <a href="{{ route('client.home-page') }}" class="d-flex align-items-center text-decoration-none nav-link">
                    <h1 class="web-name m-0" style="letter-spacing: -2px">PATINA
                    </h1>
                </a>
            </div>
        </div>
        <form class="checkout-form" method="POST">
            @csrf
            <div class="row g-xl-5">
                <div class="col-12 col-xl-7">
                    <!-- Personal Information -->
                    <div>
                        <h5 class="fw-medium">Thông tin khách hàng</h5>
                        <hr style="border: 1px solid; color: var(--primary-1000-color);">
                        <input class="form-control" name="name" type="text" placeholder="Họ và tên"
                            value="{{ $users->name }}">
                        @error('name')
                            <span style="color: red"><i class="fa-solid fa-circle-exclamation fa-beat"></i>
                                {{ $message }}</span>
                        @enderror
                        <div class="row g-2 my-1 ">
                            <div class="col-6">
                                <input class="form-control" id="emailForm1" name="email" type="Email"
                                    value="{{ $users->email }}" placeholder="Địa chỉ Email">
                            </div>
                            @error('email')
                                <span style="color: red"><i class="fa-solid fa-circle-exclamation fa-beat"></i>
                                    {{ $message }}</span>
                            @enderror
                            <div class="col-6">
                                <input class="form-control" name="phone" type="text" value="{{ $users->phone }}"
                                    placeholder="Số điện thoại">
                            </div>
                            @error('phone')
                                <span style="color: red"><i class="fa-solid fa-circle-exclamation fa-beat"></i>
                                    {{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <!-- Shipping Address -->
                    <div class="my-5">
                        <h5 class="fw-medium">Địa chỉ giao hàng</h5>
                        <hr style="border: 1px solid; color: var(--primary-1000-color);">
                        <div class="col-12">
                            <input class="form-control" name="address" type="text" value="{{ $users->address }}"
                                placeholder="Address">
                        </div>
                        @error('address')
                            <span style="color: red"><i class="fa-solid fa-circle-exclamation fa-beat"></i>
                                {{ $message }}</span>
                        @enderror
                    </div>



                    <!-- Payment Methods -->
                    <div class="mb-5">
                        <h5 class="fw-medium">Phương thức thanh toán</h5>
                        <hr style="border: 1px solid; color: var(--primary-1000-color);">
                        <div>
                            <div class="form-check form-check-inline my-3">
                                <input class="form-check-input" type="radio" name="payment_method" id="cashPayment"
                                    value="cash" checked>
                                <label class="form-check-label" for="cashPayment" style="font-size: 18px">Trả tiền
                                    mặt</label>
                            </div>
                            <div class="form-check form-check-inline my-3">
                                <input class="form-check-input" type="radio" name="payment_method" id="onlinePayment"
                                    value="online">
                                <label class="form-check-label" for="onlinePayment" style="font-size: 18px">Thanh toán
                                    online</label>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Item Cart in Checkout -->
                <div class="col-12 col-xl-5">
                    <h5 class="fw-medium">Sản phẩm</h5>
                    <hr style="border: 1px solid; color: var(--primary-1000-color);">
                    @foreach ($cart as $item)
                        <div>
                            <div class="row g-2 align-items-center">
                                <div class="col-3">
                                    <div class="position-relative">
                                        <img class="object-fit-cover" width="90" height="100"
                                            src="{{ $item->product->images }}" alt="">
                                        <span
                                            class="w-25 position-absolute top-0 end-0 text-center rounded-circle translate-middle fw-medium"
                                            style="border:2px solid var(--primary-1000-color); background:#f0eff5;">{{ $item->quantity }}</span>
                                    </div>
                                </div>
                                <div class="col-5 mx-1">
                                    <p class="my-2">{{ $item->product->name }}</p>
                                    <small>Kích thước: {{ $item->size }} | Màu: {{ $item->color }}</small>
                                </div>
                                <div class="col-3">
                                    <p>{{ number_format($item->price) }} VND</p>
                                </div>
                            </div>
                        </div> <br>
                    @endforeach
                    @if (session('stockErrors'))
                        <div class="alert alert-danger">
                            <p>Số lượng mua hàng vượt quá tồn kho cho các sản phẩm sau:</p>
                            <ul>
                                @foreach (session('stockErrors') as $error)
                                    <li>
                                        {{ $error['product'] }} (Màu: {{ $error['color'] }}, Size: {{ $error['size'] }})
                                        <br> Có sẵn: {{ $error['available'] }}, Yêu cầu: {{ $error['requested'] }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <hr style="border: 1px solid; color: var(--primary-1000-color);">
                    <div class="row my-2 g-2">
                        <div class="col-6">
                            <h6>Tính tạm</h6>
                            <h6>Giảm giá</h6>
                        </div>
                        <div class="col-6 text-end">
                            <h6>{{ number_format($item->subTotal) }} VND</h6>
                            <h6 class="my-2">
                                @if ($appliedCouponCode)
                                    {{ number_format($couponDiscount) }} VND<br>
                                    <span style="color: red">(Voucher: {{ $appliedCouponCode }})</span>
                                @else
                                    {{ number_format($couponDiscount) }} VND
                                @endif
                            </h6>
                        </div>
                    </div>
                    <hr style="border: 1px solid; color: var(--primary-1000-color);">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4>Tổng tiền</h4>
                        <h6>
                            {{ number_format($totalPrice) }} VND
                        </h6>
                    </div>
                    <button id="cashPaymentButton" class="btn btn-dark my-2 fw-medium" style="font-size:18px">Thanh
                        toán</button>
                </div>
            </div>
        </form>
        <div id="vnpayPaymentButton" class="position-absolute btn-vnpay">
            <form class="m-0" id="form2" action="{{ route('client.checkout.vnpay_payment') }}" method="post">
                @csrf
                <input type="hidden" name="name" id="nameForm2">
                <input type="hidden" name="email" id="emailForm2">
                <input type="hidden" name="address" id="addressForm2">
                <input type="hidden" name="phone" id="phoneForm2">
                <button class="btn btn-dark" name="redirect" onclick="submitForm2()" style="font-size:18px;">Thanh toán
                    VNPay</button>
            </form>
        </div>
        <div class="modal fade" id="voucherModal" tabindex="-1" role="dialog" aria-labelledby="voucherModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="col-6">
                            <h5 class="modal-title" id="voucherModalLabel">Tất cả Vouchers của bạn</h5>
                        </div>
                        <div class="col-6 d-flex justify-content-end">
                            <button style="border: none; background-color:#fff" type="button" class="close"
                                data-bs-dismiss="modal" aria-label="Close">
                                <i class="fa-regular fa-circle-xmark"></i>
                            </button>
                        </div>
                    </div>
                    <div class="modal-body">
                        @foreach ($allCoupons as $coupon)
                            <div class="rounded-2 row gx-4 justify-content-center mt-3 mb-3">
                                <div class="col-2 d-flex text-center justify-content-center align-items-center border-dashed shadow"
                                    style="background-color:#FCF9F4;">
                                    <h6><strong class="mb-2">Voucher</strong><br class="m-6"><strong
                                            class="text-uppercase" style="color: red">{{ $coupon->code }}</strong></h6>
                                </div>
                                <div class="col-8 d-flex justify-content-between rounded-2 shadow">
                                    <div class="col-9 rounded-1 p-1">
                                        <div>
                                            <div class="expiration" style="color: #b4b4b4; font-size:15px">Hết hạn vào
                                                ngày {{ date('d/m/Y', strtotime($coupon->end_date)) }}</div>
                                            <div style="color: red; font-size: 20px"
                                                class="discount text-uppercase fw-bold">
                                                @if ($coupon->discount_type === 'percentage')
                                                    Giảm {{ $coupon->discount }}%
                                                @elseif ($coupon->discount_type === 'fixed')
                                                    Giảm {{ number_format($coupon->discount) }} VND
                                                @endif
                                            </div>
                                        </div>
                                        <div style="color: rgb(94, 92, 92); font-size:15px; font-family:Arial"
                                            class="description">{{ $coupon->description }}</div>
                                    </div>
                                    <form class="d-flex align-items-center m-0"
                                        action="{{ route('client.checkout.apply_coupon') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="coupon_code" value="{{ $coupon->code }}">
                                        <button class="btn btn-secondary" type="submit">Áp dụng</button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const cashPayment = document.getElementById('cashPayment');
        const onlinePayment = document.getElementById('onlinePayment');
        const cashPaymentButton = document.getElementById('cashPaymentButton');
        const vnpayPaymentButton = document.getElementById('vnpayPaymentButton');

        // Hàm xử lý hiển thị nút
        function togglePaymentButtons() {
            if (cashPayment.checked) {
                cashPaymentButton.style.display = 'block';
                vnpayPaymentButton.style.display = 'none';
            } else if (onlinePayment.checked) {
                cashPaymentButton.style.display = 'none';
                vnpayPaymentButton.style.display = 'block';
            }
        }

        // Lắng nghe sự kiện thay đổi
        cashPayment.addEventListener('change', togglePaymentButtons);
        onlinePayment.addEventListener('change', togglePaymentButtons);

        // Gọi hàm lần đầu tiên để thiết lập nút theo radio đã chọn
        togglePaymentButtons();
        const form1Name = document.querySelector('input[name="name"]');
        const form1Email = document.querySelector('input[name="email"]');
        const form1Address = document.querySelector('input[name="address"]');
        const form1Phone = document.querySelector('input[name="phone"]');

        const form2Name = document.getElementById('nameForm2');
        const form2Email = document.getElementById('emailForm2');
        const form2Address = document.getElementById('addressForm2');
        const form2Phone = document.getElementById('phoneForm2');

        document.querySelector('#vnpayPaymentButton form').addEventListener('submit', function(e) {
            // Copy the values from form 1 to form 2
            form2Name.value = form1Name.value;
            form2Email.value = form1Email.value;
            form2Address.value = form1Address.value;
            form2Phone.value = form1Phone.value;
        });
    });
</script>

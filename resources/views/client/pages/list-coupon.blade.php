@extends('layouts.client')
@section('content')
    <div class="container">
        <video controls autoplay muted loop class="object-fit-cover w-100">
            <source src="{{ asset('assets/clients/img/Bài đăng Instagram Sale 8.8 Hiện đại Tối giản Xanh vàng.mp4') }}"
                type="video/mp4">
            Trình duyệt của bạn không hỗ trợ thẻ video.
        </video>
    </div>

    <div class="container my-5">
        @foreach ($coupons as $coupon)
            <div class="rounded-2 row gx-4 justify-content-center mt-3 mb-3">
                <div class="col-2 d-flex text-center justify-content-center align-items-center border-dashed shadow p-4"
                    style="background-color:#FCF9F4;">
                    <h5><strong class="mb-2">Voucher</strong><br class="m-6"><strong class="text-uppercase"
                            style="color: red">{{ $coupon->code }}</strong></h5>
                </div>
                <div class="col-8 d-flex justify-content-between rounded-2 shadow p-4">
                    <div class="col-9 rounded-1 p-1">
                        <div>
                            <div class="expiration" style="color: #b4b4b4; font-size:15px">Hết hạn vào
                                ngày {{ date('d/m/Y', strtotime($coupon->end_date)) }}</div>
                            <div style="color: red; font-size: 20px" class="discount text-uppercase fw-bold">
                                @if ($coupon->discount_type === 'percentage')
                                    Giảm {{ $coupon->discount }}%
                                @elseif ($coupon->discount_type === 'fixed')
                                    Giảm {{ number_format($coupon->discount) }}$
                                @endif
                            </div>
                        </div>
                        <div style="color: rgb(94, 92, 92); font-size:15px; font-family:Arial" class="description">
                            {{ $coupon->description }}</div>
                    </div>
                    <div class="d-flex align-items-center m-0">
                        <a class="btn btn-danger px-2 fs-6 border"
                            href="{{ route('client.list-coupon.add', $coupon->id) }}">Lưu</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection

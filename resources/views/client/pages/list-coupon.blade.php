@extends('layouts.client')
@section('content')
    @foreach ($coupons as $coupon)
        <div class="rounded-2 row gx-4 justify-content-center mt-3 mb-3">
            <div class="col-2 d-flex text-center justify-content-center align-items-center border-dashed shadow"
                style="background-color:#FCF9F4; color:#8d6440;">
                <h6><strong class="mb-2">Voucher</strong><br class="m-6"><strong class="text-uppercase"
                        style="color: red">{{ $coupon->code }}</strong></h6>
            </div>
            <div class="col-8 d-flex justify-content-between rounded-2 shadow">
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
                    <a class="btn btn-giohang px-2 fs-6 border"
                        href="{{ route('client.list-coupon.add', $coupon->id) }}">Lưu</a>
                </div>
            </div>
        </div>
    @endforeach
@endsection

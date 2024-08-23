@extends('layouts.client')
@section('content')
    {{-- @include('client.blocks.banner') --}}
    <section class="container w-50">
        <div class="text-center shadow p-3 mb-5 bg-body rounded">
            <h2>Cảm ơn bạn đã sử dụng dịch vụ của chúng tôi!</h2>
            <p>Số tiền bạn đã thanh toán là: {{ number_format($amount / 100, 2) }} VND</p>
            <p>Mã giao dịch: {{ $txnRef }}</p>
            <p>Thông tin đơn hàng: {{ $orderInfo }}</p>
            <p>Chúc bạn có một ngày tuyệt vời!</p>
            <a href="{{ route('client.home-page') }}" class="btn btn-success">Tiếp tục mua sắm</a>
        </div>
    </section>
@endsection

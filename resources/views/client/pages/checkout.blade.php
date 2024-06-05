@extends('layouts.client')
@section('content')
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Check Out</h4>
                        <div class="breadcrumb__links">
                            <a href="/">Home</a>
                            <a href="{{ route('shop') }}">Shop</a>
                            <span>Check Out</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <div class="checkout__form">
                <form method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-lg-7 col-md-6">
                            <h6 class="checkout__title">Hóa Đơn Chi Tiết</h6>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Họ Và Tên<span>*</span></p>
                                        <input type="text" value="{{$users->name}}" name="name">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Số Điện Thoại<span>*</span></p>
                                        <input type="text" value="{{$users->phone}}" name="phone">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="checkout__input">
                                        <p>Email<span>*</span></p>
                                        <input type="email" value="{{$users->email}}" name="email">
                                    </div>
                                </div>
                            </div>
                            <div class="checkout__input">
                                <p>Địa Chỉ Nhận Hàng<span>*</span></p>
                                <input type="text" value="{{$users->address}}" name="address">
                            </div>

                        </div>
                        <div class="col-lg-5 col-md-6">
                            <div class="checkout__order">
                                <h4 class="order__title">Đơn hàng</h4>
                                <div class="checkout__order__products">Sản phẩm <span>Tổng</span></div>
                                <ul class="checkout__total__products">
                                    @foreach($cart as $item)
                                    <li>{{ $loop->index + 1 }}. {{$item->product->name}} <span>{{number_format($item->price*$item->quantity)}} VNĐ</span></li>
                                    @endforeach
                                </ul>
                                <ul class="checkout__total__all">
                                    <li>Subtotal <span>{{number_format($item->subTotal)}} VNĐ</span></li>
                                    <li>Ưu đãi <span>{{number_format($couponDiscount)}} VNĐ</span></li>
                                    <li>Total <span>{{number_format(($item->subTotal - $couponDiscount)<0 ?0:($item->subTotal - $couponDiscount))}} VNĐ</span></li>
                                </ul>
                                <button type="submit" class="site-btn">PLACE ORDER</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

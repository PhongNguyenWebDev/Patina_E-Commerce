@extends('layouts.client')
@section('content')
    <style>
        .quantity__item .name {
            width: 801px;
        }
    </style>
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Favorite</h4>
                        <div class="breadcrumb__links">
                            <a href="/">Home</a>
                            <a href="{{ route('shop') }}">Shop</a>
                            <span>Favorite</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shopping Cart Section Begin -->
    <section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shopping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Ảnh</th>
                                    <th>Tên</th>
                                    <th>Giá</th>
                                    <th>Xóa</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($favorite as $item)
                                    <tr>
                                        <td class="quantity__item">
                                            <div class="quantity">
                                                <a
                                                    href="{{ route('detail', [$item->product->category->slug, $item->product->slug]) }}"><img
                                                        src="{{ $item->product->images }}"
                                                        alt=""></a>
                                            </div>
                                        </td>
                                        <td class="quantity__item">
                                            <div class="name">
                                                <h5>{{ $item->product->name }}</h5>
                                            </div>
                                        </td>
                                        <td class="quantity__item">
                                            <div class="quantity">
                                                {{ number_format($item->price) }}
                                            </div>
                                        </td>
                                        <td class="cart__close"><a
                                                onclick="return confirm('Bạn có chắc muốn xóa {{ $item->product->name }} khỏi yêu thích?')"
                                                href="{{ route('favorite.delete', $item->product_id) }}"><i
                                                    class="fa fa-close"></i></a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="continue__btn">
                                <a href="{{ route('shop') }}">Tiếp tục mua hàng</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@extends('layouts.client')
@section('content')
    <section class="container my-5">
        <div class="untree_co-section before-footer-section">
            <div class="container">
                <div class="row mb-5">
                    <form class="col-md-12">
                        <div class="site-blocks-table">
                            <table class="table text-center">
                                <tbody>
                                    <thead class="thead-light">
                                        <tr>
                                            <th class="product-quantity">Ảnh</th>
                                            <th class="product-name">Sản phẩm</th>
                                            <th class="product-price">Giá</th>
                                            <th class="product-remove">Chi tiết</th>
                                            <th class="product-remove">Xóa</th>
                                        </tr>
                                    </thead>
                                    @foreach ($favorite as $item)
                                        <tr data-id="{{ $item->id }}">
                                        <td class="product-name d-flex justify-content-center align-items-center">
                                            <img class="d-none d-lg-block me-3 product-thumbnail" width="100" height="100"
                                                src="{{ $item->product->images }}" alt="Image">
                                        </td>
                                        <td>
                                            <h2 class="h5 text-black m-0">{{ $item->product->name }}</h2>
                                        </td>
                                        <td>
                                            <p class="p-0 m-0">${{ number_format($item->price) }}</p>
                                        </td>
                                        <td>
                                            <a class="btn btn-spyt" href="{{ route('client.detail', $item->product->slug) }}">Xem</a>
                                        </td>
                                        <td class="cart_delete">
                                            <a class="btn btn-danger btn-sm cart_delete" onclick="return confirm('Bạn có chắc muốn xóa {{ $item->product->name }} khỏi yêu thích?')"
                                                    href="{{ route('client.favorite.delete', $item->product_id) }}">Delete</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

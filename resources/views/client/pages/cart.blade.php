@extends('layouts.client')
@section('content')
    @include('client.blocks.banner')
    <section class="container my-5">
        <div class="untree_co-section before-footer-section">
            <div class="container">
                <div class="row mb-5">
                    <div class="col-md-12">
                        <div class="site-blocks-table">
                            <table class="table text-center">
                                <thead class="thead-light">
                                    <tr>
                                        <th class="product-id d-none d-md-table-cell">Số thứ tự</th>
                                        <th class="product-name">Sản phẩm</th>
                                        <th class="product-price">Giá</th>
                                        <th class="product-quantity">Số lượng</th>
                                        <th class="product-remove">Hủy</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cart as $item)
                                        <tr data-id="{{ $item->id }}">
                                            <td class="product-id d-none d-md-table-cell">{{ $loop->index + 1 }}</td>
                                            <td class="product-name d-flex justify-content-flex-start align-items-center">
                                                <img class="me-3 img-thumnail" src="{{ $item->product->images }}"
                                                    width="100" height="100" alt="Image">
                                                <h2 class="h5 text-black m-0">{{ $item->product->name }}</h2>
                                            </td>
                                            <td>
                                                <p class="p-0 m-0">${{ number_format($item->price) }}</p>
                                            </td>
                                            <td>
                                                <form class="updateQuantityForm"
                                                    action="{{ route('client.cart-page.update', $item) }}" method="post">
                                                    @csrf
                                                    @method('POST')
                                                    <div class="quantity">
                                                        <input type="hidden" name="color" value="{{ $item->color }}">
                                                        <input type="hidden" name="size" value="{{ $item->size }}">
                                                        <div
                                                            class="quantity-input-group d-flex justify-content-center pro-qty-2">
                                                            <button
                                                                class="btn btn-outline-secondary btn-sm dec qtybtn">-</button>
                                                            <input type="text" name="quantity"
                                                                class="form-control rounded quantity-input mx-2"
                                                                value="{{ $item->quantity }}" min="1"
                                                                max="{{ $item->max_quantity }}">
                                                            <button
                                                                class="btn btn-outline-secondary btn-sm inc qtybtn">+</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </td>
                                            <td class="cart_delete">
                                                <a class="btn btn-danger btn-sm cart_delete"
                                                    onclick="return confirm('Bạn có chắc muốn xóa {{ $item->product->name }} {{ $item->color }} {{ $item->size }} khỏi giỏ hàng?')"
                                                    href="{{ route('client.cart-page.delete', $item) }}">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3 mb-md-0">
                        <a class="btn btn-outline-dark btn-giohang fs-5" href="{{ route('client.shop-page') }}">
                            Tiếp tục mua sắm</a>
                    </div>
                    <div class="col-md-6">
                        <div class="row justify-content-end">
                            <div class="col-md-7">
                                <div class="row">
                                    <div class="col-md-12 text-right border-bottom mb-4">
                                        <h3 class="text-black h4 text-uppercase">Tổng tiền</h3>
                                    </div>
                                </div>
                                <div class="row mb-5">
                                    <div class="col-md-6">
                                        <span class="text-black h5"><strong>Tổng</strong></span>
                                    </div>
                                    <div class="col-md-6 text-right">
                                        <strong class="fs-5" id="total-amount" data-subtotal="{{ $item->subTotal }}">
                                            ${{ number_format($item->subTotal) }}
                                        </strong>
                                    </div>
                                </div>
                                <div class="row">
                                    <a href="{{ route('client.checkout.index') }}" class="col-md-12">
                                        <button class="btn btn-giohang px-4 fs-5 border">Thanh toán</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.qtybtn').on('click', function(e) {
                e.preventDefault();

                var $button = $(this);
                var $form = $button.closest('form');
                var oldValue = $form.find('input.quantity-input').val();
                var newValue = 0;

                if ($button.hasClass('inc')) {
                    newValue = parseFloat(oldValue) + 1;
                } else {
                    if (oldValue > 1) {
                        newValue = parseFloat(oldValue) - 1;
                    } else {
                        newValue = 1;
                    }
                }

                $form.find('input.quantity-input').val(newValue);

                // Sử dụng Ajax để gửi yêu cầu cập nhật số lượng
                $.ajax({
                    url: $form.attr('action'),
                    type: 'POST',
                    data: $form.serialize(),
                    success: function(response) {
                        var newQuantity = response.quantity;
                        var newSubtotal = response.subTotal;

                        // Cập nhật số lượng trên giao diện
                        $form.find('input.quantity-input').val(newQuantity);

                        // Cập nhật subtotal trên giao diện
                        $('#total-amount').text('$' + newSubtotal);

                        console.log('Số lượng đã được cập nhật thành công.');
                    },
                    error: function(xhr, status, error) {
                        console.error('Lỗi khi cập nhật số lượng:', error);
                    }
                });
            });
        });
    </script>
@endsection

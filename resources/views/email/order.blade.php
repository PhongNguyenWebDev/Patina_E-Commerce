<div style="border: 3px solid black; padding: 3px">
    <h3>Hi: {{ $order->user->name }}</h3>
    <p>Đây là mail để xác thực đơn hàng của bạn</p>
    <div class="table-responsive">
        <table border="1" cellpadding="5" cellspacing="0" class="table text-center">
            <thead class="table-dark">
                <tr>
                    <th class="p-3 align-middle" scope="col">STT</th>
                    <th class="p-3 align-middle" scope="col">Tên Sản Phẩm</th>
                    <th class="p-3 align-middle" scope="col">Giá</th>
                    <th class="p-3 align-middle" scope="col">Số lượng</th>
                    <th class="p-3 align-middle" scope="col">Tổng</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order->details as $item)
                    <tr ng-repeat="c in cart">
                        <td class="col-2">{{ $loop->index + 1 }}
                        </td>
                        <td class="col-md-2 col-sm-3 align-middle" style="font-weight: 600;">
                            {{ $item->product->name }}
                        </td>
                        <td class="col-md-2 col-sm-3 align-middle" style="font-weight: 600;">
                            {{ $item->price }}
                        </td>

                        <td>
                            {{ $item->quantity }}
                        </td>
                        <td>
                            {{ number_format($item->price * $item->quantity) }} VND
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
        <p>Mã giảm giá đã nhập:
            @if ($order->coupon_id)
                {{ $order->coupon->code }}
            @else
                Không có
            @endif
        </p>
    </div>
    <p><a href="{{ route('checkout.verify', $token) }}">Vui lòng click vào đây</a></p>

</div>

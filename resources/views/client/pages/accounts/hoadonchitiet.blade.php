@extends('layouts.client')
@section('content')
    <div class="invoice-box mb-3">
        <table>
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="title">
                                <a href="{{ route('home') }}"><img style="width: 100%; max-width: 300px"
                                        src="{{ asset('img/logo.png') }}" alt=""></a>
                            </td>

                            <td>
                                Mã hóa đơn: {{ $order->id }}<br />
                                Ngày tạo: {{ $order->created_at->format('d F Y') }}<br />
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>
                            <td>
                                <b>Thông tin cửa hàng</b><br />
                                Male Fashion<br />
                                anhlongdeptrai@gmail.com<br />
                                +84 982-314-958<br />
                                24 Phường 3, Quang Trung, Gò Vấp, TP.HCM
                            </td>

                            <td>
                                <b>Thông tin của bạn</b><br />
                                {{ $order->name }}<br />
                                {{ $order->email }}<br />
                                {{ $order->phone }}<br />
                                {{ $order->address }}
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="heading">
                <td>Trạng Thái Đơn Hàng</td>

                <td>Check #</td>
            </tr>

            <tr class="details">
                <td>Trạng thái</td>

                <td><b>
                        @if ($order->status == 0)
                            Chưa xác nhận
                        @elseif ($order->status == 1)
                            Đã xác nhận
                        @elseif ($order->status == 2)
                            Đang giao hàng
                        @elseif ($order->status == 3)
                            Đã giao hàng
                        @else
                            Đã hủy | {{ $order->reason}}
                        @endif
                    </b></td>
            </tr>

            <tr class="heading">
                <td>Sản phẩm</td>

                <td>Giá</td>
            </tr>
            @foreach ($order->details as $item)
                <tr class="item">
                    <td style="width:500px">{{ $item->product->name }} <span>X {{ $item->quantity }}</span></td>

                    <td>{{ number_format($item->price) }} VNĐ</td>
                </tr>
            @endforeach
            <tr class="total">
                <td>
                    <a class="btn btn-dark" href="{{ route('account.hoadon') }}">Quay lại</a>
                </td>
                <td>Tổng: {{ number_format($order->totalPrice < 0 ? 0 : $order->totalPrice) }} VNĐ</td>
            </tr>
            @if ($order->coupon_id)
                <tr class="total">
                    <td></td>
                    <td>(Đã áp dụng mã giảm giá)</td>
                </tr>
            @endif

        </table>
    </div>
@endsection

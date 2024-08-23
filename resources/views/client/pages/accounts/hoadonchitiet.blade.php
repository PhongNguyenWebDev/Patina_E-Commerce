@extends('layouts.client')
@section('content')
    <div class="container d-flex justify-content-center mb-3">
        <div class="p-5 border my-5 shadow p-3 mb-5 bg-body ">
            <table class="table">
                <tr class="top">
                    <td colspan="2">
                        <table class="w-100">
                            <tr>
                                <td class="title">
                                    <a class="nav-link" style="font-size: 4rem; letter-spacing: -8px;"
                                        href="{{ route('client.home-page') }}">PATINA</a>
                                </td>

                                <td class="text-end">
                                    Mã hóa đơn: {{ $order->id }}<br />
                                    Ngày tạo: {{ $order->created_at->format('d/m/Y') }}<br />
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <tr class="information">
                    <td colspan="2">
                        <table class="w-100">
                            <tr>
                                <td class="col-6">
                                    <b>Thông tin cửa hàng</b><br />
                                    PATINA<br />
                                    patina@gmail.com<br />
                                    +84 123-123-123<br />
                                    Tòa nhà QTSC9 (toà T), đường Tô Ký, phường Tân Chánh Hiệp, quận 12, TP HCM.
                                </td>

                                <td class="text-end col-6">
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

                    <td class="text-end">Check #</td>
                </tr>

                <tr class="details">
                    <td>Trạng thái</td>

                    <td class="text-end"><b>
                            @if ($order->status == 0)
                                Chưa xác nhận
                            @elseif ($order->status == 1)
                                Đã xác nhận
                            @elseif ($order->status == 2)
                                Đang giao hàng
                            @elseif ($order->status == 3)
                                Đã giao hàng
                            @elseif ($order->status == 4)
                                Đã thanh toán trước
                            @else
                                Đã hủy | {{ $order->reason }}
                            @endif
                        </b></td>
                </tr>

                <tr class="heading">
                    <td>Sản phẩm</td>

                    <td class="text-end">Giá</td>
                </tr>
                @foreach ($order->details as $item)
                    <tr class="item">
                        <td style="width:500px">{{ $item->product->name }} <span>X {{ $item->quantity }}</span></td>

                        <td class="text-end">{{ number_format($item->price) }} VNĐ</td>
                    </tr>
                @endforeach
                <tr class="total">
                    <td>
                        <a class="btn btn-dark" href="{{ route('client.account.hoadon') }}">Quay lại</a>
                    </td>

                    <td class="text-end">
                        <div class="align-items-center">
                            Tổng: {{ number_format($order->totalPrice < 0 ? 0 : $order->totalPrice) }} VNĐ
                            @if ($order->coupon_id)
                                <div class="total">
                                    <p class="m-0">(Đã áp dụng mã giảm giá)</p>
                                </div>
                            @endif
                        </div>
                    </td>
                </tr>

            </table>
        </div>

    </div>
@endsection

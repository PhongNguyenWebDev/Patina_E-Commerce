@extends('layouts.admin')
@section('title')
    {{ $title }}
@endsection
@section('content')
    <div class="page-header">
        <div class="row">
            <div class="col-md-6">
                <h3 class="page-title mb-0">{{ $title }}</h3>
            </div>
            <div class="col-md-6">
                <ul class="breadcrumb mb-0 p-0 float-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}"><i class="fas fa-home"></i> Home</a></li>
                    <li class="breadcrumb-item"><span>{{ $title }}</span></li>
                </ul>
            </div>
        </div>
    </div>
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
                                <b>Thông tin khách hàng</b><br />
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

                <td>
                    @if ($order->status != 3)
                        <form class="row" method="POST" action="{{ route('admin.orders.update', $order) }}">
                            @csrf
                            @method('PUT')
                            <select class="form-control" id="active" name="status" onchange="toggleReasonInput(this.value)">
                                <option value="0" {{ $order->status == 0 ? 'selected' : '' }}>Chưa xác nhận</option>
                                <option value="1" {{ $order->status == 1 ? 'selected' : '' }}>Đã xác nhận</option>
                                <option value="2" {{ $order->status == 2 ? 'selected' : '' }}>Đang giao hàng</option>
                                <option value="3" {{ $order->status == 3 ? 'selected' : '' }}>Đã giao hàng</option>
                                <option value="4" {{ $order->status == 4 ? 'selected' : '' }}>Hủy</option>
                            </select>
                            <input type="text" name="reason" id="reason" class="form-control" style="display: none;">
                            <button type="submit" class="btn btn-primary">Xác nhận</button>
                        </form>
                    @else
                        <b>Đã giao hàng</b>
                    @endif
                </td>
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
@section('script')
<script>
    function toggleReasonInput(status) {
        var reasonInput = document.getElementById('reason');
        if (status === '4') { // '4' corresponds to Đã hủy (Canceled)
            reasonInput.style.display = 'block'; // Show reason input field
        } else {
            reasonInput.style.display = 'none'; // Hide reason input field
        }
    }
</script>
@endsection

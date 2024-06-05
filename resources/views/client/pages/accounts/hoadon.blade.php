@extends('layouts.client')
@section('css')
    <style>
        .header__menu ul li a {
            text-decoration: none
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
@endsection
@section('content')
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Đổi Mật Khẩu</h4>
                        <div class="breadcrumb__links">
                            <a href="/">Home</a>
                            <a href="{{ route('account.profile') }}">Tài Khoản</a>
                            <span>Hóa Đơn</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="container-md mt-5">
        <div class="row g-3">
            <div class="col-12">
                <div class="row g-3">
                    <div class="col-lg-3 col-md-4 col-12">
                        <div class="nav nav-pills flex-column" role="tablist">
                            <div class="card">
                                <a href="{{ route('account.profile') }}"
                                    class=" btn nav-link border-0 border-bottom p-3 pdcatt"
                                    style="font-size: 17px; color:black;">THÔNG
                                    TIN TÀI KHOẢN
                                </a>
                                <button class="nav-link border-0 border-bottom p-3 pdcatt active" id="home-tab"
                                    data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab"
                                    aria-controls="profile" aria-selected="false"
                                    style="font-size: 17px; background-color:black;">HÓA ĐƠN
                                </button>
                                <a href="{{ route('account.update') }}"
                                    class=" btn nav-link border-0 border-bottom p-3 pdcatt"
                                    style="font-size: 17px; color:black;">THAY
                                    ĐỔI THÔNG TIN
                                </a>
                                <a href="{{ route('account.updatePass') }}"
                                    class=" btn nav-link border-0 border-bottom p-3 pdcatt"
                                    style="font-size: 17px; color:black;">ĐỔI MẬT
                                    KHẨU
                                </a>
                                <a style="font-size: 17px; color:black;" class="btn p-3 pdcatt"
                                    href="{{ route('logout') }}">ĐĂNG
                                    XUẤT</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-8 col-12">
                        <div class="tab-content border-0">
                            <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab"
                                tabindex="0">
                                <div class="table-responsive">
                                    <table class="table text-center">
                                        <thead class="table-dark">
                                            <tr>
                                                <th class="p-3 align-middle" scope="col">STT</th>
                                                <th class="p-3 align-middle" scope="col">Ngày mua hàng</th>
                                                <th class="p-3 align-middle" scope="col">Trạng thái</th>
                                                <th class="p-3 align-middle" scope="col">Tổng tiền</th>
                                                <th class="p-3 align-middle" scope="col">Detail</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($orders as $item)
                                                <tr ng-repeat="c in cart">
                                                    <td class="col-2">{{ $loop->index + 1 }}
                                                    </td>
                                                    <td class="col-md-2 col-sm-3 align-middle" style="font-weight: 600;">
                                                        {{ $item->created_at->format('d/m/Y') }}
                                                    </td>
                                                    <td class="col-md-3 col-sm-3 align-middle" style="font-weight: 600;">
                                                        @if ($item->status == 0)
                                                            Chưa xác nhận
                                                        @elseif ($item->status == 1)
                                                            Đã xác nhận
                                                        @elseif ($item->status == 2)
                                                            Đang giao hàng
                                                        @elseif ($item->status == 3)
                                                            Đã giao hàng
                                                        @else
                                                            Đã hủy <br>
                                                            ({{ $item->reason }})
                                                        @endif
                                                    </td>

                                                    <td>
                                                        {{ number_format($item->totalPrice < 0 ? 0 : $item->totalPrice) }}
                                                        VND
                                                        @if ($item->coupon_id)
                                                            <br>
                                                            (Đã áp mã giảm giá: {{ $item->coupon->code }})
                                                        @endif
                                                    </td>
                                                    <td class="col-md-1 col-sm-3 align-middle fw-bold"><a
                                                            href="{{ route('account.showhoadon', $item) }}"
                                                            class="text-black btn"><i class="fa-solid fa-eye"></i></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="pagination justify-content-center">
                                    {{ $orders->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="https://kit.fontawesome.com/3377b5a3db.js" crossorigin="anonymous"></script>
@endsection

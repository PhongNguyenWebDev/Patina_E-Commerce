@extends('layouts.client')
@section('content')
    @include('client.blocks.banner')
    <section class="breadcrumb-option my-xl-5">
        <div class="container">
            <h4>Hóa đơn</h4>
            <div class="col-lg-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="text-dark" href="{{ route('client.home-page') }}">Trang chủ</a>
                        </li>
                        <li class="breadcrumb-item"><a class="text-dark" href="#">Tài khoản</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Hóa đơn</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>
    <div class="container-md mt-5 my-xl-4">
        <div class="row g-3">
            <div class="col-12">
                <div class="row gx-5 mb-4">
                    <div class="col-lg-4 col-md-4 col-12 my-xl-0 my-3">
                        <div class="nav nav-pills flex-column" role="tablist">
                            <x-nav-account href="{{ route('client.account.profile-page') }}" :active="request()->routeIs('client.account.profile-page')">
                                THÔNG TIN TÀI KHOẢN
                            </x-nav-account>

                            <x-nav-account href="{{ route('client.account.hoadon') }}" :active="request()->routeIs('client.account.hoadon')">
                                HÓA ĐƠN
                            </x-nav-account>

                            <x-nav-account href="{{ route('client.account.update') }}" :active="request()->routeIs('client.account.update')">
                                THAY ĐỔI THÔNG TIN
                            </x-nav-account>

                            <x-nav-account href="{{ route('client.account.updatePass') }}" :active="request()->routeIs('client.account.updatePass')">
                                ĐỔI MẬT KHẨU
                            </x-nav-account>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-8 col-12">
                        <div class="tab-content border-0">
                            <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab"
                                tabindex="0">
                                <div class="table-responsive">
                                    <table class="table text-center">
                                        <thead class="table-secondary">
                                            <tr>
                                                <th class="p-3 align-middle" scope="col">STT</th>
                                                <th class="p-3 align-middle" scope="col">Ngày mua hàng</th>
                                                <th class="p-3 align-middle" scope="col">Trạng thái</th>
                                                <th class="p-3 align-middle" scope="col">Tổng tiền</th>
                                                <th class="p-3 align-middle" scope="col">Chi tiết</th>
                                                <th class="p-3 align-middle" scope="col">Hủy đơn hàng</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($orders as $item)
                                                <tr ng-repeat="c in cart">
                                                    <td class="col">{{ $loop->index + 1 }}
                                                    </td>
                                                    <td class="col align-middle">
                                                        {{ $item->created_at->format('d/m/Y') }}
                                                    </td>
                                                    <td class="col align-middle text-center" style="font-weight: 600;">
                                                        @if ($item->status == 0)
                                                            <p class="m-0 text-bg-secondary badge">
                                                                Chưa xác nhận
                                                            </p>
                                                        @elseif ($item->status == 1)
                                                            <p class="m-0 text-bg-success badge">
                                                                Đã xác nhận
                                                            </p>
                                                        @elseif ($item->status == 2)
                                                            <p class="m-0 text-bg-warning badge">
                                                                Đang giao hàng
                                                            </p>
                                                        @elseif ($item->status == 3)
                                                            <p class="m-0 text-bg-info badge">
                                                                Đã giao hàng
                                                            </p>
                                                        @elseif ($item->status == 4)
                                                            <p class="m-0 text-bg-info badge">
                                                                Đã thanh toán trước
                                                            </p>
                                                        @else
                                                            <p class="m-0 text-bg-danger badge">
                                                                Đã hủy
                                                            </p>
                                                            <br>
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
                                                    <td class="col align-middle fw-bold"><a
                                                            href="{{ route('client.account.showhoadon', $item) }}"
                                                            class="text-black btn"><i class="fa-solid fa-eye"></i></a>
                                                    </td>
                                                    <td>
                                                        <form class="m-0" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn border-0">
                                                                <i class="fa-solid text-danger fa-bomb fa-xl"></i>
                                                            </button>
                                                        </form>
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

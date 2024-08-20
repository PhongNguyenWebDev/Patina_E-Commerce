@extends('layouts.client')
@section('content')
    @include('client.blocks.banner')
    <section class="breadcrumb-option my-xl-5">
        <div class="container">
            <h4>Hóa đơn</h4>
            <div class="col-lg-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="text-dark" href="#">Home</a></li>
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
                <div class="row gx-5">
                    <div class="col-lg-4 col-md-4 col-12">
                        <div class="nav nav-pills flex-column" role="tablist">
                            <div class="card rounded-0">
                                <a href="{{ route('client.account.profile-page') }}"
                                    class=" btn nav-link border-0 border-bottom p-3 pdcatt" style="color:black;">THÔNG
                                    TIN TÀI KHOẢN
                                </a>
                                <button class="nav-link border-0 border-bottom p-3 pdcatt bg-secondary rounded-0 active"
                                    id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab"
                                    aria-controls="profile" aria-selected="false">HÓA ĐƠN
                                </button>
                                <a href="{{ route('client.account.update') }}"
                                    class=" btn nav-link border-0 border-bottom p-3 pdcatt" style="color:black;">THAY
                                    ĐỔI THÔNG TIN
                                </a>
                                <a href="{{ route('client.account.updatePass') }}"
                                    class=" btn nav-link border-0 border-bottom p-3 pdcatt" style="color:black;">ĐỔI MẬT
                                    KHẨU
                                </a>
                                <a style="color:black;" class="btn p-3 pdcatt" href="{{ route('logout') }}">ĐĂNG
                                    XUẤT</a>
                            </div>
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

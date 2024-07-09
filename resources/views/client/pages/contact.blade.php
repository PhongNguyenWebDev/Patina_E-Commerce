@extends('layouts.client')
@section('content')
    @include('client.blocks.banner')
    <section class="container p-3 p-xl-5 my-5">
        <div class="row justify-content-center">
            <div class="col-lg-4">
                <div class="d-flex flex-column my-4">
                    @foreach ($infoPhone as $phone)
                        <div class="col-xl-12 d-flex align-items-center mb-3">
                            <img src="{{ $phone->images }}" alt="">
                            <p class="ps-3 mb-0">{{ $phone->detail }}</p>
                        </div>
                    @endforeach
                    @foreach ($infoEmail as $email)
                        <div class="col-xl-12 d-flex align-items-center mb-3">
                            <img src="{{ $email->images }}" alt="">
                            <p class="ps-3 mb-0">{{ $email->detail }}</p>
                        </div>
                    @endforeach
                    @foreach ($infoLocation as $location)
                        <div class="col-xl-12 d-flex align-items-center mb-3">
                            <img src="{{ $location->images }}" alt="">
                            <p class="ps-3 mb-0">{{ $location->detail }}</p>
                        </div>
                    @endforeach
                    <div class="col-xl-12 d-flex align-items-center mb-3">
                        @foreach ($socialn as $social)
                            <div class="icon-footer m-2">
                                <a style="color: #8d6440" href="{{ $social->link }}">{!! $social->icon !!}</a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <form class="container-fluid p-0" method="POST" action="">
                    @csrf
                    <div class="row g-2">
                        <div class="col-md-12 form-floating mb-3">
                            <input type="text" class="form-control" id="floatingFirstName" name="name"
                                placeholder="Name">
                            <label class="fs-5" for="floatingFirstName">Họ và tên</label>
                        </div>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="floatingEmail" name="email"
                            placeholder="Email address">
                        <label class="fs-5" for="floatingEmail">Địa chỉ email</label>
                    </div>
                    <div class="form-floating mb-3">
                        <textarea class="form-control" name="note" placeholder="Leave a comment here" id="floatingTextarea2"
                            style="height: 300px"></textarea>
                        <label class="fs-5" for="floatingTextarea2">Phản hồi</label>
                    </div>
                    <button class="btn mt-4 rounded-1 px-4 py-2 btn-contact fs-4">Gửi phản hồi</button>
                </form>
            </div>
        </div>
    </section>
@endsection

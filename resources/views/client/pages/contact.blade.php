@extends('layouts.client')
@section('content')
    @include('client.blocks.banner')
    <section class="container p-3 p-xl-5 my-5">
        <div class="row gx-5 justify-content-center">
            <div class="col-lg-4">
                <div class="d-flex flex-column my-xl-0 my-4">
                    @foreach ($infoPhone as $phone)
                        <div class="col-xl-12 d-flex align-items-center mb-3">
                            <img style="object-fit: cover; width:35px" src="{{ $phone->images }}" alt="">
                            <p class="ps-3 mb-0">{{ $phone->detail }}</p>
                        </div>
                    @endforeach
                    @foreach ($infoEmail as $email)
                        <div class="col-xl-12 d-flex align-items-center mb-3">
                            <img style="object-fit: cover; width:35px" src="{{ $email->images }}" alt="">
                            <p class="ps-3 mb-0">{{ $email->detail }}</p>
                        </div>
                    @endforeach
                    @foreach ($infoLocation as $location)
                        <div class="col-xl-12 d-flex align-items-center mb-3">
                            <img style="object-fit: cover; width:35px" src="{{ $location->images }}" alt="">
                            <p class="ps-3 mb-0">{{ $location->detail }}</p>
                        </div>
                    @endforeach
                    <div class="col-xl-12 d-flex align-items-center mb-3">
                        @foreach ($socialn as $social)
                            <div class="icon-footer m-2">
                                <a class="text-dark" href="{{ $social->detail }}">{!! $social->images !!}</a>
                            </div>
                        @endforeach
                    </div>
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.443980540117!2d106.6234886757038!3d10.853796757760483!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752a20d8555e69%3A0x743b1e9558fb89e0!2sQTSC%209%20Building!5e0!3m2!1svi!2s!4v1723562053383!5m2!1svi!2s"
                        width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
            <div class="col-lg-8">
                <form class="container-fluid p-0" method="POST" action="">
                    @csrf
                    <div class="row g-2">
                        <div class="col-md-12 form-floating mb-3">
                            <input type="text" class="form-control" id="floatingFirstName" name="name"
                                placeholder="Name">
                            <label style="font-size: 18px;" for="floatingFirstName">Họ và tên</label>
                        </div>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="floatingEmail" name="email"
                            placeholder="Email address">
                        <label style="font-size: 18px;" for="floatingEmail">Địa chỉ email</label>
                    </div>
                    <div class="form-floating mb-3">
                        <textarea class="form-control" name="note" placeholder="Leave a comment here" id="floatingTextarea2"
                            style="height: 300px"></textarea>
                        <label style="font-size: 18px;" for="floatingTextarea2">Phản hồi</label>
                    </div>
                    <button class="btn btn-dark p-2 fw-medium" style="font-size: 18px">Gửi phản hồi</button>
                </form>
            </div>
        </div>
    </section>
@endsection

@extends('layouts.client')
@section('content')
    <section class="blog-hero spad">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-9 text-center">
                    <div class="blog__hero__text">
                        <h2>{{$blog->name}}</h2>
                        <ul>
                            <li>By {{$blog->author}}</li>
                            <li>{{ $blog->created_at->format('d F Y') }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Details Hero End -->

    <!-- Blog Details Section Begin -->
    <section class="blog-details spad">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-12">
                    <div class="blog__details__pic">
                        <img src="{{$blog->image}}" alt="">
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="blog__details__content">
                        <div class="blog__details__share">
                            <span>share</span>
                            <ul>
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#" class="youtube"><i class="fa fa-youtube-play"></i></a></li>
                            </ul>
                        </div>
                        <div class="blog__details__text">
                            {!!$blog->content!!}
                        </div>

                        <div class="blog__details__quote">
                            <i class="fa fa-quote-left"></i>
                            <p>“{{$blog->quote}}”</p>
                            <h6>_ {{$blog->author}} _</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <hr>
    <section class="latest spad1">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <span>Latest News</span>
                        <h2>Fashion New Trends</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($relatedBlog as $related)
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic set-bg" data-setbg="{{ $related->image }}"></div>
                        <div class="blog__item__text">
                            <span><img src="{{ asset('img/icon/calendar.png') }}" alt=""> {{ $related->created_at->format('d F Y') }}</span>
                            <h5>{{ $related->name }}</h5>
                            <a href="{{route('blog.detail',$related->slug)}}">Read More</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection

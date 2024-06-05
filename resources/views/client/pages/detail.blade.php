@extends('layouts.client')
@section('content')
    <section class="shop-details">
        <div class="product__details__pic">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="product__details__breadcrumb">
                            <a href="{{ route('home') }}">Trang chủ</a>
                            <a href="{{ route('shop') }}">Shop</a>
                            <span>{{ $products->name }}</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-3">
                        <ul class="nav nav-tabs" role="tablist">
                            @foreach ($products->gallery as $key => $images)
                                <li class="nav-item">
                                    <a class="nav-link {{ $key == 0 ? 'active' : '' }}" data-toggle="tab"
                                        href="#tabs-{{ $images->id }}" role="tab">
                                        <div class="product__thumb__pic set-bg" data-setbg="{{ $images->name }}">
                                        </div>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="col-lg-6 col-md-9">
                        <div class="tab-content">
                            @foreach ($products->gallery as $key => $images)
                                <div class="tab-pane {{ $key == 0 ? 'active' : '' }}" id="tabs-{{ $images->id }}"
                                    role="tabpanel">
                                    <div class="product__details__pic__item">
                                        <img src="{{ $images->name }}" alt="">
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="product__details__content">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-8">
                        <div class="product__details__text">
                            <h4>{{ $products->name }}</h4>
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>
                                <span> - {{ $comments->count() }} Reviews</span>
                            </div>
                            <h3>{{ number_format($products->sale_price) ? number_format($products->sale_price) : number_format($products->price) }}
                                <span>{{ number_format($products->sale_price) ? number_format($products->price) : null }}
                                </span><a style="font-size: 17px">VNĐ</a>
                            </h3>
                            <p>{{ $products->summary }}</p>
                            <form action="{{ route('cart.add', $products->id) }}" method="POST">
                                @csrf
                                <div class="product__details__option">
                                    <div class="product__details__option__size">
                                        <select class="form-control" id="size_id" name="size_id">
                                            @foreach ($products->sizes as $size)
                                                <option value="{{ $size->id }}">{{ $size->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="product__details__option__size">
                                        <select class="form-control" id="color_id" name="color_id">
                                            @foreach ($products->colors as $color)
                                                <option value="{{ $color->id }}">{{ $color->name }}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                                <div class="product__details__cart__option">
                                    <div class="quantity">
                                        <div class="pro-qty">
                                            <input type="text" name="quantity" value="1">
                                        </div>
                                    </div>
                                    @if (Auth::check())
                                        <button type="submit" class="primary-btn">add to cart</button>
                                    @else
                                        <a class="primary-btn"
                                            onclick="alert('Vui lòng đăng nhập để yêu thích sản phẩm này')"
                                            href="{{ route('login') }}">add to
                                            cart</a>
                                    @endif

                                </div>
                            </form>
                            <div class="product__details__last__option">
                                <h5><span>Guaranteed Safe Checkout</span></h5>
                                <img src="{{ asset('img/shop-details/details-payment.png') }}" alt="">
                                <ul>
                                    <li><span>SKU:</span> {{ $products->id }}</li>
                                    <li><span>Categories:</span> <a style="color: black;"
                                            href="{{ route('shop', $category) }}">{{ $products->category->name }}</a></li>
                                    <li><span>Tag:</span>
                                        @foreach ($products->tags as $tag)
                                            <a style="color: black;" href="">{{ $tag->name }},</a>
                                        @endforeach
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="product__details__tab">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#tabs-5" role="tab">Mô tả</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#tabs-6" role="tab">Bình
                                        luận({{ $comments->count() }})</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tabs-5" role="tabpanel">
                                    <div class="product__details__tab__content">
                                        {!! $products->description !!}
                                    </div>
                                </div>
                                <div class="tab-pane" id="tabs-6" role="tabpanel">
                                    <div class="product__details__tab__content">
                                        <div class="product__details__tab__content__item">
                                            <div class="row">
                                                <div class="container mt-2">
                                                    <!-- Comment Form -->
                                                    @if (Auth()->check())
                                                        <form action="{{ route('comment', $products->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            <div class="mb-3">
                                                                <textarea class="form-control" name="comment" rows="3" placeholder="Bình luận ở đây" required></textarea>
                                                            </div>
                                                            <button type="submit" class="btn btn-dark">Submit</button>
                                                        </form>
                                                    @else
                                                        <div class="alert alert-danger">
                                                            Vui lòng đăng nhập để bình luận!
                                                        </div>
                                                    @endif
                                                    <!-- Comments -->
                                                    <div class="mt-4">
                                                        <ul class="list-group">
                                                            @foreach ($comments as $item)
                                                                <li class="list-group-item">
                                                                    <div class="d-flex justify-content-between">
                                                                        <div class="d-flex align-items-center">
                                                                            <img src="https://via.placeholder.com/50"
                                                                                alt="Avatar"
                                                                                class="comment-avatar me-2">
                                                                            <div style="margin-left: 10px">
                                                                                <h6>{{ $item->users->name }} <small
                                                                                        class="ms-2 text-muted"
                                                                                        style="font-size:13px">{{ $item->created_at->format('d/m/Y') }}</small>
                                                                                </h6>

                                                                            </div>
                                                                        </div>
                                                                        <div>
                                                                            @can('mycomment', $item)
                                                                                <a onclick="return confirm('Bạn có chắc muốn xóa bình luận này?')"
                                                                                    href="{{ route('comment.delete', $item) }}"class="btn btn-outline-danger btn-sm"><i
                                                                                        class="fa fa-trash"></i></a>
                                                                            @endcan

                                                                        </div>
                                                                    </div>
                                                                    <p class="mt-2">{{ $item->comment }}</p>
                                                                </li>
                                                            @endforeach

                                                        </ul>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shop Details Section End -->

    <!-- Related Section Begin -->
    <section class="related spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="related-title">Sản phẩm liên quan</h3>
                </div>
            </div>
            <div class="row">
                @foreach ($relatedProducts as $relatedProduct)
                    <div class="col-lg-3 col-md-6 col-sm-6 col-sm-6">
                        <div class="product__item">
                            <div class="product__item__pic set-bg" data-setbg="{{ $relatedProduct->images }}">
                                <ul class="product__hover">
                                    @if (Auth::check())
                                        <li><a href="{{ route('favorite.add', $relatedProduct->id) }}"><img
                                                    src="{{ asset('img/icon/heart.png') }}" alt=""></a>
                                        </li>
                                    @else
                                        <li><a onclick="alert('Vui lòng đăng nhập để yêu thích sản phẩm này')"
                                                href="{{ route('login') }}"><img src="{{ asset('img/icon/heart.png') }}"
                                                    alt=""></a>
                                        </li>
                                    @endif

                                    <li><a href="{{ route('detail', [$relatedProduct->category->slug, $relatedProduct->slug]) }}"><img
                                                src="{{ asset('img/icon/search.png') }}" alt=""></a>
                                    </li>
                                </ul>
                            </div>
                            <div class="product__item__text">
                                <h6>{{ $relatedProduct->name }}</h6>
                                <div class="rating">
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                </div>
                                <h5>{{ number_format($relatedProduct->sale_price ? $relatedProduct->sale_price : $relatedProduct->price) }}
                                    VNĐ</h5>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection

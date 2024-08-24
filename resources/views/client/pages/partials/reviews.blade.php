@foreach ($reviews as $review)
    @if ($review->status === 0)
        <div class="mt-box">
            <div class="d-flex">
                <div class="rounded-circle border d-flex justify-content-center align-items-center mx-2"
                    style="width: 75px; height: 75px;">
                    <i class="fa-regular fa-user"></i>
                </div>
                <div class="column">
                    <span class="fs-4">{{ $review->user->name }}</span>
                    <ul class="m-0 p-0 d-flex">
                        @for ($i = 1; $i <= 5; $i++)
                            @if ($i <= $review->rating_point)
                                <li class="nav-link"><i class="fa fa-star text-warning"></i></li>
                            @else
                                <li class="nav-link"><i class="fa fa-star-o text-warning"></i></li>
                            @endif
                        @endfor
                    </ul>
                    <time datetime="{{ $review->created_at }}">{{ $review->created_at->format('d /m /Y') }}</time>
                    <p class="pt-3">{{ $review->reviews }}</p>
                </div>
            </div>
        </div>
    @endif
@endforeach

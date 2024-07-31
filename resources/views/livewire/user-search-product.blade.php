<div class="my-xl-4 w-75 d-flex justify-content-center">
    <form class="d-flex search-popular-products w-50" method="GET" action="{{ route('client.shop-page') }}"
        role="search">
        <input wire:model.live="search" class="w-100 form-control py-2" style="letter-spacing: -0.044em" type="search"
            name="query" placeholder="Hãy nhập tên của một sản phẩm mà bạn đang tìm kiếm...">
        <button class="border-0" type="button">
            <i class="fa-solid fa-magnifying-glass fa-xl"></i>
        </button>
    </form>

    <ul class="nav-item">
        <li class="nav-link ">
            @foreach ($products as $product)
                <a class="nav-link py-2" href="shop/{{ $product->slug }}">
                    <div class="container">
                        <div class="row align-items-center text-start">
                            <div class="col-3 d-flex justify-content-center">
                                <img class="img-thumbnail" style="width: 5rem" src="{{ $product->images }}"
                                    alt="">
                            </div>
                            <div class="col-9">
                                <p class="fw-medium">{{ $product->name }}</p>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        </li>
    </ul>
</div>

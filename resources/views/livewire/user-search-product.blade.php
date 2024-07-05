<div class="my-xl-5 my-2 w-75 d-flex justify-content-center">
    <form class="d-flex search-popular-products w-75" method="GET" action="{{ route('client.shop-page') }}" role="search">
        <input wire:model.live="search" class="w-100 form-control" type="search" name="query" placeholder="Hãy nhập tên của một sản phẩm mà bạn đang tìm kiếm...">
        <button class="border-0" type="button">
            <i class="fa-solid fa-magnifying-glass fa-xl"></i>
        </button>
    </form>
    <div class="dropdown-menu d-block py-0 w-50 mt-md-5">
        @foreach($products as $product)
            <a href="shop/{{$product->slug}}">
                <div class="d-flex px-5">
                    <div class="w-25">
                        <img class="img-thumbnail" style="width: 5rem" src="{{$product->images}}" alt="">
                    </div>
                    <div class="w-75">
                        <p style="text-decoration: none">{{$product->name}}</p>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
</div>

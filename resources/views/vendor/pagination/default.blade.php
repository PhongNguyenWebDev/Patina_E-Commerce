@if ($paginator->hasPages())
    <div class="pagination">
        <ul>
            {{-- Link đến trang trước --}}
            @if ($paginator->onFirstPage())
                <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <a href="#"><i class="fa fa-caret-left" aria-hidden="true"></i></a>
                </li>
            @else
                <li>
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')"><i
                            class="fa fa-caret-left" aria-hidden="true"></i></a>
                </li>
            @endif

            {{-- Các phần tử phân trang --}}
            @foreach ($elements as $element)
                {{-- Dấu ba chấm --}}
                @if (is_string($element))
                    <li class="disabled" aria-disabled="true"><a href="#">{{ $element }}</a></li>
                @endif

                {{-- Mảng các liên kết --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="active" aria-current="page"><a href="#">{{ $page }}</a></li>
                        @else
                            <li><a href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Link đến trang sau --}}
            @if ($paginator->hasMorePages())
                <li class="next">
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')"><i
                            class="fa fa-caret-right" aria-hidden="true"></i></a>
                </li>
            @else
                <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i></a>
                </li>
            @endif
        </ul>
    </div>
@endif

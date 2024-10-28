<div class="pagination-area">
    <div class="nav-links">
        {{-- Previous page link --}}
        @if ($paginator->previousPageUrl())
            <a href="{{ $paginator->previousPageUrl() }}" class="prev page-numbers"><i class="ri-arrow-left-s-line"></i></a>
        @else
            <span class="prev page-numbers disabled"><i class="ri-arrow-left-s-line"></i></span>
        @endif

        {{-- Page numbers --}}
        @for ($i = 1; $i <= $paginator->lastPage(); $i++)
            @if ($i == $paginator->currentPage())
                <span class="page-numbers current">{{ $i }}</span>
            @else
                <a href="{{ $paginator->url($i) }}" class="page-numbers">{{ $i }}</a>
            @endif
        @endfor

        {{-- Next page link --}}
        @if ($paginator->nextPageUrl())
            <a href="{{ $paginator->nextPageUrl() }}" class="next page-numbers"><i class="ri-arrow-right-s-line"></i></a>
        @else
            <span class="next page-numbers disabled"><i class="ri-arrow-right-s-line"></i></span>
        @endif
    </div>
</div>
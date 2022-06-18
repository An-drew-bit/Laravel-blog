@if($paginator->hasPages())

    <nav class="pgn" data-aos="fade-up">
        <ul>
            @if ($paginator->onFirstPage())
                <li aria-label="@lang('pagination.previous')"><a class="pgn__prev">Prev</a></li>
            @else
                <li>
                    <a class="pgn__prev" href="{{ $paginator->previousPageUrl() }}"
                       rel="prev" aria-label="@lang('pagination.previous')">Prev</a>
                </li>
            @endif

            @if($paginator->currentPage() > 3)
                <li><a class="pgn__num" href="{{ $paginator->url(1) }}">1</a></li>
            @endif

            @foreach(range(1, $paginator->lastPage()) as $i)
                @if($i >= $paginator->currentPage() - 2 && $i <= $paginator->currentPage() + 2)
                    @if ($i == $paginator->currentPage())
                        <li><span class="pgn__num current">{{ $i }}</span></li>
                    @else
                        <li><a class="pgn__num" href="{{ $paginator->url($i) }}">{{ $i }}</a></li>
                    @endif
                @endif
            @endforeach

            @if($paginator->currentPage() < $paginator->lastPage() - 3)
                <li><span class="pgn__num dots">…</span></li>
            @endif

            @if($paginator->currentPage() < $paginator->lastPage() - 2)
                <li><a class="pgn__num"
                       href="{{ $paginator->url($paginator->lastPage()) }}">{{ $paginator->lastPage() }}</a>
                </li>
            @endif

            @if ($paginator->hasMorePages())
                <li rel="next"><a class="pgn__next" href="{{ $paginator->nextPageUrl() }}">Next</a></li>
            @else
                <li><a class="pgn__next">Next</a></li>
            @endif
        </ul>
    </nav>

@endif

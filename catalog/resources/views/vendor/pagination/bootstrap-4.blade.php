
@if ($paginator->hasPages())
    <link href="{{ asset('css/pagination.css') }}" rel="stylesheet">
    <nav>
        <ul class="pagination">
            @if ($paginator->onFirstPage())
                <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span class="page-link" aria-hidden="true">&lsaquo;</span>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
                </li>
            @endif
            @php
                $start = max(1, $paginator->currentPage() - 2);
                $end = min($start + 5, $paginator->lastPage());
            @endphp
            @if ($start > 1)
                <li class="page-item" aria-disabled="true"><a class="page-link" href="{{ $paginator->url(0) }}">...</a></li>
            @endif
            @for ($i = $start; $i <= $end; $i++)
                @if ($i == $paginator->currentPage())
                    <li class="page-item active" aria-current="page"><span class="page-link">{{ $i }}</span></li>
                @else
                    <li class="page-item"><a class="page-link" href="{{ $paginator->url($i) }}">{{ $i }}</a></li>
                @endif
            @endfor
            @if ($end < $paginator->lastPage())
                <li class="page-item" aria-disabled="true"><a class="page-link" href="{{ $paginator->url($paginator->lastPage())}}">...</a></li>
            @endif
            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
                </li>
            @else
                <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span class="page-link" aria-hidden="true">&rsaquo;</span>
                </li>
            @endif
        </ul>
    </nav>
@endif




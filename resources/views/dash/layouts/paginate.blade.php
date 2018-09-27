@if ($paginator->hasPages())
    <div class="pagination-w mt-4">
        <div class="pagination-links">
            <ul class="pagination">

                @if ($paginator->onFirstPage())
                    <li class="page-item disabled"><a class="page-link disabled">{!! trans("pagination.previous") !!}</a></li>
                @else
                    <li class="page-item"><a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev">&laquo;</a></li>
                @endif

                @foreach ($elements as $element)
                <!-- "Three Dots" Separator -->
                    @if (is_string($element))
                        <li class="page-item disabled"><a class="page-link">{{ $element }}</a></li>
                    @endif

                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <li class="page-item active"><a class="page-link disabled">{{ $page }}</a></li>
                            @else
                                <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                            @endif
                        @endforeach
                    @endif
                @endforeach

                @if ($paginator->hasMorePages())
                    <li class="page-item"><a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next">&raquo;</a></li>
                @else
                    <li class="page-item disabled"><a class="page-link disabled">{!! trans("pagination.next") !!}</a></li>
                @endif

            </ul>
        </div>
    </div>
@endif

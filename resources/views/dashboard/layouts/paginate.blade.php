@if ($paginator->hasPages())
<div class="clearfix"></div>
<div class="pagination-container" style="margin: 0 auto">
    <nav class="pagination pagination-sm">
        <ul>
        <!-- Previous Page Link -->
        @if (!$paginator->onFirstPage())
            <li>
                <a class="ripple-effect" href="{{ $paginator->previousPageUrl() }}">
                    <i class="simple-icon-arrow-left"></i>
                </a>
            </li>
        @endif
        <!-- Pagination Elements -->
        @foreach ($elements as $element)
        <!-- "Three Dots" Separator -->
            @if (is_string($element))
                <li><a class="current-page">{{ $element }}</a></li>
            @endif
        <!-- Array Of Links -->
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li><a class="ripple-effect current-page">{{ $page }}</a></li>
                    @else
                        <li><a class="ripple-effect" href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach
        <!-- Next Page Link -->
        @if ($paginator->hasMorePages())
            <li>
                <a class="ripple-effect" href="{{ $paginator->nextPageUrl() }}">
                    <i class="simple-icon-arrow-right"></i>
                </a>
            </li>
        @endif
        </ul>
    </nav>
</div>
<div class="clearfix"></div>
@endif

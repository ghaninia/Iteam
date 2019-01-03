<div class="col-12">
    <h3>{{ $information['title'] }}</h3>
    <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
        @if(isset($information['breadcrumb']) && is_array($information['breadcrumb']))
            <ol class="breadcrumb pt-0">
                <li class="breadcrumb-item">
                    <a href="{{ route('user.main') }}">{{ trans('dash.pages.dashboard.label') }}</a>
                </li>
                @foreach($information['breadcrumb'] as $name => $link )
                    <li class="breadcrumb-item">
                        @if(!! $link)
                            <a href="{{ $link }}">
                                {{ $name }}
                            </a>
                        @else
                            {{ $name }}
                        @endif
                    </li>
                @endforeach
            </ol>
        @endif
    </nav>
    <div class="separator mb-5"></div>
</div>

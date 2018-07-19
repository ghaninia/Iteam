<!DOCTYPE html>
<html>
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/library.js') }}"></script>
    <script src="{{ asset('assets/js/dashboard.js') }}"></script>

    <title>{{ isset($information['title']) ? $information['title'] : options('title')  }}</title>
    <meta type="description" content="{{ isset($information['desc']) ? $information['desc'] : options('desc')  }}">
</head>
<body class="with-content-panel menu-position-side menu-side-right">
    <div class="all-wrapper with-side-panel solid-bg-all">
        <div class="layout-w">
            <!--------------------
            START - Mobile Menu
            -------------------->
            @include('dash.layouts.sidebar')
            <!--- END - Main Menu --->
            <div class="content-w">
                @if(isset($information['breadcrumb']) && is_array($information['breadcrumb']))
                <ul class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('dashboard.user.main') }}">{{ trans('dash.panel.sidebar.mainpage') }}</a>
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
                </ul>
                @endif
                <div class="content-i">
                    @yield("main")
                </div>
            </div>
            <div class="display-type"></div>
        </div>
    </div>
</body>
</html>
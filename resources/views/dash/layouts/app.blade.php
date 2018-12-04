<!DOCTYPE html>
<html>
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="ajax-url" content="{{ route('user.ajax') }}">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <title>{{ isset($information['title']) ? $information['title'] : options('title')  }}</title>
    <meta type="description" content="{{ isset($information['desc']) ? $information['desc'] : options('desc')  }}">
    <link rel="stylesheet" href="{{ mix("assets/css/app.css") }}">
    <link rel="stylesheet" href="{{ mix("assets/css/plugins.css") }}">
    <link rel="stylesheet" href="{{ mix("assets/css/fonts.css") }}">

</head>
{{--color-scheme-dark--}}
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
                        <a href="{{ route('user.main') }}">{{ trans('dash.panel.sidebar.mainpage') }}</a>
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


    <script src="{{ mix("assets/js/app.js") }}"></script>
    @yield('plugins')
    @if(session()->has(['status' , 'message']))
    <script>
        Snackbar.show({
            text: '{{ session()->pull('message') }}' ,
            pos: 'bottom-right',
            showAction: false ,
            actionText: "Dismiss",
            duration: 3000,
            textColor: '#fff',
            backgroundColor: '#383838'
        });
    </script>
    @endif

</body>
</html>

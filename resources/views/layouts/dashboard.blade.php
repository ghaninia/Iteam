<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <title>{{ isset($information['title']) ? $information['title'] : options('title')  }}</title>
    <meta type="description" content="{{ isset($information['desc']) ? $information['desc'] : options('desc')  }}">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{ asset("assets/css/main.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/css/vendor.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/css/color/dark.orange.css") }}">
    <script>
        const options = {
            ajax : "{{ route("user.ajax") }}"
        }
    </script>
</head>
<body
    @if( in_array( Route::currentRouteName() , ["login" , "register" , "password.request"] )) class="background" @else id="app-container" class="menu-default show-spinner" @endif>

    @auth
        @include("layouts.nav")
        @include("layouts.sidebar")
        <main>
            <div class="container-fluid">
                <div class="row">
                    @if(isset($information['breadcrumb']))
                        @include("layouts.breadcrumb" , compact("information") )
                    @endif
                    @yield("main")
                </div>
            </div>
        </main>
    @else
        @yield("main")
    @endauth

    <script src="{{ asset("assets/js/component.js") }}"></script>
    <script src="{{ asset("assets/js/core.js") }}"></script>
</body>
</html>
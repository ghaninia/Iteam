<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <title>{{ isset($information['title']) ? $information['title'] : options('title')  }}</title>
    <meta type="description" content="{{ isset($information['desc']) ? $information['desc'] : options('desc')  }}">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{ asset("assets/librarys/css/app.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/librarys/css/vendor/app.css") }}">
    <link name="color" rel="stylesheet"  href="{{ asset("assets/librarys/css/color/light.orange.css") }}">
    <script>
        const options = {
            ajax  : "{{ route("user.ajax") }}" ,
            token : "{{ csrf_token() }}"
        }
    </script>
</head>
<body
    @if( in_array( Route::currentRouteName() , ["login" , "register" , "password.request"] )) class="background" @else id="app-container" class="menu-default  show-spinner" @endif>

    @auth
        @include("dashboard.layouts.nav")
        @include("dashboard.layouts.sidebar")
        <main>
            <div class="container-fluid">
                <div class="row">
                    {{--@if(isset($information['breadcrumb']))--}}
                        {{--@include("dashboard.layouts.breadcrumb" , compact("information") )--}}
                    {{--@endif--}}
                    @yield("main")
                </div>
            </div>
        </main>
    @else
        @yield("main")
    @endauth

    <script
        src="{{
            in_array( Route::currentRouteName() , ["login" , "register" , "password.request"] ) ?
            asset("assets/auth/js/app.js") :
            asset("assets/dashboard/js/app.js")
        }}"
    ></script>
</body>
</html>
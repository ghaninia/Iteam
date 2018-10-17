<!DOCTYPE html>
<html lang="fa">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <link rel="stylesheet" href="{{ mix("assets/css/auth.css") }}">
    <title>{{ isset($information['title']) ? $information['title'] : options('title')  }}</title>
    <meta type="description" content="{{ isset($information['desc']) ? $information['desc'] : options('desc')  }}">
</head>

<body class="auth-wrapper">
    <div class="form-body @if( !in_array(Route::currentRouteName() , ['register','login'])) without-side @endif">
        <div class="website-logo">
            <a href="">
                <div class="logo">
                    <img class="logo-size" src="{{ asset( config("timo.information.logo") ) }}" alt="">
                </div>
            </a>
        </div>
        <div class="row">
            <div class="img-holder">
                <div class="bg"></div>
                <div class="info-holder">
                    <img src="{{ asset("assets/img/team/graphic3.svg") }}" alt="">
                </div>
            </div>
                @yield("main")
        </div>
    </div>
    <script src="{{ mix("assets/js/app.js") }}"></script>
</body>
</html>
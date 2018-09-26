<!DOCTYPE html>
<html lang="fa">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <link rel="stylesheet" href="{{ mix("assets/css/app.css") }}">
    <script src="{{ mix("assets/js/app.js") }}"></script>

    <title>{{ isset($information['title']) ? $information['title'] : options('title')  }}</title>
    <meta type="description" content="{{ isset($information['desc']) ? $information['desc'] : options('desc')  }}">
</head>

<body class="auth-wrapper">
<div class="all-wrapper menu-side with-pattern">
    <div class="auth-box-w">
        <div class="logo-w">
            <a href="">
                <img alt="" src="">
            </a>
        </div>
        @yield("main")
    </div>
</div>
</body>

</html>
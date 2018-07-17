<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
</head>

<body class="auth-wrapper">
<div class="all-wrapper menu-side with-pattern">
    <div class="auth-box-w">
        <div class="logo-w">
            <a href="index.html">
                <img alt="" src="img/logo-big.png">
            </a>
        </div>
        @yield("main")
    </div>
</div>
</body>

</html>
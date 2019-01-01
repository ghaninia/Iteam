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
</head>
<body
    @if( in_array( Route::currentRouteName() , ["login" , "register" , "password.request"] )) class="background" @else id="app-container" class="menu-default show-spinner" @endif>

    @auth
        <nav class="navbar fixed-top">
            <div class="d-flex align-items-center navbar-right">
                <a href="#" class="menu-button d-none d-md-block">
                    <svg class="main" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 9 17">
                        <rect x="0.48" y="0.5" width="7" height="1" />
                        <rect x="0.48" y="7.5" width="7" height="1" />
                        <rect x="0.48" y="15.5" width="7" height="1" />
                    </svg>
                    <svg class="sub" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 17">
                        <rect x="1.56" y="0.5" width="16" height="1" />
                        <rect x="1.56" y="7.5" width="16" height="1" />
                        <rect x="1.56" y="15.5" width="16" height="1" />
                    </svg>
                </a>

                <a href="#" class="menu-button-mobile d-xs-block d-sm-block d-md-none">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 26 17">
                        <rect x="0.5" y="0.5" width="25" height="1" />
                        <rect x="0.5" y="7.5" width="25" height="1" />
                        <rect x="0.5" y="15.5" width="25" height="1" />
                    </svg>
                </a>

                <div class="search" data-search-path="Layouts.Search.html?q=">
                    <input placeholder="Search...">
                    <span class="search-icon">
                        <i class="simple-icon-magnifier"></i>
                    </span>
                </div>
            </div>

            <a class="navbar-logo" href="Dashboard.Default.html">
                <span class="logo d-none d-xs-block"></span>
                <span class="logo-mobile d-block d-xs-none"></span>
            </a>

            <div class="navbar-left">
                <div class="header-icons d-inline-block align-middle">

                    <div class="position-relative d-none d-sm-inline-block">
                        <button class="header-icon btn btn-empty" type="button" id="iconMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="simple-icon-grid"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right mt-3 position-absolute" id="iconMenuDropdown">
                            <a href="#" class="icon-menu-item">
                                <i class="iconsmind-Equalizer d-block"></i>
                                <span>Settings</span>
                            </a>

                            <a href="#" class="icon-menu-item">
                                <i class="iconsmind-MaleFemale d-block"></i>
                                <span>Users</span>
                            </a>

                            <a href="#" class="icon-menu-item">
                                <i class="iconsmind-Puzzle d-block"></i>
                                <span>Components</span>
                            </a>

                            <a href="#" class="icon-menu-item">
                                <i class="iconsmind-Bar-Chart d-block"></i>
                                <span>Profits</span>
                            </a>

                            <a href="#" class="icon-menu-item">
                                <i class="iconsmind-File-Chart d-block"></i>
                                <span>Surveys</span>
                            </a>

                            <a href="#" class="icon-menu-item">
                                <i class="iconsmind-Suitcase d-block"></i>
                                <span>Tasks</span>
                            </a>

                        </div>
                    </div>


                    <button class="header-icon btn btn-empty d-none d-sm-inline-block" type="button" id="fullScreenButton">
                        <i class="simple-icon-size-fullscreen"></i>
                        <i class="simple-icon-size-actual"></i>
                    </button>

                </div>
                <div class="user d-inline-block">
                    <button class="btn btn-empty p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="name">{{ me()->fullname ?? me()->username }}</span>
                        <span>
                            <img alt="Profile Picture" src="{{ userPicture() }}">
                        </span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right mt-3">
                        <a class="dropdown-item" href="#">{{ trans("dash.profile.account.label") }}</a>
                        <a class="dropdown-item" href="#">{{ trans("dash.profile.password.label") }}</a>
                        <a class="dropdown-item" href="#">{{ trans("dash.profile.plan.label") }}</a>
                        <a class="dropdown-item" href="#">{{ trans("dash.profile.logout.label") }}</a>
                    </div>
                </div>
            </div>
        </nav>
        <div class="sidebar">

            <div class="main-menu">
                <div class="scroll">
                    <ul class="list-unstyled">
                        <li class="active">
                            <a href="{{ route("user.main") }}">
                                <i class="iconsmind-Shop-4"></i>
                                <span>{{ trans("dash.pages.dashboard.label") }}</span>
                            </a>
                        </li>
                        <li>
                            <a href="#payment">
                                <i class="iconsmind-Money-2"></i>
                                <span>{{ trans("dash.pages.payment.label") }}</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="sub-menu">
                <div class="scroll">
                    <ul class="list-unstyled" data-link="payment">
                        <li>
                            <a href="{{ route("user.payment.index") }}">
                                <i class="simple-icon-rocket"></i> Default
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
        <main>
            <div class="container-fluid">
                <div class="row">
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
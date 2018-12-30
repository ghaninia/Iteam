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
    <link rel="stylesheet" href="{{ asset("assets/css/color/light.orange.css") }}">

</head>
<body
    @if( in_array( Route::currentRouteName() , ["login" , "register" , "password.request"] ))
        class="background"
    @else
        id="app-container"
        class="menu-default"
    @endif>

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

                    <div class="position-relative d-inline-block">
                        <button class="header-icon btn btn-empty" type="button" id="notificationButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="simple-icon-bell"></i>
                            <span class="count">3</span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right mt-3 scroll position-absolute" id="notificationDropdown">

                            <div class="d-flex flex-row mb-3 pb-3 border-bottom">
                                <a href="#">
                                    <img src="img/profile-pic-l-2.jpg" alt="Notification Image" class="img-thumbnail list-thumbnail xsmall border-0 rounded-circle">
                                </a>
                                <div class="pl-3 pr-2">
                                    <a href="#">
                                        <p class="font-weight-medium mb-1">Joisse Kaycee just sent a new comment!</p>
                                        <p class="text-muted mb-0 text-small">09.04.2018 - 12:45</p>
                                    </a>
                                </div>
                            </div>

                            <div class="d-flex flex-row mb-3 pb-3 border-bottom">
                                <a href="#">
                                    <img src="img/notification-thumb.jpg" alt="Notification Image" class="img-thumbnail list-thumbnail xsmall border-0 rounded-circle">
                                </a>
                                <div class="pl-3 pr-2">
                                    <a href="#">
                                        <p class="font-weight-medium mb-1">1 item is out of stock!</p>
                                        <p class="text-muted mb-0 text-small">09.04.2018 - 12:45</p>
                                    </a>
                                </div>
                            </div>

                            <div class="d-flex flex-row mb-3 pb-3 border-bottom">
                                <a href="#">
                                    <img src="img/notification-thumb-2.jpg" alt="Notification Image" class="img-thumbnail list-thumbnail xsmall border-0 rounded-circle">
                                </a>
                                <div class="pl-3 pr-2">
                                    <a href="#">
                                        <p class="font-weight-medium mb-1">New order received! It is total $147,20.</p>
                                        <p class="text-muted mb-0 text-small">09.04.2018 - 12:45</p>
                                    </a>
                                </div>
                            </div>

                            <div class="d-flex flex-row mb-3 pb-3">
                                <a href="#">
                                    <img src="img/notification-thumb-3.jpg" alt="Notification Image" class="img-thumbnail list-thumbnail xsmall border-0 rounded-circle">
                                </a>
                                <div class="pl-3 pr-2">
                                    <a href="#">
                                        <p class="font-weight-medium mb-1">3 items just added to wish list by a user!</p>
                                        <p class="text-muted mb-0 text-small">09.04.2018 - 12:45</p>
                                    </a>
                                </div>
                            </div>

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
    @endauth

    @yield("main")

    <script src="{{ asset("assets/js/component.js") }}"></script>
</body>
</html>
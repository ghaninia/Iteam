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

        <div class="search" >
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

            <div class="d-none d-md-inline-block align-text-bottom">
                <div class="custom-switch custom-switch-primary-inverse custom-switch-small pr-5" data-toggle="tooltip" data-placement="right" title="{!! trans("dashboard.profile.account.color_dark") !!}">
                    <input class="custom-switch-input" id="switchDark" type="checkbox" >
                    <label class="custom-switch-btn" for="switchDark"></label>
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
                <div class="plan__nav alert-success alert">
                    {{ me()->plan->name }}
                    <div class="font-en ltr" data-toggle="tooltip" data-placement="bottom" title="{{ trans("dashboard.profile.plan.features.max_life") }}" style="font-size:10px!important;">{{ verta(me()->planUser->expire_at)->format("Y/m/d H:i") }}</div>
                </div>
                <a class="dropdown-item" href="{{ route("user.profile.account.index") }}">{{ trans("dashboard.profile.account.label") }}</a>
                <a class="dropdown-item" href="{{ route("user.profile.password.index") }}">{{ trans("dashboard.profile.password.label") }}</a>
                <a class="dropdown-item" href="{{ route("user.profile.plan.index") }}">{{ trans("dashboard.profile.plan.label") }}</a>
                <a class="dropdown-item" href="{{ route("user.profile.notification.index") }}">{{ trans("dashboard.profile.notification.label") }}</a>
                <a class="dropdown-item" href="{{ route("user.profile.skill.index") }}">{{ trans("dashboard.profile.skill.label") }}</a>
                <a class="dropdown-item" href="{{ route("user.profile.logout") }}" id="__logout">{{ trans("dashboard.profile.logout.label") }}</a>
            </div>
        </div>
    </div>
</nav>
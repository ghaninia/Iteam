<div class="menu-w
    selected-menu-color-light
    menu-activated-on-hover
    menu-has-selected-link
    color-scheme-dark
    color-style-bleft
    sub-menu-color-bleft
    menu-position-side
    menu-side-left
    menu-layout-mini
    sub-menu-style-over">

    <div class="logo-w">
        <a class="logo" href="index.html">
            <div class="logo-element"></div>
            <div class="logo-label">Clean Admin</div>
        </a>
    </div>
    <div class="logged-user-w avatar-inline">
        <div class="logged-user-i">
            <div class="avatar-w">
                <img alt="" src="{{ picture('avatar') }}">
            </div>
            <div class="logged-user-info-w">
                <div class="logged-user-name">{{ username(null,'user') }}</div>
                <div class="logged-user-role">{{ planname() }}</div>
            </div>
            <div class="logged-user-toggler-arrow">
                <div class="os-icon os-icon-chevron-down"></div>
            </div>
            <div class="logged-user-menu color-style-bleft">
                <div class="logged-user-avatar-info">
                    <div class="avatar-w">
                        <img alt="" src="{{ picture('avatar','thumbnail') }}">
                    </div>
                    <div class="logged-user-info-w">
                        <div class="logged-user-name">{{ username(null,'user') }}</div>
                        <div class="logged-user-role">{{ planname() }}</div>
                    </div>
                </div>
                <div class="bg-icon">
                    <i class="os-icon os-icon-wallet-loaded"></i>
                </div>
                <ul>
                    <li>
                        <a href="{{ route('dashboard.user.profile.account.index') }}">
                            <i class="os-icon os-icon-tasks-checked"></i>
                            <span>{{ trans('dash.panel.sidebar.profile.edit') }}</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('dashboard.user.profile.password.index') }}">
                            <i class="os-icon os-icon-fingerprint"></i>
                            <span>{{ trans('dash.panel.sidebar.profile.password') }}</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('dashboard.user.profile.notification.index') }}">
                            <i class="os-icon os-icon-email-2-at2"></i>
                            <span>{{ trans('dash.panel.sidebar.profile.notification') }}</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('dashboard.user.profile.logout') }}" id="logout">
                            <i class="os-icon os-icon-signs-11"></i>
                            <span>{{ trans('dash.panel.sidebar.profile.logout') }}</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
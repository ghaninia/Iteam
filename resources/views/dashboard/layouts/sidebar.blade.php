<div class="sidebar">

    <div class="main-menu">
        <div class="scroll">
            <ul class="list-unstyled">
                <li {{ activeSidebar("user.main" , true ) }}>
                    <a href="{{ route("user.main") }}">
                        <i class="iconsmind-Approved-Window"></i>
                        <span>{{ trans("dashboard.pages.dashboard.label") }}</span>
                    </a>
                </li>
                <li {{ activeSidebar("payment") }}>
                    <a href="#payment">
                        <i class="iconsmind-Money-2"></i>
                        <span>{{ trans("dashboard.pages.payment.label") }}</span>
                    </a>
                </li>
                <li {{ activeSidebar("profile") }}>
                    <a href="#profile">
                        <i class="iconsmind-Business-ManWoman"></i>
                        <span>{{ trans("dashboard.pages.profile.label") }}</span>
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
            <ul class="list-unstyled" data-link="profile">

                <li {{ activeSidebar("user.profile.account.index" , true ) }}>
                    <a href="{{ route('user.profile.account.index') }}">
                        <i class="iconsmind-Light-Bulb2"></i>
                        {{ trans("dashboard.profile.account.label") }}
                    </a>
                </li>

                <li {{ activeSidebar("user.profile.password.index" , true ) }}>
                    <a href="{{ route('user.profile.password.index') }}">
                        <i class="iconsmind-Lock-3"></i>
                        {{ trans("dashboard.profile.password.label") }}                    
                    </a>
                </li>

                <li {{ activeSidebar("user.profile.plan.index" , true ) }}>
                    <a href="{{ route("user.profile.plan.index") }}">
                        <i class="iconsmind-Airship"></i>
                        {{ trans("dashboard.profile.plan.label") }}                    
                    </a>
                </li>

                <li {{ activeSidebar("user.profile.skill.index" , true ) }}>
                    <a href="{{ route("user.profile.skill.index") }}">
                        <i class="iconsmind-Box-Open"></i>
                        {{ trans("dashboard.profile.skill.label") }}
                    </a>
                </li>

                <li {{ activeSidebar("user.profile.notification.index" , true ) }}>
                    <a href="{{ route("user.profile.notification.index") }}">
                        <i class="iconsmind-Alarm-Clock"></i>
                        {{ trans("dashboard.profile.notification.label") }} 
                        <span class="badge badge-pill badge-outline-primary float-left mr-4">
                            {{ trans("dashboard.items.new") }}
                        </span>                   
                    </a>
                </li>

            </ul>
        </div>
    </div>

</div>
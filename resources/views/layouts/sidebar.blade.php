<div class="sidebar">

    <div class="main-menu">
        <div class="scroll">
            <ul class="list-unstyled">
                <li {{ activeSidebar("user.main" , true ) }}>
                    <a href="{{ route("user.main") }}">
                        <i class="iconsmind-Approved-Window"></i>
                        <span>{{ trans("dash.pages.dashboard.label") }}</span>
                    </a>
                </li>
                <li {{ activeSidebar("payment") }}>
                    <a href="#payment">
                        <i class="iconsmind-Money-2"></i>
                        <span>{{ trans("dash.pages.payment.label") }}</span>
                    </a>
                </li>
                <li {{ activeSidebar("profile") }}>
                    <a href="#profile">
                        <i class="iconsmind-Leo-2"></i>
                        <span>{{ trans("dash.pages.profile.label") }}</span>
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
                        {{ trans("dash.profile.account.label") }}
                    </a>
                </li>

                <li {{ activeSidebar("user.profile.password.index" , true ) }}>
                    <a href="">
                        <i class="iconsmind-Lock-3"></i>
                        {{ trans("dash.profile.password.label") }}                    
                    </a>
                </li>

                <li {{ activeSidebar("user.profile.plan.index" , true ) }}>
                    <a href="">
                        <i class="iconsmind-Airship"></i>
                        {{ trans("dash.profile.plan.label") }}                    
                    </a>
                </li>

                <li {{ activeSidebar("user.profile.skill.index" , true ) }}>
                    <a href="">
                        <i class="iconsmind-Box-Open"></i>
                        {{ trans("dash.profile.skill.label") }}
                    </a>
                </li>

                <li {{ activeSidebar("user.profile.password.index" , true ) }}>
                    <a href="">
                        <i class="iconsmind-Alarm-Clock"></i>
                        {{ trans("dash.profile.notification.label") }} 
                        <span class="badge badge-pill badge-outline-primary float-left mr-4">
                            {{ trans("dash.items.new") }}
                        </span>                   
                    </a>
                </li>

            </ul>
        </div>
    </div>

</div>
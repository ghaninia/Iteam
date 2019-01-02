<div class="sidebar">

    <div class="main-menu">
        <div class="scroll">
            <ul class="list-unstyled">
                <li class="active">
                    <a href="{{ route("user.main") }}">
                        <i class="iconsmind-Approved-Window"></i>
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
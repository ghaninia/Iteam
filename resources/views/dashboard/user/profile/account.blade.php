@extends("layouts.dashboard")
@section("main")
    <div class="col-lg-6 col-lg-push-8">
        <div class="card">
            <div class="card-body">
                <form id="_profile-account" action="{{ route("user.profile.account.store") }}"></form>
            </div>
        </div>
    </div>
@stop
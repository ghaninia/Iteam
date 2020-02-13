@extends("dashboard.layouts.master")
@section("main")
    <div class="col-lg-6 push-lg-3">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">
                    {{  trans("dashboard.profile.notification.label") }}
                </h5>
                <form id="_profile" action="{{ route('user.profile.notification.store') }}" method="POST">
                    @csrf
                    @foreach([ 'when_login' , 'when_edit_profile' , 'when_create_offer' , 'when_create_team' , 'when_offer_confirmed' , 'when_expired_panel' , 'when_myteamhave_offer' ]  as $key)
                        <div class="custom-control custom-checkbox">
                            <input id="{{ $key }}" value="1" {{ $user->porfileNotification->{$key} ? "checked" : null }} class="custom-control-input" type="checkbox" name="{{ $key }}">
                            <label class="custom-control-label" for="{{ $key }}">
                                {{ trans("dashboard.profile.notification.{$key}") }}
                            </label>
                        </div>
                    @endforeach
                    <button class="products btn-block pointer mt-4 font-weight-bold">
                     {{ trans('dashboard.profile.notification.submit') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
@stop
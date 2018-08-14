@extends('dash.layouts.app')
@section('main')
    <div class="content-box">
        <div class="row">
            <div class="col-lg-6">
                <div class="element-wrapper">
                    <h6 class="element-header">{{ $information['title'] }}</h6>
                    <div class="element-box">
                        <form id="notificationUpdate" action="{{ route('user.profile.notification.store') }}" method="POST">
                            @csrf
                            @foreach([ 'when_login' , 'when_edit_profile' , 'when_create_offer' , 'when_create_team' , 'when_offer_confirmed' , 'when_expired_panel' , 'when_myteamhave_offer' ]  as $key)
                                <div class="form-check">
                                    <label class="font-weight-bold form-check-label" id="{ $key }">
                                        <input value="1" {{ $user->porfileNotification->{$key} ? "checked" : null }} class="form-check-input" type="checkbox" name="{{ $key }}">
                                        {{ trans("dash.profile.notification.{$key}") }}
                                    </label>
                                </div>
                            @endforeach
                            <div class="form-buttons-w">
                                <button class="btn btn-primary disabled" >{{ trans('dash.profile.save_submit') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
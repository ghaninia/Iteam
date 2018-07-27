@extends('dash.layouts.app')
@section('main')
<div class="content-box">
    <div class="element-wrapper">
        <div class="row">
            <div class="col-lg-5 col-xs-12 offset-lg-3">
                <div class="element-box">
                    <form id="passwordUpdate" method="POST" action="{{ route('dashboard.user.profile.password.store') }}">
                        @csrf
                        <div class="form-group  {{ $errors->has("current_password") ? 'has-error has-danger' : "" }}">
                            <label for="current_password">{{ trans('dash.panel.user.password_lasted') }}</label>
                            <input required name="current_password" id="current_password" current_password" class="form-control" placeholder="{{ trans('dash.panel.user.password_lasted') }}" type="text">
                            <div class="form-control-feedback help-block with-errors form-text">@if($errors->has("current_password")) {{ $errors->first('current_password') }} @endif</div>
                        </div>
                        <div class="form-group {{ $errors->has("password") ? 'has-error has-danger' : "" }}">
                            <label for="password">{{ trans('dash.panel.user.password_new') }}</label>
                            <input required name="password" id="password" class="form-control" placeholder="{{ trans('dash.panel.user.password_new') }}" type="password">
                            <div class="form-control-feedback help-block with-errors form-text">@if($errors->has("password")) {{ $errors->first('password') }} @endif</div>

                        </div>
                        <div class="form-group {{ $errors->has("password_confirmation") ? 'has-error has-danger' : "" }}">
                            <label for="password">{{ trans('dash.panel.user.repassword') }}</label>
                            <input required name="password_confirmation" class="form-control" placeholder="{{ trans('dash.panel.user.repassword') }}" type="password">
                            <div class="form-control-feedback help-block with-errors form-text">@if($errors->has("password_confirmation")) {{ $errors->first('password_confirmation') }} @endif</div>
                        </div>
                        <div class="form-buttons-w text-right">
                            <button class="btn btn-primary step-trigger-btn">{{ trans('dash.profile.save_submit') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
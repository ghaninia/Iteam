@extends('dash.layouts.app')
@section('main')
        <div class="content-box">
            <div class="element-wrapper">
                <div class="row">
                    <div class="col-lg-5 col-xs-12 offset-lg-3">
                        <div class="element-box">
                            <form method="POST" action="{{ route('dashboard.user.profile.password.store') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="password">{{ trans('dash.panel.user.password_lasted') }}</label>
                                    <input name="current_password" class="form-control" placeholder="{{ trans('dash.panel.user.password_lasted') }}" type="text">
                                </div>
                                <div class="form-group">
                                    <label for="password">{{ trans('dash.panel.user.password_new') }}</label>
                                    <input name="password" class="form-control" placeholder="{{ trans('dash.panel.user.password_new') }}" type="text">
                                </div>
                                <div class="form-group">
                                    <label for="password">{{ trans('dash.panel.user.repassword') }}</label>
                                    <input name="repassword" class="form-control" placeholder="{{ trans('dash.panel.user.repassword') }}" type="text">
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
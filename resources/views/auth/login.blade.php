@extends('auth.layouts.app')
@section('main')
    <div class="form-holder">
        <div class="form-content">
            <div class="form-items">

                <form action="{{ route('login') }}" method="POST" id="login" data-toggle="validator">
                    @csrf

                    <div class="form-group {{ $errors->has("username") ? 'has-error has-danger' : "" }}">
                        <input maxlength="255" required autocomplete="off" name="username" class="form-control" placeholder="{{ trans('dash.profile.username') }}" type="text">
                        <div class="help-block with-errors"></div>
                    </div>

                    <div class="from-group  {{ $errors->has("password") ? 'has-error has-danger' : "" }}">
                        <input class="form-control" type="password" name="password" placeholder="{{ trans('dash.profile.password') }}" required>
                        <div class="help-block with-errors"></div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-7">
                                <input  autocomplete="off" class="form-control" name="captcha" placeholder="{{ trans('dash.profile.captcha') }}" required>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="col-5">
                                <div id="captcha">
                                    <div id="refresh"></div>
                                    <img src="{{ route('captcha') }}" width="100%">
                                </div>
                            </div>
                        </div>
                    </div>

                    <input type="checkbox" name='remember' id="remember" value="1"><label for="remember">{{ trans('auth.login.remember') }}</label>

                    <div class="form-button">
                        <button id="submit" type="submit" class="ibtn">{{ trans('auth.login.submit') }}</button>
                        <a href="{{ route('password.request') }}">{{ trans('auth.reset.text') }}</a>
                    </div>
                </form>

                <div class="page-links" style="margin-top : 20px">
                    <a href="{{ route('register') }}">{{ trans("auth.register.desc") }}</a>
                </div>
            </div>
        </div>
    </div>
@stop
@extends('auth.layouts.app')
@section("main")
    <div class="form-holder">
        <div class="form-content">
            <div class="form-items">
                <h3>{{ trans('auth.register.form') }}</h3>
                <p>{{ trans('auth.register.desc') }}</p>
                <form method="POST" id='register' action="{{ route('register') }}"  data-toggle="validator">
                    @csrf

                    <div class="form-row">
                        <div class="col">
                            <div class="form-group">
                                <input required autocomplete="off" class="form-control" name="name" placeholder="{{ trans('auth.register.name') }}">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <input required autocomplete="off" class="form-control" name="family" placeholder="{{ trans('auth.register.family') }}">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <input autocomplete="off" class="form-control" name="username" placeholder="{{ trans('auth.register.username') }}" required="">
                        <div class="help-block with-errors"></div>
                    </div>

                    <div class="form-row">
                        <div class="col">
                            <div class="form-group">
                                <input pattern="^09[0-9]{9}$" autocomplete="off" class="form-control" name="mobile" placeholder="{{ trans('auth.register.mobile') }}" required="">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <input autocomplete="off" class="form-control" name="email" placeholder="{{ trans('auth.register.email') }}" required="">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col">
                            <div class="form-group">
                                <input autocomplete="off" class="form-control" type="password" name="password" placeholder="{{ trans('auth.register.password') }}" required="">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required  placeholder="{{ trans("auth.recovery.repeat") }}">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-7">
                                <input autocomplete="off" class="form-control" name="captcha" placeholder="{{ trans('dash.profile.captcha') }}" required>
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

                    <input type="checkbox" name='privacy' id="privacy" value="1">
                    <label for="privacy">
                        <a target="_blank" href="{{ route("site.privacy") }}">{{ trans('auth.register.privacy') }}</a>
                        {{ trans('auth.register.accepted') }}
                    </label>

                    <div class="form-button text-right">
                        <button type="button" class="btn btn-light">{{ trans('auth.register.cancel') }}</button>
                        <button id="submit" type="submit" class="ibtn">{{ trans('auth.register.save') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop
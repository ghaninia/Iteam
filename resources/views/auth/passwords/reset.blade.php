@extends("auth.layouts.app")
@section("main")
    <div class="form-holder">
        <div class="form-content">
            <div class="form-items">
                <h3>{{ trans("auth.recovery.change") }}</h3>
                <p>{{ trans("auth.recovery.desc") }}</p>
                <form method="POST" action="{{ route("password.update") }}" id="passwordUpdate"  data-toggle="validator">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">
                    <div class="form-group">
                        <input required class="form-control" type="password" name="password"  placeholder="{{ trans("auth.recovery.password") }}" >
                        <div class="help-block with-errors"></div>
                    </div>

                    <div class="form-group">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required  placeholder="{{ trans("auth.recovery.repeat") }}">
                        <div class="help-block with-errors"></div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-7">
                                <input class="form-control" name="captcha" placeholder="{{ trans('dash.profile.captcha') }}" required>
                            </div>
                            <div class="col-5">
                                <div id="captcha">
                                    <div id="refresh"></div>
                                    <img src="{{ route('captcha') }}" width="100%">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-button full-width">
                        <button id="submit" type="submit" class="ibtn btn-forget">{{ trans("auth.reset.submit") }}</button>
                    </div>
                </form>
            </div>
            <div class="form-sent">
                <div class="tick-holder">
                    <div class="tick-icon"></div>
                </div>
                <h3>{{ trans("auth.reset.alert") }}</h3>
                <p>{{ trans("passwords.sent") }}</p>
                <div class="info-holder">
                    <span>{{ trans('auth.reset.message') }}</span> <a href="forget19.html#">{{ trans('auth.reset.help') }}</a>
                </div>
            </div>
        </div>
    </div>
@stop
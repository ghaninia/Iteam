@extends('auth.layouts.app')
@section('main')
    <h4 class="auth-header">{{ trans('auth.login.form') }}</h4>

    <form action="{{ route('login') }}" method="POST" id="login" data-toggle="validator">
        @csrf

        <div class="form-group {{ $errors->has("username") ? 'has-error has-danger' : "" }}">
            <label for="username">{{ trans('dash.profile.username') }}</label>
            <input maxlength="255" required autocomplete="off" name="username" class="form-control" placeholder="{{ trans('dash.profile.enterusername') }}" type="text">
            <div class="error-message">@if($errors->has("username")) <div class="help-block form-text text-muted form-control-feedback">{{ $errors->first('username') }}</div> @endif</div>
            <div class="pre-icon os-icon os-icon-user-male-circle"></div>
        </div>

        <div class="form-group {{ $errors->has("password") ? 'has-error has-danger' : "" }}">
            <label for="password">{{ trans('dash.profile.password') }}</label>
            <input required autocomplete="off" name="password" class="form-control" placeholder="{{ trans('dash.profile.enterpassword') }}" type="password">
            <div class="error-message">@if($errors->has("password")) <div class="help-block form-text text-muted form-control-feedback">{{ $errors->first('password') }}</div> @endif</div>
            <div class="pre-icon os-icon os-icon-fingerprint"></div>
        </div>


        <!-- guard -->

        <div class="account-type">
            @foreach(['os-icon-emoticon-smile' => 'user' , 'os-icon-robot-2' => 'admin' ] as $icon => $name )
                <div>
                    <input
                            @if(!! old("guard")  )
                                {{ old('guard') == $name ? "checked=''" : "" }}
                            @else
                                {{ $loop->index == 0 ? "checked=''" : ""  }}
                            @endif
                            type="radio" name="guard" id="{{ $name }}" value="{{ $name }}" class="account-type-radio" />
                    <label for="{{ $name }}" class="ripple-effect-dark">
                        <i class="os-icon {{ $icon }}"></i>
                        {{ trans("dash.profile.guards.{$name}") }}
                    </label>
                </div>
            @endforeach
        </div>

        <!-- remember -->
        <div class="buttons-w">
            <button class="btn btn-primary">{{ trans('auth.login.submit') }}</button>
            <div class="checkbox">
                <input type="checkbox" id="remember" name="remember" value="1" >
                <label for="remember">
                    {{ trans('auth.login.remember') }}
                    <span class="checkbox-icon"></span>
                </label>
            </div>
        </div>

    </form>

@stop
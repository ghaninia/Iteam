@extends("dash.layouts.mail")
@section("main")
    <h4 style="margin-top: 0px;">
        {{ trans("auth.reset.himan" , ['username' => $user->username ??  $user->fullname ]) }}
    </h4>
    <div style="color: #636363; font-size: 12px;">
        {!! trans('auth.reset.quest') !!}
    </div>
    <a href="{{ route("password.reset" , $token ) }}" style="padding: 8px 20px; background-color: #4B72FA; color: #fff; font-weight: bolder; font-size: 12px; display: inline-block; margin: 20px 0px;text-decoration: none;">
        {{ trans("auth.reset.text") }}
    </a>
@stop
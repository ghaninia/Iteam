@extends('dash.layouts.app')
@section("main")
    <div class="content-i">
        <div class="content-box">
            <div class="row">

                <div class="col-lg-7">

                    <div class="ae-content">
                        <div class="aec-full-message-w show-pack">
                            <div class="aec-full-message">
                                <div class="message-head">
                                    <div class="user-w with-status">
                                        <div class="user-avatar-w">
                                            <div class="user-avatar">
                                                <img alt="{{ $offer->user->username }}" src="{{ userPicture('avatar' , 'thumbnail' , 'user' , $offer->user) }}">
                                            </div>
                                        </div>
                                        <div class="user-name">
                                            <h6 class="user-title">{{ $offer->user->fullname ?? $offer->user->username }}</h6>
                                            <div class="user-role"><span>{{ $offer->user->email }}</span></div>
                                        </div>
                                    </div>
                                    <div class="message-info">{{ verta($offer->created_at)->format("d F Y") }}
                                        <br>{{ verta($offer->created_at)->format("H:i a") }}</div>
                                </div>
                                <div class="message-content">{!! $offer->content !!}</div>
                            </div>
                        </div>
                    </div>

                </div>


                <div class="col-lg-5">

                </div>
            </div>
        </div>
    </div>
@stop
@extends('dash.layouts.app')
@section('main')
<div class="row">
    <div class="col-sm-4">
        <div class="user-profile compact">
            <div class="up-head-w" style="background-image:url({{ avatar() }})">
                <div class="up-social">
                    @if(!!$account->instagram_account)
                        <a href="{{ $account->instagram_account }}">
                            <i class="ti-instagram"></i>
                        </a>
                    @endif
                    @if(!!$account->linkedin_account)
                        <a href="{{ $account->linkedin_account }}">
                            <i class="ti-linkedin"></i>
                        </a>
                    @endif
                </div>
                <div class="up-main-info">
                    <h2 class="up-header">{{ $account->fullname }}</h2>
                    <h6 class="up-sub-header">{{ str_slice($account->bio) }}</h6>
                </div>
                <style>
                    .decor{
                        -moz-transform: scaleX(-1);
                        -o-transform: scaleX(-1);
                        -webkit-transform: scaleX(-1);
                        transform: scaleX(-1);
                        filter: FlipH;
                        -ms-filter: “FlipH”;
                    }
                </style>
                <svg  class="decor" width="842px" height="219px" viewBox="0 0 842 219" preserveAspectRatio="xMaxYMax meet" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                   <g transform="translate(-381.000000, -362.000000)" fill="#FFFFFF">
                        <path
                            class="decor-path" d="
                            M1223,362
                            L1223,581
                            L381,581
                            C868.912802,575.666667
                            1149.57947,502.666667
                            1223,362 Z"></path>
                    </g>
                </svg>
            </div>
            <div class="up-controls">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="value-pair">
                            <div class="label">{{ trans('dash.panel.user.confirm.text') }} : </div>
                            @if($account->confirmed_email)
                                <div class="value badge badge-pill badge-success">{{ trans('dash.active.enable') }}</div>
                                @else
                                <div class="value badge badge-pill badge-danger">{{ trans('dash.active.disabled') }}</div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="up-contents">
                <div class="m-b">
                    <div class="row m-b">
                        <div class="col-sm-6 b-r b-b">
                            <div class="el-tablo centered padded-v">
                                <div class="value">{{ $account->offers_count }}</div>
                                <div class="label">{{ trans('dash.profile.count_offers') }}</div>
                            </div>
                        </div>
                        <div class="col-sm-6 b-b">
                            <div class="el-tablo centered padded-v">
                                <div class="value">{{ $account->teams_count }}</div>
                                <div class="label">{{ trans('dash.profile.count_teams') }}</div>
                            </div>
                        </div>
                    </div>

                    <div class="padded">

                        <div class="os-progress-bar primary">
                            <div class="bar-labels">
                                <div class="bar-label-left">
                                    <span>Profile Completion</span>
                                    <span class="positive">+10</span>
                                </div>
                                <div class="bar-label-right">
                                    <span class="info">72/100</span>
                                </div>
                            </div>
                            <div class="bar-level-1" style="width: 100%">
                                <div class="bar-level-2" style="width: 80%">
                                    <div class="bar-level-3" style="width: 30%"></div>
                                </div>
                            </div>
                        </div>

                        <div class="os-progress-bar primary">
                            <div class="bar-labels">
                                <div class="bar-label-left">
                                    <span>Status Unlocked</span>
                                    <span class="positive">+5</span>
                                </div>
                                <div class="bar-label-right">
                                    <span class="info">45/100</span>
                                </div>
                            </div>
                            <div class="bar-level-1" style="width: 100%">
                                <div class="bar-level-2" style="width: 30%">
                                    <div class="bar-level-3" style="width: 10%"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@stop
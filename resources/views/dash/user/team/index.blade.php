@extends('dash.layouts.app')
@section('main')
<div class="content-box">

    <div class="os-tabs-w mx-4">
        <div class="os-tabs-controls">
            <ul class="nav nav-tabs ajax upper" data-push="#teams" data-action="state">
                @foreach(['all','confirmed','init','expired'] as $key)
                    <li class="nav-item">
                        <a class="nav-link @if(request()->has("state")) {{request("state")!=$key ?:"active"}} @else {{ $loop->index != 0 ?:"active"}} @endif" href="" data-state="{{ $key }}">{{ trans("dash.team.{$key}") }}</a>
                    </li>
                @endforeach
            </ul>
            <ul class="nav nav-pills ajax smaller d-none d-lg-flex" data-push="#teams" data-action="create_time">
                @foreach(userSearchRangeTime() as $key)
                    <li class="nav-item">
                        <a class="nav-link @if(request()->has("state")) {{request("state")!=$key ?:"active"}} @else {{ $loop->index != 0 ?:"active"}} @endif" data-create_time="{{ $key }}" href="">{{ trans("dash.data_range.{$key}") }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-7">
            <div class="padded-lg">

                <!--START - Projects list-->
                <div class="projects-list active" id="teams">
                    @foreach($teams as $team)
                        <div class="project-box">
                            <div class="project-head">
                                <div class="project-title">
                                    <h4>{{ $team->name }}</h4>
                                </div>
                                <div class="project-users">
                                    <div class="avatar">
                                        <img alt="" src="img/avatar3.jpg">
                                    </div>
                                    <div class="more">+ 5 More</div>
                                </div>
                            </div>

                            <div class="project-info">
                                <div class="row align-items-center">

                                    <div class="col-sm-5">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="el-tablo highlight">
                                                    <div class="label">{{ trans("dash.team.offer.text") }}</div>
                                                    <div class="value">{{ $team->offers_count }}</div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="el-tablo highlight">
                                                    <div class="label">{{ trans("dash.team.offer.remain") }}</div>
                                                    <div class="value">{{ $team->plan->max_create_offer - $team->offers_count }}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-5 offset-sm-2">
                                        <div class="os-progress-bar primary">
                                            <div class="bar-labels">
                                                <div class="bar-label-left"><span>Progress</span><span class="positive">+10</span></div>
                                                <div class="bar-label-right"><span class="info">72/100</span></div>
                                            </div>

                                            @php( $offerProgress = round(  $team->offers_count * 100 / $team->plan->max_create_offer ) )
                                            <div class="bar-level-1" style="width: 100%">
                                                <div class="bar-level-2" style="width:%{{ $offerProgress }}">
                                                    <div class="bar-level-3" style="width: 36%"></div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>

</div>
@stop
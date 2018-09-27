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

        <!---------------->
        <!--- col-lg-7 --->
        <!---------------->
        <div class="col-lg-7">
            <div class="padded-lg">

                <!--START - Projects list-->
                <div class="projects-list active pagination_push" id="teams">
                    {!! $view !!}
                </div>

            </div>
        </div>

        <!---------------->
        <!--- col-lg-2 --->
        <!---------------->
        <div class="col-lg-2"></div>
        <!---------------->
        <!--- col-lg-3 --->
        <!---------------->
        <div class="col-lg-3">
            <div class="element-wrapper">
                <h6 class="element-header">{{ trans("dash.team.view.text") }}</h6>

                <div class="element-box-tp">
                    <div class="activity-boxes-w">

                        @foreach($visitis as $visit )
                            <div class="activity-box-w">
                                <div class="activity-time">10 Min</div>
                                    <div class="activity-box">
                                        <div class="activity-avatar">
                                            <img alt="" src="img/avatar1.jpg">
                                        </div>
                                        <div class="activity-info">
                                            <div class="activity-role">John Mayers</div>
                                            <strong class="activity-title">Opened New Account</strong>
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
</div>
@stop
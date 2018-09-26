@extends('dash.layouts.app')
@section('main')
<div class="content-box">
    <div class="os-tabs-w mx-4">
        <div class="os-tabs-controls">
            <ul class="nav nav-tabs upper">
                <li class="nav-item">
                    <a aria-expanded="false" class="nav-link" data-toggle="tab" href="#tab_overview">{{ trans('dash.team.active') }}</a>
                </li>
                <li class="nav-item">
                    <a aria-expanded="false" class="nav-link" data-toggle="tab" href="#tab_sales">{{ trans('dash.team.closed') }}</a>
                </li>
                <li class="nav-item">
                    <a aria-expanded="true" class="nav-link" data-toggle="tab" href="#tab_sales"> {{ trans('dash.team.overview') }}</a>
                </li>
            </ul>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-7">
            <div class="padded-lg">

                <!--START - Projects list-->
                <div class="projects-list">
                    <div class="project-box">

                        <div class="project-head">
                            <div class="project-title">
                                <h5>Website Redesign</h5></div>
                            <div class="project-users">
                                <div class="avatar"><img alt="" src="img/avatar3.jpg"></div>
                                <div class="avatar"><img alt="" src="img/avatar1.jpg"></div>
                                <div class="avatar"><img alt="" src="img/avatar5.jpg"></div>
                                <div class="avatar"><img alt="" src="img/avatar2.jpg"></div>
                                <div class="more">+ 5 More</div>
                            </div>
                        </div>

                        <div class="project-info">
                            <div class="row align-items-center">
                                <div class="col-sm-5">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="el-tablo highlight">
                                                <div class="label">Open tasks</div>
                                                <div class="value">15</div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="el-tablo highlight">
                                                <div class="label">Contributors</div>
                                                <div class="value">24</div>
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
                                        <div class="bar-level-1" style="width: 100%">
                                            <div class="bar-level-2" style="width: 72%">
                                                <div class="bar-level-3" style="width: 36%"></div>
                                            </div>
                                        </div>
                                    </div>
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
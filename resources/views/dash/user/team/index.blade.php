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
</div>
@stop
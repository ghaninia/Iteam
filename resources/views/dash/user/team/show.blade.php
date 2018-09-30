@extends("dash.layouts.app")
@section("main")
    <div class="content-i">

        <div class="content-box">

            <div class="support-index">

                <div class="support-tickets">

                    <div class="support-tickets-header">
                        <div class="tickets-control">
                            <h6>{{ trans('dash.team.offer.text') }}</h6>
                            <div class="element-search">
                                <input placeholder="Type to filter tickets..." type="text">
                            </div>
                        </div>
                    </div>

                    <div class="offers_push">
                        <div id="content">
                            {!! $view !!}
                        </div>
                        <div class="load-more-tickets">
                            {!! $appends !!}
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </div>
@stop
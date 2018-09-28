@extends("dash.layouts.app")
@section("main")
    <div class="content-i">

        <div class="content-box">

            <div class="support-index">

                <div class="support-tickets">

                    <div class="support-tickets-header">
                        <div class="tickets-control">
                            <h5>{{ trans('dash.team.offer.text') }}</h5>
                            <div class="element-search">
                                <input placeholder="Type to filter tickets..." type="text">
                            </div>
                        </div>
                    </div>

                    @if($team->offers->isNotEmpty())
                        @foreach($team->offers as $offer)
                            <div class="support-ticket">
                                <div class="st-body">
                                    <div class="avatar">
                                        @if( !!$offer->user)
                                            <img width="50" height="50" alt="{{ $offer->user->fullname }}" src="{{ userPicture( 'avatar' , 'full' , 'user' , $offer->user ) }}">
                                        @endif
                                    </div>
                                    <div class="ticket-content">
                                        <h6 class="ticket-title">{{ $offer->user->fullname ?? $offer->user->username }}</h6>
                                        <div class="ticket-description">{{ $offer->content }}</div>
                                    </div>
                                </div>
                                <div class="st-foot"><span class="label">Agent:</span>
                                    <a class="value with-avatar" href="apps_support_index.html#">
                                        <img alt="" src="img/avatar1.jpg">
                                        <span>John Mayers</span>
                                    </a>
                                    <span class="label">{{ trans('dash.team.offer.created_at') }}:</span>
                                    <span class="value">{{ verta( $offer->created_at )->formatDifference() }}</span>
                                </div>
                            </div>
                        @endforeach
                    @endif


                    <div class="load-more-tickets">
                        <a href="apps_support_index.html#">
                            <span>Load More Tickets...</span>
                        </a>
                    </div>

                </div>

            </div>

        </div>

    </div>
@stop
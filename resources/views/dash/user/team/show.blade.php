@extends("dash.layouts.app")
@section("main")
    <div class="content-i">

        <div class="content-box">

            <div class="support-index">

                <div class="support-tickets" id="offers">

                    <div class="support-tickets-header">
                        <form action="{{ route('user.team.show' , $team->slug ) }}" id="search">
                            <div class="tickets-control">
                                <h6>{{ trans('dash.team.offer.text') }}</h6>
                                <div class="element-search">
                                    <input name="s" type="text" autocomplete="off">
                                </div>
                            </div>
                        </form>
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

                <div class="support-ticket-content-w">

                    <div class="support-ticket-content">

                    </div>

                    <div class="support-ticket-info">

                        <a class="close-ticket-info" href="">
                            <i class="os-icon os-icon-ui-23"></i>
                        </a>

                        <div class="customer">
                            <div class="avatar"><img alt="" src=""></div>
                            <h6 class="customer-name">{{ $team->name }}</h6>
                            <div class="customer-tickets">{{ trans("dash.team.offer.val" , ['attribute' => $team->offers->count()]) }}</div>
                        </div>

                        <h6 class="info-header">{{ trans("dash.team.details.text") }}</h6>

                        <div class="info-section text-center">
                            <b class="label">{{ trans("dash.team.details.created_at") }}:</b>
                            <div class="value">{{ $team->created_at->format("l d F , h:i a") }}</div>

                            @if($team->isExpire())
                                <b>{{ trans("dash.team.offer.expired_at") }}:</b>
                                <small class="positive">{{ verta($team->expired_at)->formatDifference() }}</small>
                            @endif

                            @if($team->tags->isNotEmpty())
                                <b class="label">{{ trans("dash.team.details.categories") }}</b>
                                <div class="value tags">
                                    @foreach($team->tags as $tag)
                                        <div class="badge badge-primary {{ $loop->index < 2 ?: 'hidden' }}">{{ $tag->name }}</div>
                                    @endforeach
                                    @if($team->tags->count() > 2)
                                        <div class="badge badge-primary pointer more"><i class="ti-more"></i></div>
                                    @endif
                                </div>
                            @endif

                            @if($team->skills->isNotEmpty())
                                <b class="label">{{ trans("dash.team.details.skills") }}</b>
                                <div class="value tags">
                                    @foreach($team->skills as $skill)
                                        <div class="badge badge-primary {{ $loop->index < 2 ?: 'hidden' }}">{{ $skill->name }}</div>
                                    @endforeach
                                    @if($team->tags->count() > 2)
                                        <div class="badge badge-primary pointer more"><i class="ti-more"></i></div>
                                    @endif
                                </div>
                            @endif

                        </div>

                        <h6 class="info-header">{{ trans("dash.team.details.members") }}</h6>

                        <div class="info-section">
                            <ul class="users-list as-tiles">

                                @php($accepteds = $team->offers()->accepted()->get() )

                                @if($accepteds->isNotEmpty())
                                    @foreach($accepteds as $offer)
                                        <li>
                                            <a class="author with-avatar" href="{{ route("user.team.offer" , ['team' => $team->slug ,'offer' => $offer->id] ) }}">
                                                <div class="avatar" style="background-image: url('{{ userPicture( 'avatar' , 'thumbnail' , 'user' , $offer->user ) }}')"></div>
                                                <span>{{ $offer->user->fullname ?? $offer->user->username }}</span>
                                            </a>
                                        </li>
                                    @endforeach
                                @endif

                                @if( $team->plan->max_create_offer > $accepteds->count() )
                                    <li>
                                        <a class="add-agent-btn" href="apps_support_index.html#">
                                            <i class="os-icon os-icon-ui-22"></i>
                                            <span>Add Agent</span>
                                        </a>
                                    </li>
                                @endif

                            </ul>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>
@stop
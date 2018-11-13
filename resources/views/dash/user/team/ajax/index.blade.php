@if($teams->isNotEmpty())
    @foreach($teams as $team)
        <div class="project-box">
            <div class="project-head">
                <div class="project-title" title="{{ $team->name }}">
                    <a href="{{ route("user.team.show" , $team->slug) }}">{{ str_slice($team->name , 30) }}</a>
                </div>
                @if(!! $team->offers )
                    <div class="project-users">

                        @if($team->offers_count > 5 )
                            <div class="more">{{ trans("dash.team.offer.offer_max_5") }}</div>
                        @endif

                        @foreach($team->offers->take(5) as $offer)
                            @if( $offer->user )
                                <div class="avatar" title="{{ $offer->user->fullname }}">
                                    <img alt="" src="{{ userPicture( "avatar" , "thumbnail" , NULL , $offer->user ) }}">
                                </div>
                            @endif
                        @endforeach

                    </div>
                @endif
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

                            @php( $offerProgress = @($team->offers_count * 100 / $team->plan->max_create_offer)  )
                            @php( $offerProccessStatus = @($team->offers->where("status",1)->count() * 100 / $team->offers_count) )

                            <div class="bar-labels">
                                <div class="bar-label-left">
                                    @if($team->isExpire())
                                        <b>{{ trans("dash.team.offer.expired_at") }}:</b>
                                        <small class="positive">{{ verta($team->expired_at)->formatDifference() }}</small>
                                    @endif
                                </div>
                                <div class="bar-label-right">
                                    <span class="info">{{ sprintf("%s/%s" , $team->offers_count , $team->plan->max_create_offer ) }}</span>
                                </div>
                            </div>

                            <div class="bar-level-1" style="width: 100%">
                                <div class="bar-level-2" style="width:{{ $offerProgress }}%">
                                    <div class="bar-level-3" style="width:{{ $offerProccessStatus }}%"></div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    @endforeach
@else
@endif

{{ $teams->appends($appends)->links("dash.layouts.paginate") }}

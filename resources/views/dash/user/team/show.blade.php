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
                        <div class="ticket-thread">
                            <div class="ticket-reply">
                                <div class="ticket-reply-info">
                                    <div class="actions" href="#"><i class="os-icon os-icon-ui-46"></i>
                                        <div class="actions-list">
                                            <a href="apps_support_index.html#"><i class="os-icon os-icon-ui-49"></i><span>Edit</span></a>
                                            <a href="apps_support_index.html#"><i class="os-icon os-icon-ui-09"></i><span>Mark Private</span></a>
                                        </div>
                                    </div>
                                </div>

                                <div class="balance-table mt-3">
                                    <table class="table table-lightborder table-bordered table-v-compact mb-0">
                                        <tbody>
                                        <tr class="bg-light">
                                            <td colspan="3">
                                                <b>{{ trans("dash.team.create.info") }}</b>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td><strong>{{ $team->count_member }}</strong>
                                                <div class="balance-label smaller lighter text-nowrap">
                                                    {{ trans("dash.team.create.count_member") }}
                                                </div>
                                            </td>
                                            <td><strong>{{ implode("," , $genders) }}</strong>
                                                <div class="balance-label smaller lighter text-nowrap">
                                                    {{ trans("dash.team.create.required_gender") }}
                                                </div>
                                            </td>
                                            <td><strong>{{ implode("," , $typeAssists) }}</strong>
                                                <div class="balance-label smaller lighter text-nowrap">
                                                    {{ trans("dash.team.create.type_assist") }}
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="{{ $team->interplay_fiscal == 'fixedsalary' ? '1' : '3' }}" >
                                                <strong>{{ trans("dash.interplay_fiscals.".$team->interplay_fiscal) }}</strong>
                                                <div class="balance-label smaller lighter text-nowrap">
                                                    {{ trans("dash.team.create.interplay_fiscal") }}
                                                </div>
                                            </td>
                                            @if( $team->min_salary )
                                                @php($min = currency($team->min_salary) )
                                                <td><b>{{ number_format($min['currency']) }}</b> <strong class="text-danger">{{ $min['type'] }}</strong>
                                                    <div class="balance-label smaller lighter text-nowrap">
                                                        {{ trans("dash.team.create.min_salary") }}
                                                    </div>
                                                </td>
                                            @endif
                                            @if( $team->max_salary )
                                                @php($max = currency($team->max_salary) )
                                                <td><b>{{ number_format($max['currency']) }}</b> <strong class="text-success">{{ $max['type'] }}</strong>
                                                    <div class="balance-label smaller lighter text-nowrap">
                                                        {{ trans("dash.team.create.max_salary") }}
                                                    </div>
                                                </td>
                                            @endif
                                        </tr>

                                        <tr class="bg-light">
                                            <td colspan="3">
                                                <b>{{ trans("dash.team.create.geo") }}</b>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <strong dir="ltr">{{ $team->phone }}</strong>
                                                <div class="balance-label smaller lighter text-nowrap">
                                                    {{ trans("dash.team.create.phone") }}
                                                </div>
                                            </td>
                                            <td>
                                                <strong dir="ltr">{{ $team->fax }}</strong>
                                                <div class="balance-label smaller lighter text-nowrap">
                                                    {{ trans("dash.team.create.fax") }}
                                                </div>
                                            </td>
                                            <td>
                                                <strong dir="ltr">{{ $team->mobile }}</strong>
                                                <div class="balance-label smaller lighter text-nowrap">
                                                    {{ trans("dash.team.create.mobile") }}
                                                </div>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>


                            </div>
                        </div>
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

                                @if($acceptedOffers->isNotEmpty())
                                    @foreach($acceptedOffers as $offer)
                                        <li>
                                            <a class="author with-avatar" href="{{ route("user.team.offer" , ['team' => $team->slug ,'offer' => $offer->id] ) }}">
                                                <div class="avatar" style="background-image: url('{{ userPicture( 'avatar' , 'thumbnail' , 'user' , $offer->user ) }}')"></div>
                                                <span>{{ $offer->user->fullname ?? $offer->user->username }}</span>
                                            </a>
                                        </li>
                                    @endforeach
                                @endif

                                @if( $team->canAddOffer() )
                                    <li>
                                        <a class="add-agent-btn pointer" data-target="#addMemberModal" data-toggle="modal" >
                                            <i class="os-icon os-icon-ui-22"></i>
                                            <span>{{ trans('dash.items.addItem') }}</span>
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
    @include("dash.modals.add_member" , ['offers' => $notAcceptedOffers ] )
@stop

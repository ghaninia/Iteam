@if($offers->isNotEmpty())
    @foreach($offers as $offer)
        {{--animated fadeInDown delay-{{ $loop->index + 1 }}s--}}
        <div class="support-ticket">
            <div class="st-body">
                <div class="avatar">
                    @if( !!$offer->user)
                        <img width="50" height="50" alt="{{ $offer->user->fullname }}" src="{{ userPicture( 'avatar' , 'full' , 'user' , $offer->user ) }}">
                    @endif
                </div>
                <div class="ticket-content">
                    <h6 class="ticket-title">{{ $offer->user->fullname ?? $offer->user->username }}</h6>
                    <div class="ticket-description">{{ str_slice($offer->content , 40) }}</div>
                </div>
            </div>
            <div class="st-foot">
                <span class="label">{{ trans('dash.team.offer.created_at') }}:</span>
                <span class="value">
                    @if(today() < verta( $offer->created_at ))
                        {{ verta( $offer->created_at )->formatDifference() }}
                    @else
                        {{--{{ verta( $offer->created_at )->format("l d F h:i a") }}--}}
                        {{ verta($offer->created_at)->format("d FY H:i") }}
                    @endif
                </span>
            </div>
        </div>
    @endforeach
@endif

<div aria-hidden="true" class="onboarding-modal modal fade animated" id="addMemberModal" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-lg modal-centered" role="document">
        <div class="modal-content text-center">
            <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                <span class="close-label">{{ trans("dash.items.close") }}</span>
                <span class="os-icon os-icon-close"></span>
            </button>
            <div class="onboarding-content">
                <h4 class="onboarding-title">{{ trans('dash.team.offers.add') }}</h4>
                <div class="onboarding-text">{!! trans('dash.team.offers.add_label') !!}</div>
                <div class="inline-profile-tiles">
                    <div class="row">
                        @foreach($offers as $offer)
                            <div class="col-sm-2 col-xxl-2">
                                <div class="profile-tile profile-tile-inlined">
                                    <div class="profile-tile-box" >
                                        <div class="pt-avatar-w">
                                            <img src="{{ userPicture( 'avatar' , 'thumbnail' , 'user' , $offer->user ) }}" alt="{{ $offer->user->username }}">
                                        </div>
                                        <div class="pt-user-name">{{ $offer->user->username }}</div>
                                        <div class="btn-group-sm">
                                            <a class="addOffer btn btn-primary btn-xs text-white" data-url="{{ route("user.team.accept_offer" , [ 'team' => $offer->team->slug , 'offer' => $offer->id ]) }}">
                                                <i class="os-icon os-icon-mail-18"></i>
                                            </a>
                                            <a class="rejectOffer btn btn-grey btn-xs" data-url="{{ route("user.team.reject_offer" , [ 'team' => $offer->team->slug , 'offer' => $offer->id ]) }}">
                                                <i class="os-icon os-icon-close"></i>
                                            </a>
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

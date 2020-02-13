@extends("dashboard.layouts.master")
@section("main")
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card d-flex flex-row mb-3 table-heading">
                <div class="d-flex flex-grow-1 min-width-zero">
                    <div class="card-body align-self-center d-flex flex-column flex-md-row justify-content-between min-width-zero align-items-md-center">
                        <p class="list-item-heading mb-0 truncate w-50 w-xs-100"></p>
                        @foreach([
                            "max_create_team" ,
                            "max_create_offer" ,
                            "count_skill" ,
                            "max_life" ,
                            "sms_notification" ,
                        ] as $key )
                            <p class="mb-0 text-dark font-weight-bold w-20 w-xs-100 text-center">
                                {!! trans("dashboard.profile.plan.features.{$key}" ) !!}
                            </p>
                        @endforeach
                        <p class="list-item-heading mb-0 truncate w-20 w-xs-100"></p>
                    </div>
                </div>
            </div>
            @foreach($plans as $plan)
                <div class="card d-flex flex-row mb-3 overflow_hidden">
                    <div class="d-flex flex-grow-1 min-width-zero">
                        <div class="position-relative card-body">
                            <div class="cover__side" style="background-image: url('{{ picture( $plan ) }}');" ></div>
                            <div class="position-relative align-self-center d-flex flex-column flex-md-row justify-content-between min-width-zero align-items-md-center" style="z-index: 2">
                                <div class="list-item-heading mb-0 truncate w-30 w-xs-100">
                                    {{ $plan->name }}
                                </div>
                                <div class="price list-item-heading mb-0 w-20 text-center">
                                    @php( $currency = currency( $plan->price , true ) )
                                    <div class="price__value font-weight-bold">
                                        {{ $currency['currency']  }}
                                        <span class="price__currency font-weight-light text-small text-dark">{{ $currency['type']  }}</span>
                                    </div>
                                </div>
                                @foreach([
                                        "max_create_team" ,
                                        "max_create_offer" ,
                                        "count_skill" ,
                                        "max_life" ,
                                        "sms_notification"
                                    ] as $key )
                                    <p class="mb-0 w-20 w-xs-100 text-center">
                                        @if ( $key == "sms_notification" )
                                            @if ( $plan->{ $key } )
                                                <i class="simple-icon-check text-primary"></i>
                                            @endif
                                        @else
                                            {{ $plan->{ $key } }}
                                        @endif
                                    </p>
                                @endforeach
                                <div class="list-item-heading mb-0 truncate w-20 w-xs-100 text-center">
                                    <a class="btn btn-outline-theme-3 btn-sm" href="{{ route('user.profile.plan.show' , $plan->id) }}">
                                        {{ trans('dashboard.profile.plan.order') }}
                                        <i class="simple-icon-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@stop
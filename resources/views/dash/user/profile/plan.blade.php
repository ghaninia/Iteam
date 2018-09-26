@extends('dash.layouts.app')
@section('main')
    <div class="pricing-plans row no-gutters" id="plans">
        @php
            $size = $plans->count() ;
            if ($size == 1 )
                $size = 12 ;
            elseif ($size == 2 )
                $size = 6 ;
            elseif ($size == 3 )
                $size = 4 ;
            else
                $size = 3 ;
        @endphp

        @foreach($plans as $plan)
            <div class="pricing-plan col-sm-{{ $size }} with-hover-effect plan">

                <div class="plan-head">
                    @php( $picture = picture($plan) )
                    @if(!! $picture )
                        <div class="plan-image">
                            <img src="{{ $picture }}" alt="{{ $plan->name }}">
                        </div>
                    @endif
                    <div class="plan-name">{{ $plan->name }}</div>
                </div>

                <div class="plan-body">
                    <div class="plan-price-w">
                        @php( $currency = currency( $plan->price , true ) )
                        <div class="price-value">{{ $currency['currency']  }}</div>
                        <div class="price-label">{{ $currency['type']  }}</div>
                    </div>
                    <div class="plan-btn-w">
                        <a href="{{ route('user.profile.plan.show' , $plan->id) }}" class="btn btn-primary btn-rounded" >
                            {{ trans('dash.profile.plan.order') }}
                        </a>
                    </div>
                </div>

                <div class="plan-description">
                    <h6>{{ trans('dash.profile.plan.description') }}</h6>
                    <p>{{ $plan->description }}</p>
                    <h6>{{ trans('dash.profile.plan.features.text') }}</h6>
                    <ul>
                        <li>{{ trans("dash.profile.plan.features.max_create_team" , ['attribute' => $plan->max_create_team ]) }}</li>
                        <li>{{ trans("dash.profile.plan.features.max_create_offer" , ['attribute' => $plan->max_create_offer ]) }}</li>
                        <li>{{ trans("dash.profile.plan.features.count_skill" , ['attribute' => $plan->count_skill ]) }}</li>
                        <li>{{ trans("dash.profile.plan.features.max_life" , ['attribute' => $plan->max_life ]) }}</li>
                        @if($plan->sms_notification)
                            <li>{{ trans("dash.profile.plan.features.sms_notification") }}</li>
                        @endif
                    </ul>
                </div>

            </div>
        @endforeach

    </div>
@stop
@extends('dash.layouts.app')
@section('main')
    <div class="content-box">
        <div class="element-wrapper compact pt-4">
            <div class="element-actions">
                <a target="_blank" class="btn btn-primary btn-sm" href="{{ route('user.profile.plan.index') }}">
                    <i class="os-icon os-icon-ui-22"></i>
                    <span>{{ trans('dash.payment.new_plan') }}</span>
                </a>
            </div>
            <h6 class="element-header">{{ trans('dash.payment.overview') }}</h6>
            <div class="element-box-tp">
                <div class="row">
                    <div class="col-lg-7 col-xxl-6">
                        <!--START - BALANCES-->
                        <div class="element-balances">
                            <div class="balance hidden-mobile">
                                <div class="balance-title">{{ trans('dash.payment.alled') }}</div>
                                <div class="balance-value">
                                    @php ($alled = currency($payments_log['all']) )
                                    <span>{{ $alled['currency'] }}</span>
                                    <span class="trending trending-down-basic">
                                        <span>{{ $alled['type'] }}</span>
                                    </span>
                                </div>
                            </div>
                            <div class="balance">
                                <div class="balance-title">{{ trans('dash.payment.successed') }}</div>
                                <div class="balance-value">
                                    @php( $successed = currency($payments_log['success']) )
                                    <span>{{ $successed['currency'] }}</span>
                                    <span class="trending trending-down-basic">
                                        <span>{{ $successed['type'] }}</span>
                                    </span>
                                </div>
                            </div>
                            <div class="balance">
                                <div class="balance-title">{{ trans('dash.payment.failed') }}</div>
                                <div class="balance-value danger">
                                    @php( $failed = currency($payments_log['failed']) )
                                    <span>{{ $failed['currency'] }}</span>
                                    <span class="trending trending-down-basic">
                                        <span>{{ $failed['type'] }}</span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <!--END - BALANCES-->
                    </div>
                    <div class="col-lg-5 col-xxl-6">
                        <!--START - MESSAGE ALERT-->
                        <div class="alert alert-warning borderless">
                            <h5 class="alert-heading">{{ trans('dash.payment.alert.title') }}</h5>
                            <p>{{ trans('dash.payment.alert.description') }}</p>
                        </div>
                        <!--END - MESSAGE ALERT-->
                    </div>
                </div>
            </div>
        </div>

        <div class="element-wrapper">
            <h6 class="element-header">{{ trans('dash.payment.lasted_transaction') }}</h6>
            <div class="element-box-tp">
                <div class="table-responsive">
                    <table class="table table-padded">
                        <thead>
                        <tr>
                            <th>{{ trans('dash.payment.table.status') }}</th>
                            <th>{{ trans('dash.payment.table.date') }}</th>
                            <th>{{ trans('dash.payment.table.planname') }}</th>
                            <th class="text-center">{{ trans('dash.payment.table.trackingcode') }}</th>
                            <th class="text-right">{{ trans('dash.payment.table.price') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($payments as $payment)
                                <tr>
                                    <td class="nowrap">
                                        <span class="status-pill smaller
                                            @switch($payment->status)
                                                @case(\Larabookir\Gateway\Enum::TRANSACTION_SUCCEED)
                                                    green
                                                    @break
                                                @case(\Larabookir\Gateway\Enum::TRANSACTION_FAILED)
                                                    red
                                                    @break
                                                @default
                                                    yellow
                                                    @break
                                            @endswitch"></span>
                                        <span>{{ statusTransaction($payment->status) }}</span>
                                    </td>
                                    <td>
                                        <span>{{ $payment->created_at->format("h:i a") }}</span>
                                        <span class="smaller lighter">{{ $payment->created_at->format('Y/m/d') }}</span>
                                    </td>
                                    <td class="text-right">
                                        {{ $payment->plan->name }}
                                    </td>
                                    <td class="text-center">
                                        @if(!! $payment->tracking_code )
                                            <a class="badge badge-success" href="{{ route('user.payment.show' , $payment->id ) }}">
                                                {{ $payment->tracking_code }}
                                            </a>
                                        @endif
                                    </td>
                                    <td class="text-right bolder nowrap">
                                        @php( $currency = currency($payment->transaction->price) )
                                        @switch($payment->status)
                                            @case(\Larabookir\Gateway\Enum::TRANSACTION_SUCCEED)
                                                <span class="text-success">+ {{ sprintf("%s %s" , $currency['currency'] , $currency['type'] ) }}</span>
                                            @break
                                            @case(\Larabookir\Gateway\Enum::TRANSACTION_FAILED)
                                                <span class="text-danger">- {{ sprintf("%s %s" , $currency['currency'] , $currency['type'] ) }}</span>
                                            @break
                                            @default
                                                <span class="text-warning">^ {{ sprintf("%s %s" , $currency['currency'] , $currency['type'] ) }}</span>
                                            @break
                                        @endswitch
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop
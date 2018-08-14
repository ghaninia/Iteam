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
                                <div class="balance-link">
                                    <a class="btn btn-link btn-underlined" href="#">
                                        <span>{{ trans('dash.payment.information') }}</span>
                                        <i class="os-icon os-icon-arrow-right4"></i>
                                    </a>
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
                                <div class="balance-link">
                                    <a class="btn btn-link btn-underlined" href="#">
                                        <span>{{ trans('dash.payment.information') }}</span>
                                        <i class="os-icon os-icon-arrow-right4"></i>
                                    </a>
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
                                <div class="balance-link">
                                    <a class="btn btn-link btn-underlined btn-gold" href="#">
                                        <span>{{ trans('dash.payment.information') }}</span>
                                        <i class="os-icon os-icon-arrow-right4"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!--END - BALANCES-->
                    </div>
                    <div class="col-lg-5 col-xxl-6">
                        <!--START - MESSAGE ALERT-->
                        <div class="alert alert-warning borderless">
                            <h5 class="alert-heading">Refer Friends. Get Rewarded</h5>
                            <p>You can earn: 15,000 Membership Rewards points for each approved referral – up to 55,000 Membership Rewards points per calendar year.</p>
                            <div class="alert-btn">
                                <a class="btn btn-white-gold" href="#">
                                    <i class="os-icon os-icon-ui-92"></i>
                                    <span>Send Referral</span>
                                </a>
                            </div>
                        </div>
                        <!--END - MESSAGE ALERT-->
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
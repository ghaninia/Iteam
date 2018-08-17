@extends('dash.layouts.app')
@section('main')
    <div class="content-box">
        <div class="element-wrapper">
            <div class="invoice-w">
                <div class="infos">
                    <div class="info-1">
                        <div class="invoice-logo-w">
                            <img alt="" src="img/logo2.png">
                        </div>
                        <div class="company-name">{{ $payment->plan->name }}</div>
                        <div class="company-extra" dir="ltr">{{ $payment->created_at->format("Y/m/d H:i:s") }}</div>
                    </div>

                </div>

                <div class="invoice-heading">
                </div>

                <div class="invoice-body">

                    <div class="invoice-desc">
                        <div class="desc-label">#{{ trans('dash.payment.factor') }}</div>
                        <div class="desc-value">{{ $payment->tracking_code }}</div>
                    </div>

                    <div class="invoice-table">
                        <table class="table" width="100%">
                            <thead>
                                <tr>
                                    <th>{{ trans('dash.payment.transaction_id') }}</th>
                                    <th>{{ trans('dash.payment.ip') }}</th>
                                    <th>{{ trans('dash.payment.price') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $payment->transaction_id }}</td>
                                    <td>{{ $payment->transaction->ip }}</td>
                                    @php( $payment = currency($payment->transaction->price) )
                                    <td class="text-right">{{ sprintf('%s %s' , $payment['currency'] , $payment['type'] ) }}</td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td>{{ trans('dash.payment.sum') }}</td>
                                    <td class="text-right" colspan="2">{{ sprintf('%s %s' , $payment['currency'] , $payment['type'] ) }}</td>
                                </tr>
                            </tfoot>
                        </table>
                        <div class="terms">
                            <div class="terms-header">Terms and Conditions</div>
                            <div class="terms-content">Should be paid as soon as received, otherwise a 5% penalty fee is applied</div>
                        </div>
                    </div>
                </div>

                <div class="invoice-footer">
                    <div class="invoice-logo">
                        <img alt="" src="img/logo.png">
                        <span>Paper Inc</span>
                    </div>
                    <div class="invoice-info">
                        <span>hello@paper.inc</span>
                        <span>858.757.4455</span>
                    </div>
                </div>

            </div>
        </div>
    </div>
@stop
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
                    <div class="info-2" style="width: 50%;text-align: right">
                        <div class="company-address">{{ $payment->plan->description }}</div>
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
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Description</th>
                                <th>Qty</th>
                                <th class="text-right">Price</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>User Interface</td>
                                <td>2</td>
                                @php( $payment = currency($payment->transaction->price) )
                                <td class="text-right">{{ sprintf('%s %s' , $payment['currency'] , $payment['type'] ) }}</td>
                            </tr>
                            <tr>
                                <td>Framework Development</td>
                                <td>4</td>
                                <td class="text-right">$9,750</td>
                            </tr>
                            <tr>
                                <td>Widgets and Plugins</td>
                                <td>1</td>
                                <td class="text-right">$1,240</td>
                            </tr>
                            </tbody>
                            <tfoot>
                            <tr>
                                <td>Total</td>
                                <td class="text-right" colspan="2">$15,490</td>
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
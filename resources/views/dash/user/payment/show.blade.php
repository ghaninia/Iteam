@extends('dash.layouts.app')
@section('main')
    <div class="content-box">
        <div class="element-wrapper">
            <div class="invoice-w">
                <div class="invoice-body">
                    <div class="invoice-table">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>{{ trans('dash.payment.table.planname') }}</th>
                                    <th>{{ trans('dash.payment.factor') }}</th>
                                    <th>{{ trans('dash.payment.transaction_id') }}</th>
                                    <th>{{ trans('dash.payment.ip') }}</th>
                                    <th>{{ trans('dash.payment.price') }}</th>
                                    <th>{{ trans('dash.payment.table.created_at') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $payment->plan->name }}</td>
                                    <td>{{ $payment->tracking_code }}</td>
                                    <td>{{ $payment->transaction_id }}</td>
                                    <td>{{ $payment->transaction->ip }}</td>
                                    @php( $paymentCreatedAt = currency($payment->transaction->price) )
                                    <td class="text-right">{{ sprintf('%s %s' , $paymentCreatedAt['currency'] , $paymentCreatedAt['type'] ) }}</td>
                                    <td class="text-center" dir="ltr">{{ $payment->created_at->format("Y/m/d H:i:s") }}</td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td>{{ trans('dash.payment.sum') }}</td>
                                    <td class="text-right" colspan="5">{{ sprintf('%s %s' , $paymentCreatedAt['currency'] , $paymentCreatedAt['type'] ) }}</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
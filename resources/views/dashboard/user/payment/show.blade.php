@extends("dashboard.layouts.master")
@section("main")
    <div class="container">
        <div class="row">
            <div class="col-lg-8 push-lg-2">

                @if (session()->has(["status" , "message"]))
                    <div class="alert @if(session()->pull("status")) alert-success @else alert-danger @endif alert-dismissible fade show" role="alert">
                        {{ session()->pull("message") }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                <div class="card overflow_hidden">
                    <div class="card-body">
                        <div class="card-title h5" >
                            {{ trans("dashboard.pages.payment.factor") }}
                        </div>
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead class="thead-light h6">
                                    <tr>
                                        <th>{{ trans('dashboard.pages.payment.transaction_id') }}</th>
                                        <th>{{ trans('dashboard.pages.payment.tracking_code') }}</th>
                                        <th>{!! trans('dashboard.pages.payment.ip') !!}</th>
                                        <th class="text-center">{!! trans('dashboard.pages.payment.status') !!}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="font-en h6">
                                        <td>{{ $payment->transaction_id }}</td>
                                        <td>{{ $payment->tracking_code }}</td>
                                        <td>{{ $payment->transaction->ip }}</td>
                                        <td class="text-center">
                                            @if ($payment->status == \Larabookir\Gateway\Enum::TRANSACTION_SUCCEED)
                                                <i data-toggle="tooltip" data-placement="top" title="{{ trans("dashboard.pages.payment.ok.".$payment->status) }}" class="simple-icon-check text-primary"></i>
                                            @endif
                                        </td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        @php( $pay = currency($payment->transaction->price) )
                                        <td class="h6">{!! trans('dashboard.pages.payment.sum') !!}</td>
                                        <td class="h4 text-center bg-light" colspan="3">{{ sprintf('%s %s' , number_format($pay['currency']) , $pay['type'] ) }}</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer position-relative">
                        <div class="cover__side" style="background-image:url({{ picture($payment->plan) }})"></div>
                        <div class="position-relative text-left h6 mt-2 font-weight-bold" style="z-index:2">
                            {{ $payment->created_at->format("d F Y") }}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@stop
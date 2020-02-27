@extends("dashboard.layouts.master")
@section("main")
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card payments" id="payments">
                    <div class="card-body">
                        <div class="card-title">
                            <form method="POST" autocomplete="off">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-8">
                                        <h5 class="card-title">
                                            {{  trans("dashboard.pages.payment.factor") }}
                                        </h5>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <input class="form-control" type="text" placeholder="{{ trans("dashboard.items.tracking_code") }}" class="form-control" name="tracking_code" value="{{ old("tracking_code") }}">
                                            <i class="icon simple-icon-magnifier"></i>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div id="payments__body">
                            <table class="table table-padded">
                                <thead>
                                    <tr>
                                        <th>{{ trans('dashboard.pages.payment.planname') }}</th>
                                        <th>{{ trans('dashboard.pages.payment.status') }}</th>
                                        <th>{{ trans('dashboard.pages.payment.date') }}</th>
                                        <th class="text-center">{{ trans('dashboard.pages.payment.trackingcode') }}</th>
                                        <th class="text-right">{{ trans('dashboard.pages.payment.price') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                        <div id="payments__paginate"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
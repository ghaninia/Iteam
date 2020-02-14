@extends("dashboard.layouts.master")
@section("main")
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <h5 class="card-title">
                                {{  trans("dashboard.pages.payment.factor") }}
                            </h5>
                        </div>
                        <form action="">
                            @csrf
                            <div class="row">
                                <div class="col">
                                    <label class="form-group has-top-label">
                                        <input class="form-control">
                                        <span>{{ trans("dashboard.items.tracking_code") }}</span>
                                    </label>
                                </div>
                                <div class="col">
                                    <label class="form-group has-top-label">
                                        <input class="form-control date">
                                        <span>{{ trans("dashboard.items.created_at_begin") }}</span>
                                    </label>
                                </div>
                                <div class="col">
                                    <label class="form-group has-top-label">
                                        <input class="form-control date">
                                        <span>{{ trans("dashboard.items.created_at_end") }}</span>
                                    </label>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
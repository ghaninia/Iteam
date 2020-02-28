@extends("dashboard.layouts.master")
@section("main")
<div class="container">
    <div class="row">
        <div class="col-lg-8 push-lg-2">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">
                        {{ trans("dashboard.pages.team.create") }}
                    </h5>

                    <label class="form-group has-top-label">
                        <input class="form-control">
                        <span>{{ trans("dashboard.pages.team.items.name") }}</span>
                    </label>

                </div>
            </div>
        </div>
    </div>
</div>
@stop

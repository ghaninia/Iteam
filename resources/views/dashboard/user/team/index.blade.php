@extends("dashboard.layouts.master")
@section("main")
<div class="col-lg-4">
    <div id="teams">
        <div class="teams">
        </div>
        <div class="more" align="center">
            <button class=" btn btn-outline-primary btn-xs ">
                {{ trans("dashboard.items.more") }}
                <i class="icon-feather-more-horizontal" style="position:relative;top:2px"></i>
            </button>
        </div>
    </div>
</div>
@stop
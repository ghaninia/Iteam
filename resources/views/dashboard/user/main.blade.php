@extends("layouts.dashboard")
@section("main")
    <div class="col-lg-12 col-xl-6">
        <div class="card mb-4 progress-banner">
            <div class="card-body justify-content-between d-flex flex-row align-items-center">
                <div>
                    <i class="iconsmind-Printer mr-2 text-white align-text-bottom d-inline-block"></i>
                    <div>
                        <p class="lead text-white">5 Files</p>
                        <p class="text-small text-white">Pending for print</p>
                    </div>
                </div>

                <div>
                    <div role="progressbar" class="progress-bar-circle progress-bar-banner position-relative" data-color="white" data-trail-color="rgba(255,255,255,0.2)" aria-valuenow="5" aria-valuemax="12" data-show-percent="false">
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
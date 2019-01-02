@extends("layouts.dashboard")
@section("main")

    <div class="col-xl-4 col-sm-12">
        <div class="card mb-4">
            <div class="card-body d-flex justify-content-between align-items-center">
                <h6 class="mb-0">{{ trans("dash.profile.account.completed") }}</h6>
                <div role="progressbar" class="progress-bar-circle position-relative"
                     data-color="#922c88" data-trailColor="#d7d7d7" aria-valuemax="100"
                     aria-valuenow="{{ $precentCompleted }}" data-show-percent="true">
                </div>
            </div>
        </div>
        <!-- logs -->
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ trans("dash.pages.log.label") }}</h5>
                <div class="scroll dashboard-logs">
                    <table class="table table-sm table-borderless">
                        <tbody>
                            @foreach($logs as $log)
                            <tr>
                                <td>
                                    <span class="log-indicator border-theme-1 align-middle"></span>
                                </td>
                                <td>
                                    <span class="font-weight-medium">{{ $log->title }}</span>
                                </td>
                                <td class="text-left ltr">
                                    <span class="text-muted">{{ $log->created_at }}</span>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-8 col-sm-12">
        <div class="row">
            <div class="col-xl-6 col-sm-6">

                <!-- team widget -->
                <div class="card mb-4 progress-banner">
                    <div class="card-body justify-content-between d-flex flex-row align-items-center">

                        <div>
                            <i class="iconsmind-Big-Data mr-2 text-white align-text-bottom d-inline-block"></i>
                            <div>
                                <p class="lead text-white">{{ trans("dash.pages.team.my_team" , ["attribute" => $usage['teams']['all'] ]) }}</p>
                                <p class="text-small text-white">{{ trans("dash.pages.team.desc") }}</p>
                            </div>
                        </div>

                        <div>
                            <div
                                    role="progressbar"
                                    class="progress-bar-circle progress-bar-banner position-relative"
                                    data-color="white" data-trail-color="rgba(255,255,255,0.2)"
                                    aria-valuenow="{{ $usage['teams']['current_usage'] }}"
                                    aria-valuemax="{{ $usage['teams']['max'] }}"
                                    data-show-percent="false">
                            </div>
                        </div>

                    </div>
                </div>

            </div>
            <div class="col-xl-6 col-sm-6">

                <!-- offer widget -->
                <div class="card mb-4 progress-banner">
                    <div class="card-body justify-content-between d-flex flex-row align-items-center">

                        <div>
                            <i class="iconsmind-Diploma-2 mr-2 text-white align-text-bottom d-inline-block"></i>
                            <div>
                                <p class="lead text-white">{{ trans("dash.pages.offer.my_offer" , ["attribute" => $usage['offers']['all'] ]) }}</p>
                                <p class="text-small text-white">{{ trans("dash.pages.offer.desc") }}</p>
                            </div>
                        </div>

                        <div>
                            <div
                                    role="progressbar"
                                    class="progress-bar-circle progress-bar-banner position-relative"
                                    data-color="white" data-trail-color="rgba(255,255,255,0.2)"
                                    aria-valuenow="{{ $usage['offers']['current_usage'] }}"
                                    aria-valuemax="{{ $usage['offers']['max'] }}"
                                    data-show-percent="false">
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
        <div class="row">
        </div>
    </div>

@stop
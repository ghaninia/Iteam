@extends("layouts.dashboard")
@section("main")
    <div class="col-xl-4 col-lg-5 col-sm-6">
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
                    <div
                        role="progressbar"
                        class="progress-bar-circle progress-bar-banner position-relative"
                        data-color="white" data-trail-color="rgba(255,255,255,0.2)"
                        aria-valuenow="5"
                        aria-valuemax="12"
                        data-show-percent="false">
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Logs</h5>
                <div class="scroll dashboard-logs">
                    <table class="table table-sm table-borderless">
                        <tbody>
                            <tr>
                                <td>
                                    <span class="log-indicator border-theme-1 align-middle"></span>
                                </td>
                                <td>
                                    <span class="font-weight-medium">New user registiration</span>
                                </td>
                                <td class="text-right">
                                    <span class="text-muted">14:12</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop
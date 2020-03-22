@extends("dashboard.layouts.master")
@section("main")
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="compelete_step mb-4 pt-4" align="center">
                        <h4>{{ trans("dashboard.pages.team.create_desc") }}</h4>
                        <div class="proccess">
                            <div class="proccess_bar" width="50%"></div>
                        </div>
                    </div>
                    <form action="" id="team__create">
                        <section>
                            <div class="row">
                                <div class="col-lg-6 push-lg-3">
                                    <label class="form-group has-top-label">
                                        <input class="form-control">
                                        <span>{{ trans("dashboard.pages.team.items.name") }}</span>
                                    </label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-9  push-lg-3">
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <label
                                                class="form-group has-top-label lengthCheck"
                                                data-length="{{  config("timo.max_team_desc") }}" >
                                                 <textarea
                                                     rows="5"
                                                      name="bio"
                                                      maxlength="{{ config("timo.max_team_desc") }}"
                                                      class="form-control"></textarea>
                                                <span>{{ trans("dashboard.pages.team.items.excerpt") }}</span>
                                            </label>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="content-box">
                                                <h3>{{ trans("dashboard.pages.team.items.description") }}</h3>
                                                <p>
                                                    {!! trans("dashboard.pages.team.items.content_desc") !!}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </section>
                        <section>
                            <div class="row">
                                <div class="col-lg-6 push-lg-3">
                                    <div class="form-group">
                                        <select name="provinces" id="provinces" data-url="{{ route("user.api.province") }}">

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <select name="cities" id="cities">
                                        </select>
                                    </div>
                                    <label class="form-group has-top-label">
                                        <input class="form-control">
                                        <span>{{ trans("dashboard.pages.team.items.address") }}</span>
                                    </label>
                                </div>
                            </div>
                        </section>
                        <section>

                        </section>
                        <section>

                        </section>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

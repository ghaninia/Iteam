@extends("dashboard.layouts.master")
@section("main")
<div class="container">
    <div class="row">
        <div class="col-lg-12" style="position:relative">
            <div class="card">
                <div class="card-body">
                    <div class="compelete_step mb-5 pt-4 sticky" align="center">
                        <span>{{ trans("dashboard.pages.team.create_desc") }}</span>
                        <div class="proccess">
                            <div class="proccess_bar" width="0"></div>
                        </div>
                    </div>
                    <form action="" class="mt-5" id="team__create" autocomplete="off">
                        <section>
                            <div class="row">
                                <div class="col-lg-6 push-lg-3">
                                    <label class="form-group has-top-label">
                                        <input class="form-control" name="name">
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
                                                     name="excerpt"
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

                        <section class="mt-5">
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
                                        <input class="form-control" name="address">
                                        <span>{{ trans("dashboard.pages.team.items.address") }}</span>
                                    </label>
                                </div>
                            </div>
                        </section>

                        <section class="mt-5 selections">
                            <div class="row">
                                <div class="col-lg-6 push-lg-3">
                                    <div class="g_checkbox selector">
                                        <label class="checkbox">
                                            <input checked type="radio" value="profile" name="contact_type">
                                            <span>{{ trans("dashboard.pages.team.items.contact.profile") }}</span>
                                        </label>
                                        <label class="checkbox">
                                            <input type="radio" value="custom" name="contact_type">
                                            <span>{{ trans("dashboard.pages.team.items.contact.custom") }}</span>
                                        </label>
                                    </div>
                                    <div class="mt-2 content_selector">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <label class="form-group has-top-label">
                                                    <input dir="ltr" class="form-control font-en" name="phone" data-default="{{ $user->phone }}" value="{{ $user->phone }}" readonly disabled>
                                                    <span>{{ trans("dashboard.pages.team.items.phone") }}</span>
                                                </label>
                                                <label class="form-group has-top-label">
                                                    <input dir="ltr" class="form-control font-en" name="fax" data-default="{{ $user->fax }}" value="{{ $user->fax }}" readonly disabled>
                                                    <span>{{ trans("dashboard.pages.team.items.fax") }}</span>
                                                </label>
                                            </div>
                                            <div class="col-lg-6">
                                                <label class="form-group has-top-label">
                                                    <input dir="ltr" class="form-control font-en" name="mobile" data-default="{{ $user->mobile }}" value="{{ $user->mobile }}" readonly disabled>
                                                    <span>{{ trans("dashboard.pages.team.items.mobile") }}</span>
                                                </label>
                                                <label class="form-group has-top-label">
                                                    <input dir="ltr" class="form-control font-en" name="website" data-default="{{ $user->website }}" value="{{ $user->website }}" readonly disabled>
                                                    <span>{{ trans("dashboard.pages.team.items.website") }}</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>

                        <section class="mt-5">
                            <div class="row">
                                <div class="col-lg-6 push-lg-3">
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <div class="form-group">
                                                <label class="form-group has-top-label amount">
                                                    <input min="1"
                                                       class="form-control font-en"
                                                        max="{{ config("timo.max_count_member") }}"
                                                        type="number"
                                                        autocomplete="off"
                                                        name="count_member">
                                                    <span>{{ trans("dashboard.pages.team.items.count_member") }}</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="g_checkbox selector">
                                                @foreach( genders() as $key  )
                                                        <label class="checkbox">
                                                            <input type="checkbox" value="{{ $key }}" name="required_gender[]" multiple  @if($loop->index == 0) checked @endif>
                                                            <span>{{ trans("dashboard.profile.gender.{$key}") }}</span>
                                                        </label>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>

                        <section class="mt-5">
                            <div class="row">
                                <div class="col-lg-6 push-lg-3">
                                    <div class="g_checkbox">
                                        @foreach(typeAssists() as $type)
                                            <label class="checkbox">
                                                <input type="radio" value="{{ $type }}" name="type_assists"  @if($loop->index == 0) checked @endif>
                                                <span>{!! trans("dashboard.pages.team.items.type_assists.{$type}") !!}</span>
                                            </label>
                                        @endforeach
                                    </div>
                                    <div class="selections mt-2">
                                        <div class="g_checkbox selector">
                                            @foreach(interplayFiscals() as $type)
                                                <label class="checkbox">
                                                    <input type="radio" value="{{ $type }}" name="interplay_fiscals"  @if($loop->index == 0) checked @endif>
                                                    <span>{!! trans("dashboard.pages.team.items.interplay_fiscals.{$type}") !!}</span>
                                                </label>
                                            @endforeach
                                        </div>
                                        <div class="content_selector">
                                            <div class="row mt-2">
                                                <div class="col">
                                                    <label class="form-group has-top-label ">
                                                        <input
                                                               class="form-control font-en"
                                                               dir="ltr"
                                                               type="number"
                                                               autocomplete="off"
                                                               disabled
                                                               name="min_salary">
                                                        <span>{{ trans("dashboard.pages.team.items.salary.min") }}</span>
                                                    </label>
                                                </div>
                                                <div class="col">
                                                    <label class="form-group has-top-label">
                                                        <input
                                                               class="form-control font-en"
                                                               dir="ltr"
                                                               type="number"
                                                               autocomplete="off"
                                                               disabled
                                                               name="max_salary">
                                                        <span>{{ trans("dashboard.pages.team.items.salary.max") }}</span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>

                        <section class="mt-5">
                            <div class="row">
                                <div class="col-lg-10 push-lg-1">

                                    <div class="tags__team slider">
                                        @foreach($tags as $tag)
                                            <label>
                                                <input type="radio" name="tag" value="{{ $tag->id }}" @if($loop->index == 0) checked @endif >
                                                <div>
                                                    <i class="{{ $tag->icon }}"></i>
                                                    <span>{{ $tag->name }}</span>
                                                </div>
                                            </label>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </section>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

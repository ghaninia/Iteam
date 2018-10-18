@extends('dash.layouts.app')
@section('main')
    <div class="content-i">

        <div class="content-box">
            <div class="row">
                @if($errors->count() > 0 )
                    <div class="col-lg-12">
                        @foreach($errors->all() as $error)
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <b>{{ trans("dash.items.danger") }}</b>{{ $error }}
                            </div>
                        @endforeach
                    </div>
                @endif

                <div class="col-lg-8">
                    <div class="element-wrapper">
                        <div class="element-box">

                            <form action="{{ route('user.team.store') }}" method="POST">
                                @csrf
                                <div class="steps-w">

                                    <div class="step-triggers">
                                        <a class="step-trigger active">{{ trans('dash.team.create.titles') }}</a>
                                        <a class="step-trigger" >{{ trans('dash.team.create.info') }}</a>
                                        <a class="step-trigger">{{ trans('dash.team.create.geo') }}</a>
                                        <a class="step-trigger">{{ trans('dash.team.create.skills_need') }}</a>
                                    </div>

                                    <div class="step-contents">

                                        <!--- titles --->
                                        <div class="step-content active">

                                            <div class="form-group">
                                                <label for="name">{{ trans("dash.team.create.name") }}</label>
                                                <input value="{{ old('name') }}" autocomplete="off" required class="form-control" placeholder="{{ trans("dash.team.create.name") }}" name="name">
                                                <div class="help-block with-errors"></div>
                                                <small class="gray">{{ trans("dash.team.create.label_name") }}</small>
                                            </div>

                                            <div class="form-group">
                                                <label for="excerpt">{{ trans("dash.team.create.excerpt") }}</label>
                                                <textarea class="form-control" placeholder="{{ trans("dash.team.create.excerpt") }}" name="excerpt">{{ old('excerpt') }}</textarea>
                                                <div class="help-block with-errors"></div>
                                                <small class="gray">{{ trans("dash.team.create.label_excerpt") }}</small>
                                            </div>

                                            <div class="form-group">
                                                <label for="content">{{ trans("dash.team.create.content") }}</label>
                                                <textarea id="content" class="form-control" placeholder="{{ trans("dash.team.create.content") }}" name="content">{{ old('content') }}</textarea>
                                                <div class="help-block with-errors"></div>
                                                <small class="gray">{{ trans("dash.team.create.label_content") }}</small>
                                            </div>

                                        </div>

                                        <!--- info --->
                                        <div class="step-content">

                                            <div class="form-group">
                                                <label for="count_member">{{ trans("dash.team.create.count_member") }}</label>
                                                <input min="0" max="100" value="{{ old('count_member') }}" type="number" autocomplete="off" required class="form-control" placeholder="{{ trans("dash.team.create.count_member") }}" name="count_member">
                                                <small class="gray">{{ trans("dash.team.create.label_count_member") }}</small>
                                            </div>

                                            <div class="form-group">
                                                <label for="required_gender">{{ trans("dash.team.create.required_gender") }}</label>
                                                <select class="form-control"  name="required_gender[]" id="required_gender" multiple>
                                                    @foreach(genders() as $gender)
                                                        <option {{ !in_array($gender,old('required_gender' , []))  ?: 'selected' }} value="{{ $gender }}">{{ trans("dash.genders.{$gender}") }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="type_assist">{{ trans("dash.team.create.type_assist") }}</label>
                                                <select class="form-control"  name="type_assist[]" id="type_assist" multiple>
                                                    @foreach(typeAssists() as $type)
                                                        <option {{ !in_array($type,old('type_assist' , []))  ?: 'selected' }} value="{{ $type }}">{{ trans("dash.type_assists.{$type}") }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="interplay_fiscal">{{ trans("dash.team.create.interplay_fiscal") }}</label>
                                                <select class="form-control"  name="interplay_fiscal" id="interplay_fiscal">
                                                    @foreach(interplayFiscals() as $type)
                                                        <option {{  old('interplay_fiscal') == $type ? 'selected' : null  }} value="{{ $type }}">{{ trans("dash.interplay_fiscals.{$type}") }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group salaries {{  old('interplay_fiscal') === 'fixedsalary' ? null : 'hidden' }} " >
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <label for="min_salary">{{ trans("dash.team.create.min_salary") }}</label>
                                                        <input  {{  old('interplay_fiscal') === 'fixedsalary    ' ? null : 'disabled' }}  value="{{ old('min_salary') }}" min="0" name="min_salary" type="number" class="form-control">
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <label for="max_salary">{{ trans("dash.team.create.max_salary") }}</label>
                                                        <input  {{  old('interplay_fiscal') === 'fixedsalary' ? null : 'disabled' }} value="{{ old('max_salary') }}" min="0" name="max_salary" type="number" class="form-control">
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <!--- geo --->
                                        <div class="step-content ">

                                            <div class="alert alert-warning borderless">
                                                <h5 class="alert-heading">{{ trans("dash.items.readmore") }}</h5>
                                                <p>{{ trans("dash.team.create.label_geo") }}</p>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="phone">{{ trans('dash.team.create.phone')  }}</label>
                                                        <input value="{{ old('phone') }}" dir="ltr" class="form-control" name="phone" id="phone">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="phone">{{ trans('dash.team.create.fax')  }}</label>
                                                        <input value="{{ old('fax') }}" dir="ltr" class="form-control" name="fax" id="fax">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="mobile">{{ trans('dash.team.create.mobile')  }}</label>
                                                <input value="{{ old('mobile') }}" dir="ltr" class="form-control" name="mobile" id="mobile">
                                            </div>

                                            <div class="form-group">
                                                <label for="email">{{ trans('dash.team.create.email')  }}</label>
                                                <input value="{{ old('email') }}" dir="ltr" class="form-control" name="email" id="email">
                                            </div>

                                            <div class="form-group">
                                                <label for="email">{{ trans('dash.team.create.website')  }}</label>
                                                <input value="{{ old('website') }}" type="url" dir="ltr" class="form-control" name="website" id="website">
                                            </div>


                                            <div class="row">
                                                
                                                <div class="col-sm-6">
                                                    <div class="form-group  {{ $errors->has("province_id") ? 'has-error has-danger' : "" }}">
                                                        <label for="province">{{ trans('dash.panel.user.province_id')  }}</label>
                                                        <select name="province_id" id="province" class="form-control">
                                                            <option value="" selected>{{ trans('dash.profile.please_select_item') }}</option>
                                                            @foreach($provinces as $province)
                                                                <option @if(old("province_id") == $province->id) selected @endif value="{{ $province->id }}">
                                                                    {{ $province->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        <div class="form-control-feedback help-block with-errors form-text">
                                                            @if($errors->has("province_id")) {{ $errors->first('province_id') }} @endif
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="city">{{ trans('dash.panel.user.city_id')  }}</label>
                                                        <select name="city_id" id="city" class="form-control">
                                                            <option value="" selected>{{ trans('dash.profile.please_select_item') }}</option>
                                                        </select>
                                                        <div class="form-control-feedback help-block with-errors form-text">
                                                            @if($errors->has("city_id")) {{ $errors->first('city_id') }} @endif
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="form-group">
                                                <label for="address">{{ trans('dash.team.create.address')  }}</label>
                                                <textarea class="form-control" name="address" id="address" >{{ old('address') }}</textarea>
                                            </div>

                                        </div>


                                        <!-- skill --->
                                        <div class="step-content ">
                                            <div class="form-group">
                                                <label for="">{{ trans("dash.team.create.tag") }}</label>
                                                <select class="form-control" name="tag" id="tags" >
                                                    <option disabled="" value="" selected>{{ trans('dash.items.select_one') }}</option>
                                                    @foreach($tags as $tag)
                                                        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <select class="form-control" name="child_tag" id="child_tag">
                                                    <option disabled="" value="" selected>{{ trans('dash.items.select_one') }}</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="">{{ trans("dash.team.create.skill") }}</label>
                                                <select multiple class="form-control" name="skills[]" id="skills">
                                                    <option disabled="" value="" selected>{{ trans('dash.items.select_one') }}</option>
                                                </select>
                                                <small class="gray">{{ trans('dash.team.create.skill_label') }}</small>
                                            </div>
                                        </div>

                                        <!--- button --->
                                        <div class="form-buttons-w text-right p-2" style="overflow: hidden">
                                            <button type="button" class="btn btn-primary step-trigger-btn float-right prev hidden">
                                                <i class="os-icon os-icon-arrow-left"></i>
                                                {{ trans("dash.team.create.prev") }}
                                            </button>

                                            <button type="button" class="btn btn-primary step-trigger-btn float-left next">
                                                {{ trans("dash.team.create.next") }}
                                                <i class="os-icon os-icon-arrow-right3"></i>
                                            </button>

                                            <button class="btn btn-success float-left submit hidden">
                                                <i class="os-icon os-icon-mail-18"></i>
                                                {{ trans("dash.team.create.submit") }}
                                            </button>
                                        </div>

                                    </div>

                                </div>
                            </form>

                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
@stop

@section("plugins")
    <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
@stop
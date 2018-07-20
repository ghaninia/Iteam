@extends('dash.layouts.app')
@section('main')
<div class="content-box">

    <div class="row">
        <!--------------------------------->
        <!-- نگاه کوتاه به پروفایل کاربر -->
        <!--------------------------------->
        <div class="col-sm-5">
            <div class="user-profile compact">
                <div class="up-head-w" style="background-image:url({{ picture('cover','thumbnail') }})">
                    <div class="up-social">
                        @if(!!$account->instagram_account)
                            <a href="{{ $account->instagram_account }}">
                                <i class="ti-instagram"></i>
                            </a>
                        @endif
                        @if(!!$account->linkedin_account)
                            <a href="{{ $account->linkedin_account }}">
                                <i class="ti-linkedin"></i>
                            </a>
                        @endif
                    </div>
                    <div class="up-main-info">
                        <div class="user-avatar-w"><div class="user-avatar"><img src="{{ picture('avatar','thumbnail') }}"></div></div>
                        <h2 class="up-header">{{ $account->fullname }}</h2>
                        <h6 class="up-sub-header">{{ str_slice($account->bio) }}</h6>
                    </div>
                    <svg  class="decor" width="842px" height="219px" viewBox="0 0 842 219" preserveAspectRatio="xMaxYMax meet" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <g transform="translate(-381.000000, -362.000000)" fill="#FFFFFF">
                            <path
                            class="decor-path" d="
                            M1223,362
                            L1223,581
                            L381,581
                            C868.912802,575.666667
                            1149.57947,502.666667
                            1223,362 Z"></path>
                        </g>
                    </svg>
                </div>
                <div class="up-controls">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="value-pair">
                                <div class="label">{{ trans('dash.panel.user.confirm.text') }} : </div>
                                @if($account->confirmed_email)
                                    <div class="value badge badge-pill badge-success">{{ trans('dash.active.enable') }}</div>
                                @else
                                    <div class="value badge badge-pill badge-danger">{{ trans('dash.active.disabled') }}</div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="up-contents">
                    <div class="m-b">
                        <div class="row m-b">
                            <div class="col-sm-6 b-r b-b">
                                <div class="el-tablo centered padded-v">
                                    <div class="value">{{ $account->offers_count }}</div>
                                    <div class="label">{{ trans('dash.profile.count_offers') }}</div>
                                </div>
                            </div>
                            <div class="col-sm-6 b-b">
                                <div class="el-tablo centered padded-v">
                                    <div class="value">{{ $account->teams_count }}</div>
                                    <div class="label">{{ trans('dash.profile.count_teams') }}</div>
                                </div>
                            </div>
                        </div>

                        @if(isset($log['teams']['max'] , $log['teams']['current_usage'],$log['teams']['all']))
                            <div class="padded">
                                <div class="os-progress-bar primary">
                                    <div class="bar-labels">

                                        <div class="bar-label-right">
                                            <span class="positive">{{ $log['teams']['all'] > 10 ? "+10" : ""  }}</span>
                                        </div>
                                        <div class="bar-label-left">
                                            <span>{{ trans('dash.panel.user.activated_team') }}</span>
                                            <span class="info">{{ sprintf('%s/%s' , $log['teams']['max'] , $log['teams']['current_usage'] ) }}</span>
                                        </div>
                                    </div>

                                    @if($log['teams']['max'] > $log['teams']['all'])
                                        @php
                                            $max = $log['teams']['max'] ;
                                            $usage = $log['teams']['current_usage'] ;
                                            $usage = ( $usage * 100 ) / $max ;
                                        @endphp
                                        <div class="bar-level-1" style="width:100%">
                                            <div class="bar-level-2" style="width: {{ $usage }}%"></div>
                                        </div>
                                    @else
                                        @php
                                            $all = $log['teams']['all'] ;
                                            $max = $log['teams']['max'] ;
                                            $usage = $log['teams']['current_usage'] ;
                                            $max = ceil(($max * 100)/$all) ;
                                            $usage = ceil(($usage * 100)/$log['teams']['max']) ;
                                        @endphp
                                        <div class="bar-level-1" style="width:100%">
                                            <div class="bar-level-2" style="width:{{ $max }}%">
                                                <div class="bar-level-3" style="width:{{ $usage }}%"></div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endif

                        @if(isset($log['offers']['max'] , $log['offers']['current_usage'],$log['offers']['all']))
                            <div class="padded">
                                <div class="os-progress-bar primary">
                                    <div class="bar-labels">

                                        <div class="bar-label-right">
                                            <span class="positive">{{ $log['offers']['all'] > 10 ? "+10" : ""  }}</span>
                                        </div>
                                        <div class="bar-label-left">
                                            <span>{{ trans('dash.panel.user.activated_offer') }}</span>
                                            <span class="info">{{ sprintf('%s/%s' , $log['offers']['max'] , $log['offers']['current_usage'] ) }}</span>
                                        </div>
                                    </div>

                                    @if($log['offers']['max'] > $log['offers']['all'])
                                        @php
                                            $max = $log['offers']['max'] ;
                                            $usage = $log['offers']['current_usage'] ;
                                            $usage = ( $usage * 100 ) / $max ;
                                        @endphp
                                        <div class="bar-level-1" style="width:100%">
                                            <div class="bar-level-2" style="width: {{ $usage }}%"></div>
                                        </div>
                                    @else
                                        @php
                                            $all = $log['offers']['all'] ;
                                            $max = $log['offers']['max'] ;
                                            $usage = $log['offers']['current_usage'] ;
                                            $max = ceil(($max * 100)/$all) ;
                                            $usage = ceil(($usage * 100)/$log['offers']['max']) ;
                                        @endphp
                                        <div class="bar-level-1" style="width:100%">
                                            <div class="bar-level-2" style="width:{{ $max }}%">
                                                <div class="bar-level-3" style="width:{{ $usage }}%"></div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
        <!-- ویرایش پروفایل کاربر -->
        <div class="col-sm-7">
            <form  data-toggle="validator" action="{{ route('dashboard.user.profile.account.store') }}" method="POST" id="profileUpdate" enctype="multipart/form-data">
                @csrf
                <div class="element-wrapper">
                    <div class="element-box">
                        <div class="element-info">
                            <div class="element-info-with-icon">
                                <div class="element-info-icon">
                                    <div class="os-icon os-icon-wallet-loaded"></div>
                                </div>
                                <div class="element-info-text">
                                    <h5 class="element-inner-header">{{ trans('dash.panel.user.edit.text') }}</h5>
                                    <div class="element-inner-desc">{{ trans('dash.panel.user.edit.desc') }}</div>
                                </div>
                            </div>
                        </div>
                        <div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="avatar">{{ trans('dash.panel.user.avatar')  }}</label>
                                        <div class="avatar-wrapper" title="{{ trans('dash.profile.choose_picture') }}">
                                            <img src="{{ picture("avatar") }}" />
                                            <div class="upload-button"></div>
                                            <input type="file" id="avatar" name="avatar" accept="image/*"/>
                                        </div>
                                        <div class="form-control-feedback help-block with-errors form-text">
                                            @if($errors->has("avatar")) {{ $errors->first('avatar', 'thumbnail') }} @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="cover">{{ trans('dash.panel.user.cover')  }}</label>
                                        <div class="avatar-wrapper" title="{{ trans('dash.profile.choose_picture') }}">
                                            <img src="{{ picture("cover" , 'thumbnail') }}" />
                                            <div class="upload-button"></div>
                                            <input id="cover" type="file" name="cover" accept="image/*"/>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group {{ $errors->has("name") ? 'has-error has-danger' : "" }}">
                                        <label for="name">{{ trans('dash.panel.user.name')  }}</label>
                                        <input maxlength="191" autocomplete="off" value="{{ $account->name }}" name="name" id="name" class="form-control" placeholder="{{ trans('dash.panel.user.name')  }}" >
                                         <div class="form-control-feedback help-block with-errors form-text">@if($errors->has("name")) {{ $errors->first('name') }} @endif</div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="family">{{ trans('dash.panel.user.family')  }}</label>
                                        <input maxlength="191" autocomplete="off" value="{{ $account->family }}" name="family" id="family" class="form-control" placeholder="{{ trans('dash.panel.user.family')  }}" >
                                         <div class="form-control-feedback help-block with-errors form-text">@if($errors->has("family")) {{ $errors->first('family') }} @endif</div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group  {{ $errors->has("username") ? 'has-error has-danger' : "" }}">
                                        <label for="username">{{ trans('dash.panel.user.username')  }}</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">@</div>
                                            </div>
                                            <input required maxlength="191" autocomplete="off" dir="auto" value="{{ $account->username }}" class="form-control" name="username" id="username">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group  {{ $errors->has("email") ? 'has-error has-danger' : "" }}">
                                        <label for="email">{{ trans('dash.panel.user.email')  }}</label>
                                        <input type="email" required maxlength="191" dir="auto" class="form-control" name="email" id="email" type="email" value="{{ $account->email }}">
                                         <div class="form-control-feedback help-block with-errors form-text">@if($errors->has("email")) {{ $errors->first('email') }} @endif</div>
                                    </div>
                                </div>
                            </div>

                            <fieldset>
                                <legend>
                                    <span>{{ trans('dash.profile.contact_information') }}</span>
                                </legend>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group  {{ $errors->has("mobile") ? 'has-error has-danger' : "" }}">
                                            <label for="mobile">{{ trans('dash.panel.user.mobile')  }}</label>
                                            <input required maxlength="11" autocomplete="off" dir="auto" name="mobile" id="mobile" class="form-control"value="{{ $account->mobile }}" >
                                             <div class="form-control-feedback help-block with-errors form-text">@if($errors->has("mobile")) {{ $errors->first('mobile') }} @endif</div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group  {{ $errors->has("phone") ? 'has-error has-danger' : "" }}">
                                            <label for="phone">{{ trans('dash.panel.user.phone')  }}</label>
                                            <input autocomplete="off" dir="auto" name="phone" id="phone" class="form-control"value="{{ $account->phone }}" >
                                             <div class="form-control-feedback help-block with-errors form-text">@if($errors->has("phone")) {{ $errors->first('phone') }} @endif</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group  {{ $errors->has("fax") ? 'has-error has-danger' : "" }}">
                                            <label for="fax">{{ trans('dash.panel.user.fax')  }}</label>
                                            <input autocomplete="off" dir="auto" name="fax" id="fax" class="form-control"value="{{ $account->fax }}" >
                                             <div class="form-control-feedback help-block with-errors form-text">@if($errors->has("fax")) {{ $errors->first('fax') }} @endif</div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group {{ $errors->has("website") ? 'has-error has-danger' : "" }}">
                                            <label for="website">{{ trans('dash.panel.user.website')  }}</label>
                                            <input type="url" autocomplete="off" dir="auto" name="website" id="website" class="form-control"value="{{ $account->website }}" >
                                             <div class="form-control-feedback help-block with-errors form-text">@if($errors->has("website")) {{ $errors->first('website') }} @endif</div>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>

                            <fieldset>
                                <legend>
                                    <span>{{ trans('dash.profile.social_information') }}</span>
                                </legend>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group  {{ $errors->has("instagram_account") ? 'has-error has-danger' : "" }}">
                                            <label for="instagram_account">{{ trans('dash.panel.user.instagram_account')  }}</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">@</div>
                                                </div>
                                                <input autocomplete="off" dir="auto" value="{{ $account->instagram_account }}" class="form-control" name="instagram_account" id="instagram_account">
                                                 <div class="form-control-feedback help-block with-errors form-text">@if($errors->has("instagram_account")) {{ $errors->first('instagram_account') }} @endif</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group  {{ $errors->has("linkedin_account") ? 'has-error has-danger' : "" }}">
                                            <label for="linkedin_account">{{ trans('dash.panel.user.linkedin_account')  }}</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">@</div>
                                                </div>
                                                <input autocomplete="off" dir="auto" value="{{ $account->linkedin_account }}" class="form-control" name="linkedin_account" id="linkedin_account">
                                                 <div class="form-control-feedback help-block with-errors form-text">@if($errors->has("linkedin_account")) <div class=" form-text text-muted form-control-feedback">{{ $errors->first('linkedin_account') }} @endif</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>

                            <fieldset>
                                <legend>
                                    <span>{{ trans('dash.profile.further_information') }}</span>
                                </legend>
                                <div class="form-group  {{ $errors->has("gender") ? 'has-error has-danger' : "" }}">
                                    <label for="gender">{{ trans('dash.panel.user.gender')  }}</label>
                                    <select name="gender" id="gender" class="form-control">
                                        @foreach(genders() as $gender)
                                            <option @if($account->gender==$gender) selected @endif value="{{ $gender }}">{{ trans("dash.genders.{$gender}") }}</option>
                                        @endforeach
                                    </select>
                                     <div class="form-control-feedback help-block with-errors form-text">@if($errors->has("gender")) {{ $errors->first('gender') }} @endif</div>
                                </div>
                                <div class="form-group  {{ $errors->has("bio") ? 'has-error has-danger' : "" }}">
                                    <label for="bio">{{ trans('dash.panel.user.bio')  }}</label>
                                    <textarea maxlength="200" rows="5" id="bio" name="bio" class="small form-control">{{ $account->bio }}</textarea>
                                     <div class="form-control-feedback help-block with-errors form-text">@if($errors->has("bio")) {{ $errors->first('bio') }} @endif</div>
                                </div>
                                <div class="row">

                                    <div class="col-sm-6">
                                        <div class="form-group  {{ $errors->has("province_id") ? 'has-error has-danger' : "" }}">
                                            <label for="province">{{ trans('dash.panel.user.province_id')  }}</label>
                                            <select onchange="cities(this,'city');" name="province_id" id="province" class="form-control">
                                                <option value="" selected>{{ trans('dash.profile.please_select_item') }}</option>
                                                @foreach($provinces as $province)
                                                    <option @if($account->province_id == $province->id) selected @endif value="{{ $province->id }}">
                                                        {{ $province->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                             <div class="form-control-feedback help-block with-errors form-text">@if($errors->has("province_id")) {{ $errors->first('province_id') }} @endif</div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group {{ $errors->has("city_id") ? 'has-error has-danger' : "" }}">
                                            <label for="city">{{ trans('dash.panel.user.city_id')  }}</label>
                                            <select name="city_id" id="city" class="form-control" {{ $cities->isEmpty() ? 'style="display: none;"' : "" }} >
                                                <option value="" selected>{{ trans('dash.profile.please_select_item') }}</option>
                                                @if($cities->isNotEmpty())
                                                    @foreach($cities as $city)
                                                        <option @if($account->city_id == $city->id) selected @endif value="{{ $city->id }}">
                                                            {{ $city->name }}
                                                        </option>
                                                    @endforeach
                                                @endif
                                            </select>
                                             <div class="form-control-feedback help-block with-errors form-text">@if($errors->has("city_id")) {{ $errors->first('city_id') }} @endif</div>
                                        </div>
                                    </div>

                                </div>
                            </fieldset>
                        </div>
                        <div class="form-buttons-w">
                            <button class="btn btn-primary disabled" >{{ trans('dash.profile.save_submit') }}</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>
<div class="content-panel">
    <div class="content-panel-close">
        <i class="os-icon os-icon-close"></i>
    </div>
</div>
@stop
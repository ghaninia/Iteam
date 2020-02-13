@extends("dashboard.layouts.master")
@section("main")
    <div class="col-lg-6 push-lg-3">
        <div class="card">
            <div class="card-body">
                <form id="_profile" action="{{ route("user.profile.account.store") }}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="accrodins">
                        <div class="accrodin active">
                            <div class="head">مشخصات شخصی</div>
                            <div class="body">
                                <div class="cover" id="profile__cover" @if(!!userPicture("cover")) style="background-image:url('{{ userPicture("cover" , "full") }}')" @endif >
                                    <input accept="image/*" type="file" name="cover" class="hidden"/>
                                    <input accept="image/*" type="file" name="picture" class="hidden"/>
                                    <img alt="{{ $user->fullname }}" id="profile__pic" src="{{ userPicture("avatar") }}" class="img-thumbnail border-0 mb-4 list-thumbnail "/>
                                    <div onClick="window.setPic(this);" id="profile__change-pic" class="profile__change-pic">
                                        <i class="glyph-icon simple-icon-camera"></i>
                                    </div>
                                    <div onClick="window.setCover(this);" id="profile__change-cover" class="profile__change-cover">
                                        <i class="glyph-icon simple-icon-camera"></i>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <label class="form-group has-top-label">
                                            <input name="name" class="form-control" value="{{ old("name") ?? $user->name }}" autoComplete="off"/>
                                            <span>نام</span>
                                        </label>
                                    </div>
                                    <div class="col-6">
                                        <label class="form-group has-top-label">
                                            <input name="family" class="form-control" value="{{ old("family") ?? $user->family }}" autoComplete="off"/>
                                            <span>نام خانوادگی</span>
                                        </label>
                                    </div>
                                </div>
                                <label class="form-group has-top-label uniqueCheck">
                                    <input dir="ltr" name="username" class="form-control" value="{{ old("username") ?? $user->username }}" autoComplete="off"/>
                                    <span>نام کاربری</span>
                                    <div class="verify"></div>
                                </label>
                            </div>
                        </div>

                        <div class="accrodin">
                            <div class="head">مشخصات تماس</div>
                            <div class="body">
                                <div class="row">
                                    <div class="col">
                                        <label class="form-group has-top-label uniqueCheck">
                                            <input dir="ltr" name="email" class="form-control" value="{{ old("email") ?? $user->email }}" autoComplete="off"/>
                                            <span>پست الکترونیک</span>
                                            <div class="verify"></div>
                                        </label>
                                    </div>
                                    <div class="col">
                                        <label class="form-group has-top-label">
                                            <input dir="ltr" name="website" class="form-control" value="{{ old("website") ?? $user->website }}" autoComplete="off"/>
                                            <span>وبسایت</span>
                                        </label>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6 col-xs-6 ">
                                        <label class="form-group has-top-label uniqueCheck">
                                            <input dir="ltr" name="mobile" class="form-control" value="{{ old("mobile") ?? $user->mobile }}" autoComplete="off"/>
                                            <span>موبایل</span>
                                            <div class="verify"></div>
                                        </label>
                                    </div>
                                    <div class="col-lg-6 col-xs-6">
                                        <label class="form-group has-top-label">
                                            <input dir="ltr" name="phone" class="form-control" value="{{ old("phone") ?? $user->phone }}" autoComplete="off"/>
                                            <span>تلفن</span>
                                        </label>
                                    </div>
                                    <div class="col-lg-12 col-xs-12">
                                        <label class="form-group has-top-label">
                                            <input dir="ltr" name="fax" class="form-control" value="{{ old("fax") ?? $user->fax }}" autoComplete="off"/>
                                            <span>فکس</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="accrodin">
                            <div class="head">در شبکه های مجازی</div>
                            <div class="body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="iconsmind-Instagram"></i>
                                            </span>
                                            </div>
                                            <input type="text" dir="ltr" class="form-control" name="instagram_account" value="{{ old("instagram_account") ?? $user->instagram_account }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mt-2">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="iconsmind-Linkedin-2"></i>
                                            </span>
                                            </div>
                                            <input type="text" dir="ltr" class="form-control" name="linkedin_account" value="{{ old("linkedin_account") ?? $user->linkedin_account }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="accrodin">
                            <div class="head">مشخصات فردی</div>
                            <div class="body">
                                <label
                                        class="form-group has-top-label lengthCheck"
                                        data-length="{{  config("timo.max_bio_length") }}" >
                                    <textarea style="max-height:140px;min-height: 140px ;height: 140px !important;"
                                        name="bio"
                                        maxlength="{{ config("timo.max_bio_length") }}"
                                        class="form-control">{{ old("bio") ?? $user->bio }}</textarea>
                                    <span>بیوگرافی</span>
                                </label>

                                <fieldset class="form-group">
                                    <div class="account-type">
                                        @foreach(['male' => 'simple-icon-symbol-male' , 'female' => 'simple-icon-symbol-female' ] as $gender => $icon )
                                            <div>
                                                <input type="radio" name="gender" value="{{ $gender }}" id="{{ $gender }}-radio" class="account-type-radio" @if($user->gender == $gender ) checked @endif />
                                                <label for="{{ $gender }}-radio" class="ripple-effect-dark">
                                                    <i class="{{ $icon }}"></i>
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </fieldset>

                            </div>
                        </div>
                    </div>

                    <button class="products btn-block pointer mt-4 font-weight-bold">
                        {{ trans("dashboard.profile.account.submit") }}
                    </button>
                </form>
            </div>
        </div>
    </div>
@stop
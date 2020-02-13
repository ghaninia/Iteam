@extends("dashboard.layouts.master")
@section("main")
    <div class="col-lg-6 push-lg-3">
        <div class="card-body">
                <h5 class="card-title">
                    {{  trans("dashboard.profile.password.label") }}
                </h5>

                <form id="_profile" action="{{ route("user.profile.password.store") }}" method="POST" enctype="multipart/form-data" >
                    @csrf

                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="new_password"><i class="glyph-icon simple-icon-key"></i></span>
                            <span class="input-group-text" id="new_password_eye" >
                                <i class="glyph-icon simple-icon-ban"></i>
                            </span>
                        </div>
                        <input required type="password" name="password" placeholder="{{ trans("dashboard.profile.password.new") }}" class="form-control" id="new_password_field" >
                        <div class="text-danger text-small mt-2 btn-block help-block with-errors">
                            @if($errors->has("password"))
                                {{ $errors->first('password') }}
                            @endif
                        </div>
                    </div>

                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="glyph-icon simple-icon-eye"></i>
                            </span>
                        </div>
                        <input required type="password" name="password_confirmation" class="form-control" placeholder="{{ trans("dashboard.profile.password.repeat") }}">
                        <div class="text-danger text-small mt-2 btn-block help-block with-errors">
                            @if($errors->has("password_confirmation"))
                                {{ $errors->first('password_confirmation') }}
                            @endif
                        </div>
                    </div>
                    <button class="products btn-block">ویرایش</button>
                </form>
            </div>
    </div>
@stop
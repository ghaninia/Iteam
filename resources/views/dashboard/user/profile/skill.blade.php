@extends("dashboard.layouts.master")
@section("main")
    <div class="container">
        <div class="row">
            <div class="col-lg-8 push-lg-2">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="skills" id="skills" data-href="{{ route("user.api.tag") }}" >
                            <div class="head">
                                <form autocomplete="off" action="{{ route("user.api.skill") }}" >
                                    @csrf
                                    <input type="text" name="s" placeholder="جستجوی مهارت ها">
                                </form>
                            </div>
                            <div class="body">
                                <div class="top overflow_hidden hidden">
                                    <div class="h6 float-right p-3 mt-1 mb-0"></div>
                                    <button class="btn float-left btn-default rounded-0 m-2 p-2 pr-4 pl-4">
                                        بازگشت به دسته بندی
                                    </button>
                                </div>
                                <div class="import">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="skills__list" id="skills_list" data-maxSkill="{{ $CountSkill }}">
                            <div class="head">
                                <div class="h1 pt-2"></div>
                                <span>{!! trans("dashboard.profile.skill.count_team") !!}</span>
                            </div>
                            <div class="counter">
                                {!! trans("dashboard.profile.skill.selected" , ["attribute" => $CountSkill] ) !!}
                            </div>
                            <form id="_profile" class="body" method="POST" action="{{ route("user.profile.skill.store") }}">
                                @csrf
                                <ul class="list position-relative">
                                    @foreach($skills as $skill)
                                        <li>
                                            <input type="checkbox" name="skill[]" multiple checked value="{{ $skill->id }}" >
                                            <label for="skills___{{ $skill->id }}">
                                                {{ $skill->name }}
                                            </label>
                                        </li>
                                    @endforeach
                                </ul>
                                <div class="m-2">
                                    <button class="btn btn-block btn-default rounded-0 p-1">
                                        {{ trans("dashboard.profile.skill.submit") }}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
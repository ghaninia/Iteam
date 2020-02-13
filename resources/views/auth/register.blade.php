@extends("dashboard.layouts.master")
@section("main")
    <div class="fixed-background" id="_particle"></div>
    <main>
        <div class="container">
            <div class="row h-100">
                <div class="col-12 col-md-10 mx-auto my-auto">
                    <div class="card auth-card">

                        <div class="form-side">
                            <h6 class="mb-4">{{ isset($information['title']) ? $information['title'] : options('title')  }}</h6>
                            <form id="_auth" data-type="register" action="{{ route('register') }}" method="POST"></form>
                        </div>

                        <div class="position-relative image-side">

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </main>
@stop
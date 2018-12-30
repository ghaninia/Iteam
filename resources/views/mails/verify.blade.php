@extends("layouts.mail")
@section("content")
    <table class="main" width="100%" cellpadding="0" cellspacing="0">
        <tr>
            <td class="alert alert-good">{{ trans("dash.message.success.register.mail.title") }}</td>
        </tr>
        <tr>
            <td class="content-wrap">
                <table width="100%" cellpadding="0" cellspacing="0">
                    <tr>
                        <td class="content-block">{{ trans("dash.message.success.register.mail.desc") }}</td>
                    </tr>
                    <tr>
                        <td class="content-block">
                            <a href="{{ $token }}" class="btn-primary">{{ trans("dash.message.success.register.mail.link") }}</a>
                        </td>
                    </tr>
                    <tr>
                        <td class="content-block"></td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
@stop
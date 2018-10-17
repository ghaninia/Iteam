<!DOCTYPE html>
<html>
    <body style="direction:rtl;text-align:center;font-family: IRANSans , Tahoma;background-color: #222533; padding: 20px; font-family: font-size: 12px; line-height: 1.43">
    <div style="max-width: 600px; margin: 0px auto; background-color: #fff; box-shadow: 0px 20px 50px rgba(0,0,0,0.05);">
        <table style="width: 100%;">
            <tr>
                <td style="background-color: #fff;">
                    <img alt="" src="{{ trans('timo.information.logo') }}" style="width: 70px; padding: 20px">
                </td>
                <td style="padding-left: 50px; text-align:left; padding-right: 20px">
                    <a href="{{ route('login') }}" style="color: #0069CC; text-decoration: underline;text-decoration: none; font-size:10px">
                        {{ trans('auth.login.text') }}
                    </a>
                    <a href="{{ route('password.request') }}" style="color: #0069CC;margin-right: 20px;text-decoration: none; font-size:10px">
                        {{ trans('auth.reset.text') }}
                    </a>
                </td>
            </tr>
        </table>
        <div style="padding:20px; border-top: 1px solid rgba(0,0,0,0.05);text-align:right;">
            @yield("main")
        </div>
        <div style="background-color: #F5F5F5; padding: 20px; text-align: center;">
            @php( $socials = config('timo.information.socials' , [] ) )
            <div style="margin-bottom: 20px;">
                @foreach($socials as $social => $url)
                    @if( !! $url )
                        <a href="{{ $url }}" style="display: inline-block; margin: 0px 10px;">
                            <img alt="" src="{{ asset("assets/img/social-icons/{$social}.png") }}" style="width: 28px;">
                        </a>
                    @endif
                @endforeach
            </div>

            <div style="margin-bottom: 20px;">
                <a href="{{ route("site.contactus") }}" style="text-decoration: none; font-size: 10px; margin: 0px 15px; color: #261D1D;">
                    {{ trans("dash.page.contactus.text") }}
                </a>
                <a href="{{ route("site.privacy") }}" style="text-decoration: none; font-size: 10px; margin: 0px 15px; color: #261D1D;">
                    {{ trans("dash.page.privacy.text") }}
                </a>
            </div>

            <div style="margin-top: 20px; padding-top: 20px; border-top: 1px solid rgba(0,0,0,0.05);">
                <div style="color: #A5A5A5; font-size: 10px;">{!! config("timo.information.copyright") !!}</div>
            </div>
        </div>
    </div>
    </body>
</html>
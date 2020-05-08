<?php
namespace App\Http\Controllers\Dashboard\User;

use App\Models\Tag;
use App\Models\Team ;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Notifications\Notifiable;
use App\Http\Requests\TeamStore ;
use Illuminate\Support\Str ;

class TeamController extends Controller
{
    use Notifiable ;
    public function __construct()
    {
        // $this->middleware("create.team" , ["only" => "store"]);
    }

    public function index(Request $request)
    {
        $information = [
            'title' => trans("dashboard.pages.team.create")
        ] ;

        return view('dashboard.user.team.index' , compact(
            'information'
        ));
    }

    public function create(Request $request)
    {
        $information = [
            'title' => trans("dashboard.pages.team.create") ,
        ] ;
        $user = me() ;
        $tags = Tag::withCount("skills")->orderBy("name" , "ASC")->get() ;
        return view('dashboard.user.team.create' , compact('information' , "user" , "tags") ) ;
    }

    public function store(TeamStore $request)
    {
        $day = (Carbon::now())->subDay( me()->planUser->plan_user_id ) ;
        $team = Team::create([
            "user_id"       => me()->id ,
            "plan_user_id"       => me()->plan_user_id ,
            "expired_at"    => $day ,

            "name"          => $request->input("name") ,
            "excerpt"       => $request->input("excerpt") ,

            "province_id"   => $request->input("provinces") ,
            "city_id"       => $request->input("cities") ,
            "address"       => $request->input("address") ,

            "phone"         => $request->input("phone") ,
            "fax"           => $request->input("fax") ,
            "mobile"        => $request->input("mobile") ,
            "website"       => $request->input("website"),

            "count_member"      => $request->input("count_member") ,
            "required_gender"   => $request->input("required_gender") ,

            "type_assists"      => $request->input("type_assists") ,
            "interplay_fiscals" => $request->input("interplay_fiscals") ,

            "salary_min"    => $request->input("salary_min") ,
            "salary_max"    => $request->input("salary_min") ,
            "slug"          => Str::random(10)
        ]);
        $team->tags()->attach( $request->input("tags") ) ;
        return response()->json([
            "ok" => true ,
            "msg" => trans("dashboard.message.success.team.create")
        ]) ;
    }

    public function show(Team $team ,Request $request)
    {
        
    }

    public function edit(Team $team ,Request $request)
    {
        $information = [
            "title" => trans("dashboard.pages.team.edit.text")
        ] ;
        return view("dashboard.user.team.edit" , compact("team","information")) ;
    }

    public function update(Request $request, $id)
    {
    }
}

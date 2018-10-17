<?php
namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\TeamStore;
use App\Models\City;
use App\Models\Offer;
use App\Models\Province;
use App\Models\Tag;
use App\Models\Team;
use App\Models\User;
use App\Repositories\OfferRepository;
use Faker\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class TeamController extends Controller
{

    public function __construct()
    {
        $this->middleware("can:show,team" , ['except' => ['index' , 'create' , 'store'] ]) ;
    }

    public function index(Request $request)
    {

        $status = $request->input("state") ;
        $create_time = $request->input("create_time") ;
        $teams = Team::where( "user_id" , me()->id )
            // filter status
            ->when($status , function ($query) use ($status){
                switch ($status)
                {
                    case "init" :
                        $query->where( "status" , 0 ) ;
                        break ;
                    case "confirmed" :
                        $query->where( "status" , 1 ) ;
                        break ;
                    case "expired" :
                        $query->where( "status" , 2 ) ;
                        break ;
                }
            })
            // filter created at
            ->when($create_time , function ($query) use ($create_time){
                $query->where( userSearchRangeTime(false , "create_time") ) ;
            })
            ->withCount("offers")
            ->with("offers.user" , "plan")
            ->paginate( 3 );

        $appends = $request->all() ;
        $view = view( "dash.user.team.ajax.index" , compact('teams' , 'appends') )->render() ;

        if ( $request->ajax() )
            return $view ;

        $visits =
        User::select([
            DB::raw("teams.name AS team_name") ,
            DB::raw('visits.created_at AS visit_created_at') ,
            'users.*' ,
        ])
        ->leftJoin("visits" , "visits.user_id" , "=" , "users.id" )
        ->leftJoin("teams"  , "visits.team_id" , "=" , "teams.id" )
        ->where("teams.user_id" , me()->id ) ;

        $visits_count = $visits->count()  ;
        $visits = $visits->take(5)->get() ;

        $offers_count = Offer::join("teams" , "offers.team_id" , "=" , "teams.id")
        ->where("teams.user_id" , me()->id )
        ->count() ;

        $teams_count = me()->teams()->count() ;

        $information = [
            'title' => trans("dash.team.all.text")
        ] ;


        return view('dash.user.team.index' , compact(
            'information' ,
            'teams' ,
            'view',
            'appends' ,
            'visits' ,
            'visits_count' ,
            'offers_count' ,
            'teams_count'
        ));
    }

    public function create()
    {
        return
        User::canAddTeam() ;

        $information = [
            'title' => trans('dash.team.make') ,
            'breadcrumb' => [
                trans('dash.team.all.text') => route('user.team.index') ,
                trans('dash.team.make') => null
            ]
        ] ;

        $provinces = Province::select(['id','name'])->get() ;
        $cities = collect() ;

        $tags = Tag::orphan()->get() ;

        return view('dash.user.team.create' , compact('information','provinces','cities' ,'tags') ) ;

    }

    public function store(TeamStore $request)
    {
        $validate = Validator::make($request->all());
        $validate->after(function ($v){

        }) ;

        $team =
        Team::userCreate([
            'phone'    => $request->input('phone') ,
            'slug'     => time() ,
            'fax'      => $request->input('fax') ,
            'mobile'   => $request->input('mobile') ,
            'email'    => $request->input('email') ,
            'website'  => $request->input('website') ,
            'excerpt'  => strip_tags($request->input('excerpt')) ,
            'content'  => htmlspecialchars($request->input('content')) ,
            'address'  => $request->input('address') ,
            'required_gender' => $request->input('required_gender') ,
            'count_member' => $request->input('count_member') ,
            'type_assist' => $request->input('type_assist') ,
            'interplay_fiscal' => $request->input('interplay_fiscal') ,
            'min_salary' => changeCurrency($request->input('min_salary') , 'rial') ,
            'max_salary' => changeCurrency($request->input('max_salary') , 'rial') ,
            'province_id' => $request->input('province_id') ,
            'city_id' => $request->input('city_id') ,
        ]);

        $team->skills()->attach($request->input('skills' , [])) ;
        $tags = [] ;
        if ($request->has('tag'))
            $tags[] = $request->input('tag') ;
        if ($request->input('child_tag'))
            $tags[] = $request->input('child_tag') ;
        $team->tags()->attach( $tags ) ;

        return redirect()
            ->route("user.team.show" , $team->slug )
            ->with([
                'message' => trans("dash.panel.messages.success.team.create") ,
                'status'  => true
            ]);
    }

    public function show(Team $team ,Request $request)
    {

        $team = $team->load("offers" , "visits" , "user" , 'plan' , 'tags' ,'skills') ;

        $information = [
            'title' => trans("dash.team.show.title" , ['attribute' => $team->name ]) ,
            'desc'  => str_slice($team->excerpt , 30) ?? str_slice(strip_tags($team->content) , 30 ) ,
            'breadcrumb' => [
                trans("dash.team.all.text") => route("user.team.index") ,
                trans("dash.team.show.title" , ['attribute' => $team->name ]) => route("user.team.show" , $team->slug )
            ]
        ] ;

        $search    = $request->input("s") ;
        $offersObj = new OfferRepository() ;
        $offers    = $offersObj::paginate($team , 4 , $search );
        $appends   = $offersObj->appends() ;
        $view = view( 'dash.user.team.ajax.show' , compact('offers') )->render();

        if ( isset($appends['more']) )
            $appends = sprintf("<a href='?%s'><span>%s</span></a>" ,
                            http_build_query($appends) ,
                            trans('dash.team.show.loadmore')) ;
        else
            $appends = null ;

        if ($request->ajax())
            return [
                'content' => $view ,
                'appends' => $appends
            ] ;

        return view("dash.user.team.show" , compact('team' , 'information' , 'view' , 'appends') );
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function offer(Team $team ,Offer $offer)
    {

    }
}

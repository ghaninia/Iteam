<?php
namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use App\Models\Offer;
use App\Models\Team;
use App\Models\User;
use App\Repositories\OfferRepository;
use Faker\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TeamController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:isMyTeam,App\Models\Post' , [
            'except' => [
                'index','create','store','show'
            ]
        ]);
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

        //event( new VisitorEvent($team) ) ;

        $information = [
            'title' => trans('dash.team.make') ,
            'breadcrumb' => [
                trans('dash.team.make') => null
            ]
        ] ;

        $faker = Factory::create() ;
        Team::userCreate([
            'name' => $faker->realText(35) ,
            'content' => $faker->realText(200) ,
            'excerpt' => $faker->realText(100) ,
            'slug' => $faker->slug()
        ]) ;

        return view('dash.user.team.create' , compact('information') ) ;

    }

    public function store(Request $request)
    {

    }

    public function show(Team $team ,Request $request)
    {


        $team = $team->load("offers" , "visits" , "user" , 'plan' , 'tags' ,'skills') ;
        $information = [
            'title' => trans("dash.team.show.title" , ['attribute' => $team->name ]) ,
            'desc'  => str_slice($team->excerpt , 30) ?? str_slice(strip_tags($team->content) , 30 ) ,
            'breadcrumb' => [
                trans("dash.team.all.text") => route("user.team.index") ,
                trans("dash.team.show.title" , ['attribute' => $team->name ]) => null
            ]
        ] ;

        $offersObj = new OfferRepository() ;
        $offers    = $offersObj::paginate($team , 4);
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

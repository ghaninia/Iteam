<?php
namespace App\Http\Controllers\User;
use App\Events\VisitorEvent;
use App\Http\Controllers\Controller;
use App\Models\Team;
use App\Models\User;
use App\Models\Visit;
use Faker\Factory;
use Illuminate\Http\Request;

class TeamController extends Controller
{

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
            ->when("create_time" , function ($query) use ($create_time){
                $query->where( userSearchRangeTime(false) ) ;
            })
            ->withCount("offers")
            ->with("offers.user" , "plan")
            ->paginate( config("timo.paginate") ) ;

        $appends = $request->all() ;
        $view = view( "dash.user.team.ajax.index" , compact('teams' , 'appends') )->render() ;

        if ( $request->ajax() )
            return $view ;


        return me()->visitis->groupBy("user_id","team_id") ;

        // $visitis = [] ;


        return view('dash.user.team.index' , compact('teams' , 'view', 'appends' , 'visitis') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
            'name' => $faker->domainName ,
            'content' => $faker->realText("100") ,
            'excerpt' => $faker->realText("50")
        ]) ;

        return view('dash.user.team.create' , compact('information') ) ;

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

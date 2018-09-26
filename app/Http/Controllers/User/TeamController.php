<?php
namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use App\Models\Tag;
use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{

    public function index(Request $request)
    {

        if ($request->ajax())
            return $request->input("state") ;

        $status = $request->input("expired") ;
        $create_time = $request->input("create_time") ;

        $teams = Team::where( "user_id" , me()->id )
            // filter status
            ->when($status , function ($query) use ($status){
                switch ($status)
                {
                    case "init" :
                        $query->where( "status" , 0 ) ;
                    case "confirmed" :
                        $query->where( "status" , 1 ) ;
                        break ;
                    case "expired" :
                        $query->where( "status" , 2 ) ;
                    default :
                        break ;
                }
            })
            // filter created at
            ->when("create_time" , function ($query) use ($create_time){

            })
            ->paginate(10);

        return view('dash.user.team.index' , compact('teams') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $information = [
            'title' => trans('dash.team.make') ,
            'breadcrumb' => [
                trans('dash.team.make') => null
            ]
        ] ;

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

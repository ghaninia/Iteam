<?php
namespace App\Http\Controllers\Dashboard\User;

use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Notifications\Notifiable;

class TeamController extends Controller
{
    use Notifiable ;
    public function __construct()
    {
//        $this->middleware("can:show,team" , ['except' => ['index' , 'create' , 'store'] ]) ;
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
        $validate = Validator::make($request->all() , []);
        $validate->after(function ($validate){
            if (false) //!User::canAddTeam()
                $validate->errors()->add( "add_team_fail" , trans("dashboard.messages.error.add_team_fail") ) ;
        })->validate() ;

        $team =
        Team::userCreate([
            'name'     => $request->input('name') ,
            'phone'    => $request->input('phone') ,
            'fax'      => $request->input('fax') ,
            'mobile'   => $request->input('mobile') ,
            'email'    => $request->input('email') ,
            'website'  => $request->input('website') ,
            'excerpt'  => strip_tags($request->input('excerpt')) ,
            'content'  => htmlspecialchars($request->input('content')) ,
            'address'  => $request->input('address') ,
            'required_gender' => json_encode( $request->input('required_gender') ) ,
            'count_member' => $request->input('count_member') ,
            'type_assist' => json_encode( $request->input('type_assist') ) ,
            'interplay_fiscal' => $request->input('interplay_fiscal') ,
            'min_salary' => changeCurrency($request->input('min_salary') , 'rial') ,
            'max_salary' => changeCurrency($request->input('max_salary') , 'rial') ,
            'province_id' => $request->input('province_id') ,
            'city_id' => $request->input('city_id') ,
        ]);

        $team->skills()->attach( $request->input('skills') ) ;

        $tags = [] ;
        if ($request->has('tag')) $tags[] = $request->input('tag') ;
        if ($request->input('child_tag')) $tags[] = $request->input('child_tag') ;

        $team->tags()->attach( $tags ) ;

        if ( $request->ajax() )
            return response()->json([
                'message' => trans("dashboard.panel.messages.success.team.create") ,
                'status'  => true ,
                'url'     => route("user.team.show" , $team->slug )
            ]);
        else
            return redirect()
                ->route("user.team.show" , $team->slug )
                ->with([
                    'message' => trans("dashboard.panel.messages.success.team.create") ,
                    'status'  => true ,
                ]);
    }

    public function show(Team $team ,Request $request)
    {

        $team = $team->load("offers" , "visits" , "user" , 'plan' , 'tags' ,'skills') ;
        $information = [
            'title' => trans("dashboard.team.show.title" , ['attribute' => $team->name ]) ,
            'desc'  => str_slice($team->excerpt , 30) ?? str_slice(strip_tags($team->content) , 30 ) ,
            'breadcrumb' => [
                trans("dashboard.team.all.text") => route("user.team.index") ,
                trans("dashboard.team.show.title" , ['attribute' => $team->name ]) => route("user.team.show" , $team->slug )
            ]
        ] ;

        $search    = $request->input("s") ;
        $offersObj = new OfferRepository() ;
        $offers    = $offersObj::paginate($team , 4 , $search );
        $appends   = $offersObj->appends() ;
        $view = view( 'dashboard.user.team.ajax.show' , compact('offers') )->render();

        if ( isset($appends['more']) )
            $appends = sprintf("<a href='?%s'><span>%s</span></a>" ,
                            http_build_query($appends) ,
                            trans('dashboard.team.show.loadmore')) ;
        else
            $appends = null ;

        if ($request->ajax())
            return [
                'content' => $view ,
                'appends' => $appends
            ] ;

        $genders = array_map(function($v){
            return trans("dashboard.genders.{$v}") ;
        } ,  $team->required_gender  );

        $typeAssists = array_map(function($v){
            return trans("dashboard.type_assists.{$v}") ;
        } ,  $team->type_assist  );
        $acceptedOffers = $team->offers()->accepted()->get() ;
        $notAcceptedOffers = $team->offers()->notAccepted()->get() ;

        return view("dashboard.user.team.show" , compact( 'genders' , 'notAcceptedOffers' ,'acceptedOffers' , 'typeAssists' , 'team' , 'information' , 'view' , 'appends') );
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
        $offer->load("user") ;
        $information = [
            'title' => trans("dashboard.team.show.title" , ['attribute' => $team->name ]) ,
            'desc'  => str_slice($team->excerpt , 30) ?? str_slice(strip_tags($team->content) , 30 ) ,
            'breadcrumb' => [
                trans("dashboard.team.show.title" , ['attribute' => $team->name ]) => route("user.team.show" , $team->slug ) ,
                trans("dashboard.team.offers.show.title" , ['attributes' => $offer->user->fullname ]) => null
            ]
        ] ;

        return view("dashboard.user.offer.show" , compact( "information" ,"offer" , "team") );
    }

    public function rejectOffer(Team $team , Offer $offer)
    {
        $offer = $team->offers()->where("id" , $offer->id )->first() ;
        $result = $offer->update([
            'status' => 2
        ]) ;
        return response()->json([
            'ok'  => true ,
            'msg' => trans("dashboard.messages.success.team.offer.rejected")
        ]);
    }

    public function acceptOffer(Team $team , Offer $offer , Request $request)
    {
        $offer = $team->offers()->where("id" , $offer->id )->first() ;
        $offer->update([
            'status' => 1
        ]) ;
        $user = $offer->user ;
        event( new AcceptOfferEvent( $user , $team , $offer ) ) ;

        return response()->json([
            'ok'  => true ,
            'msg' => trans("dashboard.messages.success.team.offer.accepted")
        ]);
    }

}

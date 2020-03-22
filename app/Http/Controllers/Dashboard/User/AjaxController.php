<?php

namespace App\Http\Controllers\Dashboard\User;
use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\Skill;
use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request ;
use Illuminate\Validation\Rule;

class AjaxController extends Controller
{

    public function ajaxHandle(Request $request)
    {
        $func = camel_case($request->input("action" , '')) ;
        if (method_exists($this , $func ))
            return $this->$func($request) ;
        return null ;
    }

    public function mainTeam( Request $request )
    {
        $teams = $request
            ->user()
            ->teams()
            ->orderBy("created_at" , "desc")
            ->get() ;

        $items = [] ;
        $teams->each(function ($team) use (&$items){
            $items[] = [
                "name" => $team->name ,
                "link"  => route("user.team.show" , $team->slug ) ,
                "excerpt" => $team->excerpt ,
                "created_at" => verta($team->created_at)
            ];
        });
        return $items ;
    }

    public function checkUserExists(Request $request)
    {
        $this->validate($request , [
            "column" => "required|in:mobile,email,username" ,
            "value" => [
                "required" , Rule::unique("users" , \request("column" , "username") )->ignore( me() )
            ]
        ]) ;

        return response()->json([
            "ok" => true
        ]) ;

    }

    public function totalTeam(Request $request)
    {
        $this->validate($request , [
            "skill"   =>   ["required" , "array"] ,
            "skill.*" => ["required" , Rule::in(Skill::pluck("id")->toArray()) ] ,
        ]);
        $skills = $request->input("skill" , []) ;
        return response()->json([
            "ok"    => true ,
            "count" => Team::whereHas("skills" , function ($query) use ($skills) {
                return $query->whereIn("skillables.skill_id" , $skills );
            })->count()
        ]) ;
    }

    public function payments(Request $request)
    {

        $r_status       = $request->input("status") ;
        $r_trackingCode =  $request->input("tracking_code") ;
        $r_created_at_begin = toDataTime($request->input("created_at_begin") );
        $r_created_at_end   = toDataTime($request->input("created_at_end") );
        $r_total   = $request->input("total" , config("timo.paginate") ) ;
        $r_orderBy = $request->input("orderBy" , "created_at") ;
        $r_order   = $request->input("order" , "DESC") ;

        $user = me() ;

        $payments = Payment::select([
            "payments.id" ,
            "payments.ref_id" ,
            "payments.tracking_code" ,
            "payments.transaction_id" ,
            "payments.status" ,
            "payments.created_at" ,
            "plans.name" ,
            "transactions.price"
        ])
            ->rightJoin("plans" ,"payments.plan_id" , "=" , "plans.id" )
            ->rightJoin("transactions" ,"payments.ref_id" , "=" , "transactions.ref_id" )
            ->where("user_id" , $user->id )->when( $r_status , function ($query) use ($r_status){
                return $query->whereIn("payments.status" , $r_status ) ;
            })->when( $r_trackingCode , function ( $query ) use ($r_trackingCode){
                return $query->where("payments.tracking_code" , $r_trackingCode ) ;
            })->when( $r_created_at_begin , function ( $query ) use ($r_created_at_begin){
                return $query->where("payments.created_at" , ">=" , $r_created_at_begin ) ;
            })->when( $r_created_at_end , function ( $query ) use ($r_created_at_end) {
                return $query->where("payments.created_at" , "<=" , $r_created_at_end ) ;
            })->orderBy( $r_orderBy , $r_order )->paginate( $r_total );


        $payments->map(function ($payment){
            $payment->status_en  = $payment->status ;
            $payment->status     = statusTransaction( $payment->status ) ;
            $payment->clock      = verta($payment->created_at)->format("h:i a") ;
            $payment->date       = verta($payment->created_at)->format("y/m/d") ;
            $payment->link       = route("user.payment.show" , $payment->id ) ;
            $payment->price      = currency($payment->price , true ) ;
        });


        return response()->json([
            "ok" => true ,
            "items" => $payments->total() ? $payments->items() : trans("dashboard.message.success.payment.empty") ,
            "paginate" => view("dashboard.layouts.ajax.paginate" , ["items" => $payments])->render() ,
            "total" => $payments->total()
        ]);

    }

}

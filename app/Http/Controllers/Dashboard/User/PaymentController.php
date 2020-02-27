<?php
namespace App\Http\Controllers\Dashboard\User;
use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\Plan;
use Illuminate\Http\Request ;
use Larabookir\Gateway\Enum;

class PaymentController extends Controller
{

    public function index(Request $request)
    {

        $information = [
            'title' => trans('dashboard.pages.payment.factor') ,
            'breadcrumb' => [
                trans('dashboard.pages.payment.factor') => null
            ]
        ] ;
//        $r_status       = $request->input("status") ;
//        $r_trackingCode =  $request->input("tracking_code") ;
//        $r_created_at_begin = toDataTime($request->input("created_at_begin") );
//        $r_created_at_end   = toDataTime($request->input("created_at_end") );
//        $r_total   = $request->input("total" , options("timo.paginate") ) ;
//        $r_orderBy = $request->input("orderBy" , "created_at") ;
//        $r_order   = $request->input("order" , "DESC") ;
//
//        $user = me() ;

//        $payments = Payment::select([
//            "payments.id" ,
//            "payments.ref_id" ,
//            "payments.tracking_code" ,
//            "payments.transaction_id" ,
//            "payments.status" ,
//            "payments.created_at" ,
//            "plans.name" ,
//            "transactions.price"
//        ])
//        ->rightJoin("plans" ,"payments.plan_id" , "=" , "plans.id" )
//        ->rightJoin("transactions" ,"payments.ref_id" , "=" , "transactions.ref_id" )
//        ->where("user_id" , $user->id )->when( $r_status , function ($query) use ($r_status){
//            return $query->whereIn("status" , $r_status ) ;
//        })->when( $r_trackingCode , function ( $query ) use ($r_trackingCode){
//            return $query->where("tracking_code" , $r_trackingCode ) ;
//        })->when( $r_created_at_begin , function ( $query ) use ($r_created_at_begin){
//            return $query->where("created_at" , ">=" , $r_created_at_begin ) ;
//        })->when( $r_created_at_end , function ( $query ) use ($r_created_at_end) {
//            return $query->where("created_at" , "<=" , $r_created_at_end ) ;
//        })->orderBy( $r_orderBy , $r_order )->paginate( $r_total );
//
//        $payments->map(function ($payment){
//            $payment->status     = statusTransaction( $payment->status ) ;
//            $payment->clock      = verta($payment->created_at)->format("h:i a") ;
//            $payment->date       = verta($payment->created_at)->format("y/m/d") ;
//            $payment->link       = route("user.payment.show" , $payment->id ) ;
//            $payment->price      = currency($payment->price , true ) ;
//        });

//        return $payments ;

        return view('dashboard.user.payment.index' , compact('information') ) ;
    }

    public function show(Request $request , Payment $payment )
    {

        $this->authorize("payment" , $payment ) ;

        $payment = $payment->load("plan") ;

        $information = [
            'title' => trans('dashboard.pages.payment.label')
        ] ;

        return view('dashboard.user.payment.show' , compact('information' , 'payment') ) ;
    }
}

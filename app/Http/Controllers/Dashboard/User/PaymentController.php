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

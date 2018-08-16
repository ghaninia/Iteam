<?php
namespace App\Http\Controllers\User;
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
            'title' => trans('dash.sidebar.payments') ,
            'breadcrumb' => [
                trans('dash.sidebar.payments') => null
            ]
        ] ;

        $payments_log = [
            'all'     => me()
                            ->payments
                            ->whereIn('status',[Enum::TRANSACTION_SUCCEED , Enum::TRANSACTION_FAILED])
                            ->load('transaction')
                            ->sum('transaction.price') ,
            'success' => me()
                            ->payments
                            ->where('status',Enum::TRANSACTION_SUCCEED)
                            ->load('transaction')
                            ->sum('transaction.price') ,
            'failed' => me()
                            ->payments
                            ->where('status',Enum::TRANSACTION_FAILED)
                            ->load('transaction')
                            ->sum('transaction.price')
        ];

        $payments = me()->load('payments.transaction')->payments->sortByDesc('created_at');

        return view('dash.user.payment.index' , compact('information' , 'payments_log' , 'payments') ) ;
    }

    public function show(Request $request , Payment $payment )
    {

        $information = [
            'title' => trans('dash.payment.show_factor' , [ 'attribute' => $payment->tracking_code ] ) ,
            'breadcrumb' => [
                trans('dash.sidebar.payments') => route('user.payment.index') ,
                trans('dash.payment.show_factor' , [ 'attribute' => $payment->tracking_code ] ) => null
            ]
        ] ;

        return view('dash.user.payment.show' , compact('information' , 'payment') ) ;
    }
}

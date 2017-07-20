<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use DB;

class DashboardController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            view()->share('user', Auth::user());
            return $next($request);
        });
    }

    public function index(){
        $user = Auth::user();
        $coop_id = DB::table('cardholder')->where('user_id',$user->uid)->pluck('coop_uid')->first();
        $coop_meta = DB::table('coop_meta')->where('coop_uid',$coop_id)->get()->all();
        $coop_meta_new = [];
        foreach($coop_meta as $i){
            $coop_meta_new[$i->meta_key] = in_array($i->meta_key, ['interest_rate','credit_interest_rate'])?floatval($i->meta_value):$i->meta_value;
        }
        $coop_meta = (object)$coop_meta_new;
        $transactions = DB::table('transaction')
            ->leftJoin('cardholder','transaction.cardholder_id','cardholder.uid')
            ->leftJoin('merchant','transaction.merchant_id','merchant.uid')
            ->where('cardholder.user_id',$user->uid)
            ->where('cardholder.coop_uid',$coop_id)
        ->get()->all();
        return view("Client.Dashboard.index",compact('transactions','coop_meta'));
    }

    public function profile(){
        return view("Client.Dashboard.profile");
    }
    public function requestCollector(){
        return view("Client.Dashboard.requestCollector");
    }
}

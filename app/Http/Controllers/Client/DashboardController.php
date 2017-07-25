<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use DB;
use Flash;

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
        $coop_id = DB::table('cardholder')->where('user_id',$user->uid)->pluck('branch_id')->first();
        $coop_meta = DB::table('coop_meta')->where('coop_branch_uid',$coop_id)->get()->all();
        $coop_meta_new = [];
        foreach($coop_meta as $i){
            $coop_meta_new[$i->meta_key] = in_array($i->meta_key, ['interest_rate','credit_interest_rate'])?floatval($i->meta_value):$i->meta_value;
        }
        $coop_meta = (object)$coop_meta_new;
        $day = intval(date('d'));
        $due_date = date('Y-m-d');
        if($day >= 6 && $day <= 20)
            $due_date = date('Y').'-'.date('m').'-20';
        else
            $due_date = date('Y', strtotime('+1 month')).'-'.date('m', strtotime('+1 month')).'-05';
        $dues = DB::table('due')->where('user_id',$user->uid)->whereRaw("UNIX_TIMESTAMP(due_date) >= UNIX_TIMESTAMP('".date('Y-m-d')."')")->pluck('amount')->first();
        $transactions = null;
        if($dues){
            $dues = $dues + ($dues * $coop_meta->interest_rate) + ($dues * $coop_meta->credit_interest_rate);
            $dues = number_format($dues, 2, '.', ',');
            $transactions = DB::table('transaction')
                ->leftJoin('cardholder','transaction.cardholder_id','cardholder.uid')
                ->leftJoin('merchant','transaction.merchant_id','merchant.uid')
                ->where('cardholder.user_id','=',$user->uid)
                ->where('cardholder.branch_id','=',$coop_id)
                ->whereRaw("UNIX_TIMESTAMP(transaction.trans_timestamp) < UNIX_TIMESTAMP('".$due_date."')")
            ->get()->all();
        }
        $dues = $dues==null?'0.00':$dues;
        return view("Client.Dashboard.index",compact('transactions','coop_meta','dues'));
    }

    public function profile(){
        return view("Client.Dashboard.profile");
    }
    public function requestCollector(){
        return view("Client.Dashboard.requestCollector");
    }
    public function simulator(){
        $merchants = DB::table('merchant')->select('uid','name')->get()->all();
        $cardholders = DB::table('cardholder')->leftJoin('user','cardholder.user_id','user.uid')->where('user_type',7)->select('user.first_name','user.last_name','cardholder.uid')->get()->all();
        return view("Client.Dashboard.transactionSimulator",compact('merchants','cardholders'));
    }

    public function simulatorAdd(Request $request){
        $data = $request->all();
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $code = "";
        foreach(range(0,7) as $i){
            $code .= $characters[rand(0,strlen($characters)-1)];
        }
        $code .= '-';
        foreach(range(0,2) as $i){
            $code .= $characters[rand(0,strlen($characters)-1)];
        }
        $data['transaction_date'] = date('Y-m-d H:i:s', strtotime($data['transaction_date']));
        $new_data = ['transaction_code'=>$code, 'cardholder_id'=>$data['cardholder'], 'merchant_id'=>$data['merchant'], 'transaction_type_id'=>'1', 'amount'=>$data['amount'], 'trans_timestamp'=>$data['transaction_date']];
        DB::table('transaction')->insert($new_data);
        $user_id = DB::table('cardholder')->where('uid',$data['cardholder'])->pluck('user_id')->first();
        $day = intval(date('d', strtotime($data['transaction_date'])));
        if($day >= 6 && $day <= 20){
            $due_date = date('Y').'-'.date('m').'-20';
            $due = DB::table('due')
                ->whereRaw("UNIX_TIMESTAMP(due_date) = UNIX_TIMESTAMP('".$due_date."')")
                ->where('user_id','=',$user_id)
                ->get()->first();
            if($due && count($due) > 0){
                $due_amount = intval($due->amount)+intval($data['amount']);
                $new_data = ['user_id'=>$user_id, 'amount'=>$due_amount, 'last_modified'=>date('Y-m-d H:i:s', strtotime($data['transaction_date']))];//date('Y-m-d H:i:s')];
                DB::table('due')->whereRaw("UNIX_TIMESTAMP(due_date) = UNIX_TIMESTAMP('".$due_date."')")->update($new_data);
            }else{
                $new_data = ['user_id'=>$user_id, 'amount'=>$data['amount'], 'due_date'=>$due_date, 'last_modified'=>date('Y-m-d H:i:s', strtotime($data['transaction_date']))];//=>date('Y-m-d H:i:s')];
                DB::table('due')->insert($new_data);
            }
        }else{
            $due_date = date('Y', strtotime('+1 month')).'-'.date('m', strtotime('+1 month')).'-05';
            $due = DB::table('due')
                ->whereRaw("UNIX_TIMESTAMP(due_date) = UNIX_TIMESTAMP('".$due_date."')")
                ->where('user_id','=',$user_id)
                ->get()->first();
            if($due && count($due) > 0){
                $due_amount = intval($due->amount)+intval($data['amount']);
                $new_data = ['user_id'=>$user_id, 'amount'=>$due_amount, 'last_modified'=>date('Y-m-d H:i:s', strtotime($data['transaction_date']))];//=>date('Y-m-d H:i:s')];
                DB::table('due')->whereRaw("UNIX_TIMESTAMP(due_date) = UNIX_TIMESTAMP('".$due_date."')")->update($new_data);
            }else{
                $new_data = ['user_id'=>$user_id, 'amount'=>$data['amount'], 'due_date'=>$due_date, 'last_modified'=>date('Y-m-d H:i:s', strtotime($data['transaction_date']))];//=>date('Y-m-d H:i:s')];
                DB::table('due')->insert($new_data);
            }
        }
        Flash::success('Added new transaction.');
        return back();
    }
}

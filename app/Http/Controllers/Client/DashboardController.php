<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        return view("Client.Dashboard.index");
    }

    public function profile(){
        return view("Client.Dashboard.profile");
    }
    public function requestCollector(){
        return view("Client.Dashboard.requestCollector");
    }
}

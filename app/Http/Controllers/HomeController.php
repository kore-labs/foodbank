<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('dashboard.new-user-wizard');
    }

    public function profile()
    {
        return view('dashboard.new-user-wizard');
    }

    public function mail()
    {
        return view('dashboard.mail');
    }

    public function billingHistory()
    {
        return view('dashboard.billing-history');
    }

    public function cancelService(){

      return view('dashboard.cancel-service');

    }



}

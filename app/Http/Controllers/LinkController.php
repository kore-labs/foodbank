<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactForm;
use Mail;


class LinkController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    /* Show the signup and store bread crumbs.
    *
    *
    */
    public function getSignupWithLinkId(Request $aRequest, $signupType, $linkId) {
      //store link id
      return view('signup');
    }



    public function getStarted(){

        return view('dashboard.get-started');

    }


    public function contactForm(Request $aRequest){

      //$aRequest->input('email')

      $to_name = "NikkoDutra";
      $to_email = "nikko.novitas@gmail.com";
      $data = array('name'=>'test', 'body' => 'A test mail');

      //Mail::to($to_email)->send(new ContactForm());

      return view('thank-you');

    }

    public function signup(Request $aRequest){

      \Auth::logout();

      return redirect()->route('register');



    }

}

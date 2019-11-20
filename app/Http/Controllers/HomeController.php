<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;

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

    public function profile(Request $aRequest)
    {

        $profileSet = DB::table('account_info')->where('id', auth()->user()->id )->count();
        //dd($profileSet);
        if( $profileSet ){
          return view('dashboard.user-profile');
        }else{
          return view('dashboard.new-user-wizard');
        }


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


    public function businessInfo(Request $aRequest){

      $accountInfo = [
                      "business_name"=>$aRequest->input('business-name'),
                      "business_address"=>$aRequest->input('address'),
                      "city"=>$aRequest->input('city'),
                      "state"=>$aRequest->input('state'),
                      "zip"=> $aRequest->input('zip'),
                      "phone"=>$aRequest->input('phone'),
                      "contact_name"=> $aRequest->input('fullname'),
                      "id"=>auth()->user()->id
                      ];


      $theAssessment->userExists = false;

      $checkDB = DB::table('account_info')->where('id', auth()->user()->id )->count();
      if( $checkDB ){
          //dd("You already validated your email.");
          $theAssessment->userExists = true;
      }else{
        //dd($accountInfo);
        //Transcribe the account information to a verified_users table
        DB::table('account_info')->insertOrIgnore($accountInfo);
      }

      return view('dashboard.user-profile');


    }


    public function addLocation(Request $aRequest){

      //dd($aRequest->input('time'));
      $id = md5( $aRequest->input('address').auth()->user()->id.$aRequest->input('day').$aRequest->input('time').$aRequest->input('zip').$aRequest->input('business-name') );

      $locationInfo = [
                      "business_name"=>$aRequest->input('business-name'),
                      "business_address"=>$aRequest->input('address'),
                      "city"=>$aRequest->input('city'),
                      "state"=>$aRequest->input('state'),
                      "zip"=> $aRequest->input('zip'),
                      "phone"=>$aRequest->input('phone'),
                      "contact_name"=> $aRequest->input('fullname'),
                      "primaryCollectorId"=>auth()->user()->id,
                      "scheduled_collection_day"=>$aRequest->input('day'),
                      "scheduled_collection_time"=>$aRequest->input('time'),
                      "id"=>$id
                      ];



/*

$table->bigIncrements('id')->unique();

$table->bigInteger('primaryCollectorId')->unique();

$table->bigInteger('previousCollectorId')->unique();

//start-date and end-date,
$table->dateTime('last_collection_date_time');

$table->string('scheduled_collection_day');
$table->time('scheduled_collection_time');


$table->string('contact_name');
$table->string('email')->unique();

$table->string('business_type');
$table->string('business_name');

$table->string('business_address');
$table->string('city');
$table->string('state');

$table->string('phone');
$table->unsignedInteger('zip');

$table->decimal('latitude', 11, 8);
$table->decimal('longitude', 11, 8);

*/





      //Transcribe the account information to a verified_users table
      DB::table('collection_site')->insertOrIgnore($locationInfo);


      return view('dashboard.user-profile');
    }



    public function deleteLocation(Request $aRequest){

      DB::table('collection_site')->where('id', $aRequest->input('id') )->delete();

      return view('dashboard.user-profile');

    }




}

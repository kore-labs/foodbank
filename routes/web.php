<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//Home Page
Route::get('/', function () {
    return view('splash-page');
});

Route::get('/get-started', function () {

    return view('auth.register');
});
//'LinkController@getStarted');

//Wildcard Registration
Route::get('/signup', function () {

    return view('auth.register');
});

//Wildcard Registration
Route::get('{type}/signup', function () {

    return view('auth.register');
})->name('signup');


//Login and Registration
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware(['auth']);

Route::get('/profile', 'HomeController@profile')->name('profile')->middleware(['auth']);

Route::get('/customer-support/mail', 'HomeController@mail')->name('mail')->middleware(['auth']);

Route::get('/customer-support', 'HomeController@mail')->name('mail')->middleware(['auth']);

Route::get('/billing-history', 'HomeController@billingHistory')->name('billing-history')->middleware(['auth']);

Route::get('/customer-support/cancelation', 'HomeController@cancelService')->name('cancel')->middleware(['auth']);



//Developer Tool
Route::get('/ui-dev', function () {
    return view('ui-dev');
});

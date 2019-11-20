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

Route::get('/signin', function () {
    return view('auth.login');
});

Route::get('/signup', function () {
    return view('auth.register');
})->name('signup');



//Contact form logic on splash page
Route::post('/contact/send-mail', 'LinkController@contactForm')->name('contact');

//Profile Setup
Route::post('/business-info/save', 'HomeController@businessInfo');

//Add Location
Route::post('/collection/add-location', 'HomeController@addLocation');

//delete Location
Route::post('/collection/delete', 'HomeController@deleteLocation');

//defer Location
Route::post('/collection/defer', 'HomeController@deferLocation');


//Login and Registration
Auth::routes();

Route::get('/home', 'HomeController@profile')->name('home')->middleware(['auth']);

Route::get('/profile', 'HomeController@profile')->name('profile')->middleware(['auth']);

Route::get('/customer-support/mail', 'HomeController@mail')->name('mail')->middleware(['auth']);

Route::get('/customer-support', 'HomeController@mail')->name('mail')->middleware(['auth']);

Route::get('/billing-history', 'HomeController@billingHistory')->name('billing-history')->middleware(['auth']);

Route::get('/customer-support/cancelation', 'HomeController@cancelService')->name('cancel')->middleware(['auth']);



//Developer Tool
Route::get('/ui-dev', function () {
    return view('ui-dev');
});

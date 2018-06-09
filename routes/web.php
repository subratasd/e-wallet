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


use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');




Route::group(['as'=>'admin.','prefix'=>'admin','namespace'=>'Admin','middleware'=>['auth','admin']], function (){

Route::get('dashboard','DashboardController@index')->name('dashboard');


Route::resource('allusers','AllusersController');


});


Route::group(['as'=>'user.','prefix'=>'user','namespace'=>'User','middleware'=>['auth','user']], function (){



    Route::get('dashboard','DashboardController@index')->name('dashboard');
    Route::resource('sendmoney','TrxController');
    Route::get('money','TrxController@index');
    Route::get('send','DashboardController@send')->name('send');

    //Profile
    Route::resource('profile','profileController');


    //Verify user
    Route::get('email-verify','DashboardController@emailv')->name('emailv');
    Route::get('mobile-verify','DashboardController@mobilev')->name('mobilev');
    Route::get('doc-verify','DashboardController@docv')->name('docv');





});


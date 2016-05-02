<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/



Route::group(['middleware' => 'web'], function () {
    Route::auth();
    //client apis
    //login
    Route::post('/clientin', 'ClientPageController@login');
    Route::post('/checklogin', 'ClientPageController@checklogin');
    Route::get('/checklogin', 'ClientPageController@checklogin');
    Route::post('/clientupdate', 'ClientPageController@clientupdate');
   
    //add project 
    Route::post('/creatproject', 'ClientPageController@creatproject');
    Route::post('/editproject', 'ClientPageController@editproject');
    Route::post('/delproject', 'ClientPageController@delproject');
    Route::post('/projectinfo', 'ClientPageController@getprojectinfo');
    //Route::get('/projectinfo', 'ClientPageController@getprojectinfo');
    Route::post('/projectdetail', 'ClientPageController@getprojectdetail');
  
    //add note to project
    Route::post('/addnote', 'ClientPageController@addnote');
    Route::post('/delnote', 'ClientPageController@delnote');
   // Route::get('/home', 'HomeController@index');
});

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
    Route::post('/clientupdate', 'ClientPageController@clientupdate');
    Route::post('/checklogin', 'ClientPageController@checklogin');
    //Route::get('/checklogin', 'ClientPageController@checklogin');  
  
    //add project 
    Route::post('/projectinfo', 'ClientPageController@getprojectinfo');
    Route::post('/creatproject', 'ClientPageController@creatproject');
    Route::post('/delproject', 'ClientPageController@delproject');
    
    Route::post('/editproject', 'ClientPageController@editproject');
    Route::post('/projectdetail', 'ClientPageController@getprojectdetail');
    //Route::get('/projectinfo', 'ClientPageController@getprojectinfo');
   
    //add note to project
    Route::post('/getnoteinfo', 'ClientPageController@getnoteinfo');
    Route::post('/creatnote', 'ClientPageController@creatnote');
    Route::post('/delnote', 'ClientPageController@delnote');
   
    //add event to user
    Route::post('/geteventinfo', 'ClientPageController@geteventinfo');
    //Route::post('/creatnote', 'ClientPageController@creatnote');
    //Route::post('/delnote', 'ClientPageController@delnote');
  
  
  // Route::get('/home', 'HomeController@index');
});

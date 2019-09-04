<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/recruit', 'recruits_controller@index' , function(){
  return view('recruits');
});
Route::post('/recruit/import', 'recruits_controller@import');

Route::get('/unsubscription', 'unsubscriptions_controller@index', function(){
  return view('unsubscriptions');
});
Route::post('/unsubscription/import', 'unsubscriptions_controller@import');

Route::get('/response', 'responses_controller@index', function(){
  return view('response');
});
Route::post('/response/import', 'responses_controller@import');

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('test1', 'TestController@test1');
Route::get('showNotification', 'TestController@showNotification');


Route::get('test2', function () {
    return view('test');
});

Route::get('newsletter','NewsletterController@create');
Route::post('newsletter','NewsletterController@store');

Route::post('test/{user}','TestController@routeParameterTest');


Route::get('chart', function () {
    return view('chart');
});
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
Route::get('globe', function () {
    return view('globe');
});
Route::get('js_import_test', function () {
    return view('js_import');
});

Route::get('newsletter','NewsletterController@create');
Route::post('newsletter','NewsletterController@store');

Route::post('test/{user}','TestController@routeParameterTest');


Route::get('chart', function () {
    return view('chart');
});

//打印SQL语句测试
Route::get('simgle_sql', 'TestController@simgleSql');		//打印单条SQL语句
Route::get('n_plus_one_sql', 'TestController@nPlusOneSql');	//数据库SQL语句的N+1问题
Route::get('two_sql', 'TestController@twoSql');	//with()预加载解决N+1问题
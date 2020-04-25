<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
use App\Notifications\InvoicePaid;
use App\Http\Requests\TestRequest;

class TestController extends Controller
{
    public function test1(){
    	DB::connection('mongodb')->collection('users')->insert([
    		'name'=>'tom',
    		'age'=>12,
    	]);
    	$res = DB::collection('users')->get();
    	dd($res);
    }
    public function showNotification(){
    	$user = User::find(1);
    	$user->notify(new InvoicePaid());
    	foreach ($user->notifications as $notification) {
    	    dd($notification->data);
    	}
    }

    //路由传参测试 route('test')
    public function routeParameterTest(User $user, TestRequest $request){
        return response()->json($user);
    }

    public function simgleSql() {
        return User::get();
    }

    public function nPlusOneSql() { //N+1问题
        $users = User::get();   //一条SQL语句
        $result = [];
        foreach ($users as $key => $value) {
            $result[] = $value->pages;  //N条SQL语句
        }
        return $result;
    }

    public function twoSql() {    //解决N+1问题
        $users = User::with('pages')->get();   //使用with进行预加载，2条SQL语句
        $result = [];
        foreach ($users as $key => $value) {
            $result[] = $value->pages;  //有了预加载，在这里不会进行SQL查询，会从上面的结果 $users中直接获取
        }
        return $result;
    }
}

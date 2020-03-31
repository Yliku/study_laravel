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
}

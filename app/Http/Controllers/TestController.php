<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class TestController extends Controller
{
    public function test(){
    	DB::collection('users')->insert([
    		'name'=>'tom',
    		'age'=>12,
    	]);
    	$res = DB::collection('users')->get();
    	dd($res);
    }
}
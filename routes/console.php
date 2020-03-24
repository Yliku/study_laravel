<?php

use Illuminate\Foundation\Inspiring;
use App\Events\News;
/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->describe('Display an inspiring quote');

Artisan::command('bignews', function () {	//测试广播用
    broadcast(new News("BIG NEWS!"));
    $this->comment("news sent");
})->describe('Send news');
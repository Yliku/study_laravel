<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191); 

        // 方法一（推荐）：监听
        \DB::listen(function($query) {
            \Log::channel('writeSQL')->info(
                $query->sql,
                $query->bindings,
                $query->time
            );
        });

        //方法二，
        // $tmp = str_replace('?', '"'.'%s'.'"', $query->sql);
        // $tmp = vsprintf($tmp, $query->bindings);    //将参数逐个插入到 %s 的位置，替换%s
        // $tmp = str_replace("\\","",$tmp);
        // // dump( $tmp );       //使用dump()会打不开网页，但可以在php artisan tinker显示出来
        // \Log::channel('writeSQL')->info('time: '.$query->time.'ms; '.$tmp. PHP_EOL); //使用log的新配置，写入 storage\logs\sql.log 文件里面

        //方法三，使用php artisan tinker进行查询，SQL语句会在命令行中直接打印出来
        //dump($query->sql . PHP_EOL);  //打印sql语句，PHP_EOL   是php自带的常量，可以在log里面换行
        //dump($query->bindings);       //打印sql语句的参数，参数是数组
        //dump($query->time);           //打印执行sql语句所花的时间
    }
}

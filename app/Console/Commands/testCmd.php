<?php
namespace App\Console\Commands;
use Illuminate\Console\Command;

class testCmd extends Command {
    protected $signature = 'command:name';          //命令的名字，要用名字来执行
    protected $description = 'Command description'; //命令的描述，可以通过 php artisan list 查看到命令对应的描述

    public function __construct() {
        parent::__construct();
    }

    public function handle() {      //执行命令时，会掉用该方法执行
        var_dump(11111);
    }
}

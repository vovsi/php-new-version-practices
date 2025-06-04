<?php

namespace App\Console\Commands;

use App\Models\A;
use App\Models\Earth;
use Illuminate\Console\Command;
use stdClass;

class Version7_2 extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:version7_2';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Version 7.2';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        /*$obj = new stdClass;
        $obj->{0} = 'A';
        $obj->a = "A";
        $obj = (array) $obj;
        var_dump($obj->{0});*/

        /*$arr = [0 => 1, 1 => 2, 2 => 3, "a" => "A"];
        $obj = (object)$arr;
        var_dump($obj);*/

        /*$obj = new stdClass;
        echo get_class($obj) . PHP_EOL;*/

        //echo count(1) . PHP_EOL;

        //$this->info(A::getObject(new Earth(1, 2)));
    }
}

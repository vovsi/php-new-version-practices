<?php

namespace App\Console\Commands;

use App\Models\A;
use App\Models\Earth;
use Illuminate\Console\Command;

class Version7_1 extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:version7_1';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Version 7.1';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Void return in func.
        $func = function (): void {};
        dump($func());

        // Multi-exceptions in catch.
        try {
            //$i = 2 / 0;
            //$i = 2 / [1];
        } catch (\DivisionByZeroError | \TypeError $e) {
            echo('Error' . PHP_EOL);
        }

        // String keys in list.
        $data = ['city' => 'Dnipro', 'country' => 'Ukraine'];
        ['city' => $city, 'country' => $country] = $data; // extract($data); (but selectable)
        $this->info($city . ' ' . $country);

        // New pseudo-type iterable.
        $start = memory_get_usage();
        $earth = new Earth(100, 3);
        $people = $earth->generatePeople(100000);
        foreach ($earth->getPeople($people) as $person) {
            //echo $person . ', ';
        }
        echo(PHP_EOL);
        $end = memory_get_usage();
        echo("Memory used: " . $end - $start . ' bytes' . PHP_EOL);

        // Negative offset in string.
        $name = 'Vlad';
        $this->info($name[-1]);

        // Convert callable func to closure.
        (new A())->getValidator('myFunc')(); // Execute closure function myFunc.

        // Modification access to constant of class.
        $this->info('Earth type: ' . $earth->getTypePlanet());

    }
}

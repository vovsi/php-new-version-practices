<?php

namespace App\Console\Commands;

use App\Models\Earth;
use App\Models\World;
use Illuminate\Console\Command;

class Version7_4 extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:version7_4';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Version 7.4';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // New operator Spread.
        $peopleFromInternal = ['Vlad', 'Evgeniy', 'Masha'];
        $peopleFromExternal = ['Sergiy', 'Olga'];
        $earth = new Earth('10x10', 3);
        $people = [...$peopleFromExternal, ...$peopleFromInternal, ...$earth->generatePeople(3)];
        //var_dump($people);
        $funcGetPeople = fn(...$people) => $people;
        //var_dump($funcGetPeople('Vlad', 'Evgeniy', 'Masha', 'Sergiy', 'Olga'));
        $fn = fn($a, $b) => $a + $b;
        $this->info($fn(...[1, 2])); // Unpacking an array by args.

        // New class WeakReference for create link on object.
        /*$earthLink = \WeakReference::create($earth);
        unset($earth);
        var_dump($earthLink);*/

        // Covariant return (mixed -> string).
        $earth->getTypePlanet();

        // Contravariant param (array -> mixed).
        $earth->getPeople($people);

        // Arrow functions.
        $peopleFormatted = array_map(fn($e) => '[' . $e . ']', $people);
        //var_dump($peopleFormatted);
        $funcFormat = fn($e) => '[' . $e . ']';
        //$this->info($funcFormat('Irina'));

        // Operator null coalescing assignment '??='.
        $arr = [];
        $arr[1] ??= 'a';
        $arr[1] ??= 'b';
        //dump($arr);
    }
}

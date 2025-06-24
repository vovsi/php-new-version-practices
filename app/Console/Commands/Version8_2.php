<?php

namespace App\Console\Commands;

use App\Models\Earth;
use App\Models\Enums\PlanetSurface;
use App\Models\Interfaces\PlanetInterface;
use App\Models\Interfaces\RealObjectInterface;
use App\Models\Mars;
use App\Models\World;
use Illuminate\Console\Command;
use Random\Engine\Mt19937;
use Random\Randomizer;
use ReflectionFunction;

class Version8_2 extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:version8_2';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Version 8.2';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Readonly class.
        $mars = new Mars(PlanetSurface::GAS, '20x20', 1, ['me']);
        // $mars->people = []; // Error !!!
        //dump($mars->people);

        // Disjunctive normal form in type of params.
        $earth = new Earth(PlanetSurface::HARD, '10x10', 1, ['me']);
        $fn = fn ((PlanetInterface&RealObjectInterface)|Mars $planet) => $planet::class;
        //$this->info($fn($mars));
        //$this->info($fn($earth)); // Error !!!

        // Return types: null, true, false.
        fn (): null => null;
        fn (): true => true;
        fn (): false => false;

        // Module 'Random' (ext-random).
        $randomizer = new Randomizer(new Mt19937());
        //$this->info($randomizer->getInt(1, 100));

        // Constants in trait.
        //$this->info(World::X);

        // Deprecation notice after init dynamic props of class.
        //$earth->age = 10000000;

        // Attribute #[\SensitiveParameter] for hide secret values.
        //$earth->exampleSensitiveParam('Very secret data', 'Public data');

        // Enum in constant.
        //$this->info(Earth::TYPE);

        // Check func for anon - ReflectionFunction->isAnonymous().
        $checkFunc = new ReflectionFunction('strlen'); // false
        $checkFunc = new ReflectionFunction($fn); // true
        //$this->info($checkFunc->isAnonymous());

        // Check method for has prototype - ReflectionMethod->hasPrototype().
        $checkMethod = new \ReflectionMethod('App\Models\Earth', 'setSize'); // false
        $checkMethod = new \ReflectionMethod('App\Models\Earth', 'generatePeople'); // true
        //$this->info($checkMethod->hasPrototype());
    }
}

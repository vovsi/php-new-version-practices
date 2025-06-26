<?php

namespace App\Console\Commands;

use App\Models\B;
use App\Models\Earth;
use App\Models\Enums\PlanetSurface;
use App\Models\Mars;
use Illuminate\Console\Command;
use Random\Randomizer;

class Version8_3 extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:version8_3';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Version 8.3';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Reset value readonly prop in clone method.
        $mars = new Mars(PlanetSurface::GAS, '20x20', 1, ['me']);
        $mars = clone $mars;
        //$this->info($mars->population);

        // Typed constant in class, interface, trait, enum.
        //$this->info(PlanetSurface::PROPERTY_NUM);

        // Attribute #[Override].
        //$b = new B(); // App\Models\B::getX() has #[\Override] attribute, but no matching parent method exists

        // Readonly anon class.
        $class = new readonly class {};

        // New function 'json_validate'.
        //$this->info(json_validate('{"name": "Vlad"}'));
        //$this->info(json_validate('{"name": Vlad}'));

        // Dynamic access to a const of class and enum.
        $constEnum = 'PROPERTY_NUM';
        //$this->info(PlanetSurface::{$constEnum});
        $constClass = 'TYPE';
        //$this->info(Earth::{$constClass});

        // New function 'gc_status'.
        //dump(gc_status());

        // New method \Random\Randomizer::getBytesFromString.
        $rng = new \Random\Randomizer();
        $crockfordAlphabet = '0123456789ABCDEFGHJKMNPQRSTVWXYZ';
        $r = $rng->getBytesFromString($crockfordAlphabet, 5);
        //$this->info($r);

        // New method \Random\Randomizer::getFloat().
        $rng = new \Random\Randomizer();
        $r = $rng->getFloat(0, 10, \Random\IntervalBoundary::OpenOpen);
        //$this->info($r);

        // New method \Random\Randomizer::nextFloat().
        $rng = new \Random\Randomizer();
        $r = $rng->nextFloat();
        //$this->info($r);

        // Multi PHP CLI Lint: php -l app/Console/Commands/Version8_3.php app/Console/Commands/Version8_2.php

        // unserialize() now throw Warning instead of Notice.
        try {
            unserialize('abc');
        } catch (\Exception $e) {
            //dump($e);
        }

        // New function mb_str_pad.
        //var_dump(str_pad('Français', 10, '_', STR_PAD_RIGHT));

        // New function stream_context_set_options.

        // Closure magic methods with names args.
        $closure = $mars->magic(...);
        //$closure(a: "A", b: "B");

        // Invariant visibility of constants.
        // If change constant PlanetSurface::PROPERTY_NUM to private.

        // class_alias() can create alias internal PHP classes.
        class_alias(Randomizer::class, '\Random\Rnd');
        $rand = new \Random\Rnd();
        //$this->info($rand->getFloat(0, 10, \Random\IntervalBoundary::OpenOpen));
    }
}

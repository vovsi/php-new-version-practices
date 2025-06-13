<?php

namespace App\Console\Commands;

use App\Models\Earth;
use App\Models\PlanetCache;
use App\Models\Saturn;
use App\Models\World;
use Illuminate\Console\Command;
use stdClass;

class Version8_0 extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:version8_0';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Version 8.0';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Nullsafe operator '?->'
        $obj = new World();
        //$this->info('Size Earth is ' . $obj?->earth?->size . ' Type: ' . gettype($obj?->earth?->size));

        // Operator 'match'.
        $result = match (3) {
            1 => 'one',
            2 => 'two',
            3 => 'three',
        };
        //$this->info($result);

        // Names arguments and union types of params.
        //var_dump($obj->getInfo(['title' => 'info of world'], withEarth: true));
        $earth = new Earth('10000000km', 3); // + add properties of class in params of constructor.
        //var_dump($earth->generatePeople(3, people1: 'Oleg', people2: 'Boris')); // Names args with spread operator.

        // Unpacking args from assoc array by spread.
        $fn = fn($a, $b) => $a . '|' . $b;
        //$this->info($fn(...['b' => 1, 'a' => 2]));

        // Expression can throw exception.
        //$res = 1 > 0 ? throw new \Exception('Some text') : 'false'; // In condition.
        $err = fn(string $text) => throw new \Exception($text); // In anon func.
        //$err('Some exception');

        // New logic '==' (more strict)
        /*dump([
            '0 == "foo"' => 0 == "foo",
            '0 == ""' => 0 == "",
            '42 == "42foo' => 42 == "42foo",
            '"42" == "42  "' => "42" == "42  ",
        ]);*/

        // Operator '@' throw Fatal errors.
        //@noExistsFunc();

        // Array with negative index.
        $arr[-5] = 'a';
        $arr[] = 'b'; // Idx: -4
        //var_dump($arr);

        // Final coma in params of function.
        $fn = fn($param1, $param2,) => $param1 . '|' . $param2;

        // Magic const 'class' in objects.
        //$this->info($earth::class);

        // Not required to declare variable of exception in catch.
        try {} catch (\Exception) {}

        // Union in params and props.
        $fn = fn(int|float|null $cost) => $cost;
        $fn(100);

        // Type 'mixed' in params and return.
        $fn = fn(mixed $content): mixed => $content;
        $fn('text');

        // Pseudotype 'false'.
        $fn = fn(int|false $i): int|false => $i;
        $fn(false);

        // Pseudotype 'static' in return function (fluent interfaces).
        //$this->info($earth->setSize('10x10')->size);

        // Stringable interface. Importantly declare magic method __toString.
        //$this->info($earth);

        // Child class has more types param but strict return.
        $saturn = new Saturn();
        //$this->info($saturn->getTypePlanet(true));

        // Attributes (App\Attributes\Cache).
        $planetCache = new PlanetCache(new Earth('10000000km', 3));
        //$planetCache->generatePeople(3);

        // New function 'str_contains'
        //$this->info(str_contains('PHP 8.0', '8'));

        // New function 'str_starts_with'
        //$this->info(str_starts_with('PHP 8.0', ''));

        // New function 'str_ends_with'
        //$this->info(str_ends_with('PHP 8.0', '0'));

        // New function 'get_debug_type'
        //$this->info(get_debug_type(fn () => ""));

        // Function 'token_get_all' replace to class PhpToken.
        $tokens = \PhpToken::tokenize('<?= "Hello" ?>');
        //dump($tokens);

        // New class 'WeakMap' as assoc array with object keys.
        $map = new \WeakMap();
        $obj = new stdClass();
        $map[$obj] = 'test';
        //dump($map);
        unset($obj);
        //dump($map);
    }
}

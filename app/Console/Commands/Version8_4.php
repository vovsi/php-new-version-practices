<?php

namespace App\Console\Commands;

use App\Models\Earth;
use App\Models\Enums\PlanetSurface;
use App\Models\World;
use DateTimeImmutable;
use Illuminate\Console\Command;
use ReflectionClass;

class Version8_4 extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:version8_4';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Version 8.4';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $arr = [1, 2, 3, 'a', 'b', 'c'];

        // New function array_find.
        $r = array_find($arr, fn ($val) => $val > 2);
        //$this->info($r); // 3

        // New function array_find_key.
        $r = array_find_key($arr, fn ($val) => $val > 2);
        //$this->info($r); // 2

        // New function array_all.
        $r = array_all($arr, fn ($val) => is_int($val));
        //$this->info($r); // false

        // New function
        $r = array_any($arr, fn ($val) => is_int($val));
        //$this->info($r); // true

        // New function http_get_last_response_headers.
        file_get_contents('https://google.com');
        //dump(http_get_last_response_headers());

        // New function http_clear_last_response_headers.
        http_clear_last_response_headers();
        //dump(http_get_last_response_headers()); // null

        // New function bcdivmod (ext BCMath).
        //dump(bcdivmod('123', '10'));

        // New method DateTime::createFromTimestamp.
        $dt = \DateTime::createFromTimestamp(1703485481);
        //dump($dt);

        // New methods: getMicrosecond, setMicrosecond in DateTime and DateTimeImmutable classes.
        $date = new DateTimeImmutable();
        //$this->info($date->getMicrosecond());
        $date = new \DateTime();
        $date->setMicrosecond(426286);
        //$this->info($date->getMicrosecond());

        // New functions mb_trim, mb_ltrim, mb_rtrim.
        // Examples same as without mb.

        // New functions mb_ucfirst, mb_lcfirst (ext mbstring).
        //$this->info(mb_ucfirst('test'));
        //$this->info(mb_lcfirst('Test'));

        // New function request_parse_body.
        /*[$_POST, $_FILES] = request_parse_body();
        var_dump($_POST);*/

        // Property Hooks.
        /*$world = new World(new \DateTime());
        $world->lifetime_years = 100;*/
        //var_dump($world); // No handled props.
        //var_export($world); // Handled props.
        //$this->info($world->lifetime_years);
        //$world->coordinates = []; // Throw exception.
        //$world->coordinates = ['x' => 14, 'y' => 64]; // OK
        //dump($world->coordinates);
        //$this->info($world->created->format('Y-m-d H:i:s')); // Hook in constructor.
        $earth = new Earth(PlanetSurface::HARD, '10x10', 1, ['me']);
        $earth->animals = ['dog', 'cat', 'horse']; // Hook get/set in PlanetInterface.animals.
        //dump($earth->animals);

        // Lazy object (proxy).
        $initializerProxy = static function (World $proxy): World {
            echo("Init lazy (proxy)" . PHP_EOL);
            return new World(new \DateTime());
        };
        $initializerGhost = static function (World $proxy) {
            echo("Init lazy (ghost)" . PHP_EOL);
            $proxy->__construct(new \DateTime());
        };
        $reflector = new ReflectionClass(World::class);
        $obj = $reflector->newLazyProxy($initializerProxy);
        //$obj = $reflector->newLazyGhost($initializerGhost);
        //dump($obj->earth);
        //$this->info($obj->getSize());
        //var_dump($obj);

        // New modes of round PHP_ROUND_CEILING, PHP_ROUND_FLOOR, PHP_ROUND_TOWARD_ZERO, PHP_ROUND_AWAY_FROM_ZERO for
        // function round().

        // Exit and die now functions. But may be call without brackets.

        // Creating and call method of class without additional brackets.
        $x = new World(new \DateTime())->getX();

        // Constant E_STRICT now is deprecated.
        //error_reporting(E_STRICT);
    }
}

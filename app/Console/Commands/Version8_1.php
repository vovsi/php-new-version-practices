<?php

namespace App\Console\Commands;

use App\Models\Earth;
use App\Models\Enums\PlanetSurface;
use Fiber;
use Illuminate\Console\Command;

class Version8_1 extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:version8_1';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Version 8.1';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Enums.
        //dump(PlanetSurface::HARD);
        //dump(PlanetSurface::HARD->name);
        //dump(PlanetSurface::HARD->value);
        //dump(PlanetSurface::cases());
        $earth = new Earth(PlanetSurface::HARD, '10x10', 100);
        //$this->info($earth->surface->value);
        //$this->info(PlanetSurface::GAS->getFullInfo());
        //$this->info(PlanetSurface::LIQUID instanceof PlanetSurface);
        /*dump(array_map(
            fn(PlanetSurface $status) => $status->getFullInfo(),
            PlanetSurface::cases()
        ));*/
        $weakMap = new \WeakMap();
        $weakMap[PlanetSurface::LIQUID] = 'liquid_planet';
        //dump($weakMap);
        //$this->info($weakMap[PlanetSurface::LIQUID]);
        //$this->info(in_array(PlanetSurface::LIQUID, [PlanetSurface::GAS, PlanetSurface::HARD]));

        // Fiber (pseudo async execution).
        /*$fiber = new Fiber(function (): void {
            $value = Fiber::suspend('pause'); // (2)
            echo "Value from resume: ", $value, "\n"; // (5)
        });
        $value = $fiber->start(); // (1)
        echo "Value from suspend: ", $value, "\n"; // (3)
        $fiber->resume('continue working'); // (4)*/
        /*$fiber = new Fiber(function (): void {
            for ($i = 0; $i < 5; $i++) {
                echo "[Fiber 1] Do " . $i . PHP_EOL;
                Fiber::suspend();
            }
        });
        $fiber2 = new Fiber(function (): void {
            for ($i = 0; $i < 5; $i++) {
                echo "[Fiber 2] Do " . $i . PHP_EOL;
                Fiber::suspend();
            }
        });
        $fiber->start();
        $fiber2->start();
        for ($i = 0; $i < 4; $i++) {
            $fiber->resume();
            $fiber2->resume();
        }*/

        // Unpacking assoc arrays (using array_merge logic).
        /*$arr1 = ['a' => 1, 'b' => 0];
        $arr2 = ['a' => 0, ...$arr1];
        dump($arr2); // a=1, b=0*/

        // New return type 'never' if function return die / exit / throw and the like.
        fn (): never => die;

        // New function 'array_is_list'.
        /*$this->info(array_is_list(['a', 'b', 'c'])); // true
        $this->info(array_is_list([0 => 1, 1 => 2])); // true
        $this->info(array_is_list([1 => 1, 2 => 2])); // false (because assoc array)*/

        // Final constant (no rewrite in child classes).
        $valOfFinalConst = new class {
            final public const int X = 100;
        }::X;
        //$this->info($valOfFinalConst);

        // New functions 'fsync' and 'fdatasync' for writing guarantees.
        /*$file = fopen(storage_path('app/private/sample.txt'), "w");
        fwrite($file, "Some content...");
        if (fsync($file)) {
            $this->info("File is successfully saved!");
        }
        fclose($file);*/
    }
}

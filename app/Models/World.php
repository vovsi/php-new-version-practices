<?php

namespace App\Models;

use App\Models\Traits\Animal;
use App\Models\Traits\People;

class World
{
    use Animal, People;

    public function __construct()
    {
        echo("World constructor" . PHP_EOL);
    }
}

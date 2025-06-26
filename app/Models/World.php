<?php

namespace App\Models;

use App\Models\Traits\Animal;
use App\Models\Traits\People;

class World
{
    use Animal, People;

    public ?Earth $earth = null;

    public function __construct()
    {
        echo("World constructor" . PHP_EOL);
        $this->earth = new Earth('100 000 km', 8000000000);
    }

    public function getX(): string
    {
        return 'World X';
    }

    public function getSize(): string
    {
        return 'infinity';
    }

    public function setEarth(?Earth $earth): Earth
    {
        return $this->earth = $earth;
    }

    public function getInfo(array|null $info = [], bool $withWorld = false, bool $withEarth = false): array
    {
        $info = $info ?? [];

        if ($withWorld) {
            $info['world'] = 'World is ' . $this->getSize();
        }
        if ($withEarth) {
            $info['earth'] = ['size' => $this->earth->size, 'population' => $this->earth->population];
        }

        return $info;
    }
}

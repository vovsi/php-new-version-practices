<?php

namespace App\Models;

use App\Models\Enums\PlanetSurface;
use App\Models\Traits\Animal;
use App\Models\Traits\People;
use DateTimeImmutable;
use DateTimeInterface;

class World
{
    use Animal, People;

    public ?Earth $earth = null;

    public string|int $lifetime_years = 0 {
        get {
            return $this->lifetime_years . ' years ago';
        }
        set(string|int $value) {
            $this->lifetime_years = intval($value);
        }
    }

    public array $coordinates = ['x' => 0, 'y' => 0] {
        get => $this->coordinates;
        set => isset($value['x'], $value['y']) ? $value : throw new \InvalidArgumentException('Missing "x" and "y" keys.');
    }

    public function __construct(
        public private(set) null|DateTimeInterface $created = null { // Asymmetrical visibility of prop.
            set => $value;
        }
    )
    {
        echo("World constructor" . PHP_EOL);
        $this->earth = new Earth(PlanetSurface::HARD, '100 000 km', 8000000000);
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

<?php

namespace App\Models;

use App\Models\Enums\PlanetSurface;
use App\Models\Interfaces\PlanetInterface;
use App\Models\Interfaces\RealObjectInterface;

readonly class Mars implements Interfaces\PlanetInterface, RealObjectInterface
{
    public array $animals;

    public function __construct(
        public PlanetSurface $surface,
        public string $size,
        public int $population,
        public array $people,
    )
    {
    }

    public function __call($name, $args)
    {
        var_dump($name, $args);
    }

    public function __clone(): void
    {
        $this->people = []; // readonly - reset only in __clone
        $this->population = 0; // readonly - reset only in __clone
    }

    public function getPeople(array $people = []): iterable
    {
        return $this->people;
    }

    public function getTypePlanet(bool $asNum = false): mixed
    {
        // TODO: Implement getTypePlanet() method.
    }

    public function generatePeople(int $count, string ...$people): array
    {
        // TODO: Implement generatePeople() method.
    }

    public static function getInstance(): self
    {
        return new self();
    }
}

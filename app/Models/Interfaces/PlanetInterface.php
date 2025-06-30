<?php

namespace App\Models\Interfaces;

use App\Models\Enums\PlanetSurface;

interface PlanetInterface
{
    // private(set) array $animals { get; } // Asymmetrical visibility of prop.
    public array $animals { get; set; }

    public function __construct(PlanetSurface $surface, string $size, int $population, array $people);

    public function getPeople(array $people = []): iterable;

    public function getTypePlanet(bool $asNum = false): mixed;

    public function generatePeople(int $count, string ...$people): array;
}

<?php

namespace App\Models;

use App\Models\Enums\PlanetSurface;
use App\Models\Interfaces\PlanetInterface;

class Saturn implements PlanetInterface
{
    protected const TYPE_PLANET_NAME = 'without live';
    protected const TYPE_PLANET = 443;
    public array $animals = [];

    public function __construct(
        public PlanetSurface $surface,
        public string $size,
        public int $population,
        public array $people = []
    )
    {
    }

    public function getPeople(array $people = []): iterable
    {
        return $people;
    }

    public function getTypePlanet(bool|null $asNum = false): string|null
    {
        return $asNum ? self::TYPE_PLANET : self::TYPE_PLANET_NAME;
    }

    public function generatePeople(int $count, string ...$people): array
    {
        // TODO: Implement generatePeople() method.
    }
}

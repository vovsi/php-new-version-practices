<?php

namespace App\Models;

class Saturn implements Planet
{
    protected const TYPE_PLANET_NAME = 'without live';
    protected const TYPE_PLANET = 443;

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

<?php

namespace App\Models;

use App\Attributes\Cache;
use App\Models\Enums\PlanetSurface;
use App\Models\Interfaces\Planet;

class Earth implements Planet
{
    protected const TYPE_PLANET_NAME = 'with live';
    protected const TYPE_PLANET = 2242;

    public function __construct(
        public PlanetSurface $surface,
        public string   $size,
        public int      $population,
        protected array $people = [],
    )
    {
    }

    public function __toString(): string
    {
        return json_encode($this);
    }

    public function setSize(string $size): static
    {
        $this->size = $size;

        return $this;
    }

    public function getPeople(mixed $people = []): iterable
    {
        foreach ($this->people as $person) {
            yield $person;
        }
    }

    #[Cache(ttl: 60)]
    public function generatePeople(int $count, string ...$people): array
    {
        $this->people = $people ?? [];
        for ($i = 0; $i < $count; $i++) {
            $this->people[] = random_bytes(8);
            sleep(1);
        }

        return $this->people;
    }

    public function getTypePlanet(bool $asNum = false): string
    {
        return $asNum ? self::TYPE_PLANET : self::TYPE_PLANET_NAME;
    }
}

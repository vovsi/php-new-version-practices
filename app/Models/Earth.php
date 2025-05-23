<?php

namespace App\Models;

class Earth implements Planet
{
    protected const TYPE_PLANET = 'with live';

    public function __construct(
        public string $size,
        public int $population,
        protected array $people = [],
    )
    {
    }

    public function getPeople(iterable $people = []): iterable
    {
        foreach ($this->people as $person) {
            yield $person;
        }
    }

    public function generatePeople(int $count): array
    {
        $this->people = [];
        for($i = 0; $i < $count; $i++) {
            $this->people[] = random_bytes(8);
        }

        return $this->people;
    }

    public function getTypePlanet(): string
    {
        return self::TYPE_PLANET;
    }
}

<?php

namespace App\Models;

interface Planet
{
    public function getPeople(array $people = []): iterable;

    public function getTypePlanet(bool $asNum = false): mixed;

    public function generatePeople(int $count, string ...$people): array;
}

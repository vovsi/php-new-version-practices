<?php

namespace App\Models;

interface Planet
{
    public function getPeople(array $people = []): iterable;
}

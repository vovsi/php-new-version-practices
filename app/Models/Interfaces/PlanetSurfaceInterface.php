<?php

namespace App\Models\Interfaces;

interface PlanetSurfaceInterface
{
    public const int PROPERTY_NUM = 1;

    public function getFullInfo(): string;
}

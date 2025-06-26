<?php

namespace App\Models\Enums;

use App\Models\Interfaces\PlanetSurfaceInterface;

enum PlanetSurface: int implements PlanetSurfaceInterface
{
    public const int PROPERTY_NUM = 2; // The overridden const.

    case HARD = 1;
    case LOOSE = 2;
    case GAS = 3;
    case LIQUID = 4;

    public function getFullInfo(): string
    {
        return $this->name . ':' . $this->value;
    }
}

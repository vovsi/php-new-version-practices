<?php

namespace App\Models;

use App\Attributes\Cache;
use App\Models\Enums\PlanetSurface;
use App\Models\Interfaces\Planet;
use Illuminate\Support\Arr;

/**
 * Proxy
 */
class PlanetCache implements Planet
{
    public function __construct(
        public PlanetSurface $surface,
        public string $size,
        public int $population,
        public array $people,
    )
    {
    }

    protected function invokeMethod(string $method, ...$params): mixed
    {
        if (!method_exists($this->planet, $method)) {
            throw new \BadMethodCallException("Method [$method] in [" . $this->planet::class . "] does not exist.");
        }

        $reflection = new \ReflectionMethod($this->planet, $method);
        $cacheAttribute = Arr::first($reflection->getAttributes(Cache::class));
        if ($cacheAttribute) {
            $cacheKey = __CLASS__ . $method;
            if (\Illuminate\Support\Facades\Cache::has($cacheKey)) {
                $response = \Illuminate\Support\Facades\Cache::get($cacheKey);
            } else {
                $response = $this->planet->{$method}(...$params);
                \Illuminate\Support\Facades\Cache::set($cacheKey, $response, $cacheAttribute->newInstance()->ttl);
            }
        } else {
            $response = $this->planet->{$method}(...$params);
        }

        return $response;
    }

    public function getPeople(array $people = []): iterable
    {
        return $this->invokeMethod(__FUNCTION__, $people);
    }

    public function getTypePlanet(bool $asNum = false): mixed
    {
        return $this->invokeMethod(__FUNCTION__, $asNum);
    }

    public function generatePeople(int $count, string ...$people): array
    {
        return $this->invokeMethod(__FUNCTION__, $count, ...$people);
    }
}

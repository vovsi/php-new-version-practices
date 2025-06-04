<?php

namespace App\Models;

use Closure;

class A
{
    public function getValidator(string $name = 'byDefault')
    {
        return Closure::fromCallable([$this, $name]); // return closure func by their name.
    }

    private function byDefault(...$options)
    {
        echo "Private default with:" . print_r($options, true);
    }

    public function __call(string $name, array $args)
    {
        echo "Call $name with:" . print_r($args, true);
    }

    private function myFunc(): void
    {
        echo("My func" . PHP_EOL);
    }

    public static function getObject(object $object): string
    {
        return get_class($object);
    }
}

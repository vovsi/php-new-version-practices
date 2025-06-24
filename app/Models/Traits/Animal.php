<?php

namespace App\Models\Traits;

trait Animal
{
    public const string X = 'Animal constant';

    public function __construct()
    {
        echo("Animal constructor" . PHP_EOL);
    }
}

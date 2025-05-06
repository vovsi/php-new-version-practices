<?php

namespace App\Models\Traits;

trait Animal
{
    public function __construct()
    {
        echo("Animal constructor" . PHP_EOL);
    }
}

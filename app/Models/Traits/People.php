<?php

namespace App\Models\Traits;

trait People
{
    public function __construct()
    {
        echo("People constructor" . PHP_EOL);
    }
}

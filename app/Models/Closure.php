<?php

namespace App\Models;

class Closure
{
    public function multiplier(int $n): callable {
        return function(int $x) use ($n) {
            return $x * $n;
        };
    }
}

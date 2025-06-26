<?php

namespace App\Models;

class B extends C
{
    public function testMethod(): void
    {

    }


    #[\Override]
    public function getX(): string
    {
        return 'B';
    }
}

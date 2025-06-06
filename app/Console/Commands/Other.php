<?php

namespace App\Console\Commands;

use App\Models\Closure;
use App\Models\World;
use Illuminate\Console\Command;

class Other extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:other';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Other practice.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Traits.
        $world = new World();

        // Condition operator ?: - check for empty.
        $var = '';
        $this->info($var ?: 'is empty');

        // Closure function.
        $closure = new Closure();
        $closureFunc = $closure->multiplier(3);
        $this->info($closureFunc(10));

        // % (modulus)
        echo(14 % 3 . PHP_EOL);

        // Heredoc
        $word = 'some';
        echo <<<TEXT
It's
$word
text;

TEXT;

        // Nowdoc
        echo <<<'TEXT'
It's
$word
text;

TEXT;

        // Heredoc in array.
        $arr = ['one', 'two', <<<THREE
        three
        THREE, 'four'];
        var_dump($arr);

        // Define constant.
        define('COUNTRY', 'Ukraine');
    }
}

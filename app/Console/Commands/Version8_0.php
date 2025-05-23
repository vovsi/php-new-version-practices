<?php

namespace App\Console\Commands;

use App\Models\World;
use Illuminate\Console\Command;

class Version8_0 extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:version8_0';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Version 8.0';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Nullsafe operator ?->
        $obj = new World();
        $this->info('Size Earth is ' . $obj?->earth?->size . ' Type: ' . gettype($obj?->earth?->size));
    }
}

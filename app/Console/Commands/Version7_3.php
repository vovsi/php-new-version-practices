<?php

namespace App\Console\Commands;

use App\Models\Earth;
use Illuminate\Console\Command;

class Version7_3 extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:version7_3';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Version 7.3';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Comma at the end of params.
        $earth = new Earth('10x10', 100, [], );

        // Setting variable from array by link.
        $vegetables = ['avocado', 'tomato'];
        list ($veg1, &$veg2) = $vegetables;
        $veg2 = 'pumpkin';
        var_dump($vegetables); // avocado, pumpkin

        // New flag JSON_THROW_ON_ERROR in json_decode function.
        try {
            json_decode("abc", true, 512, JSON_THROW_ON_ERROR);
        } catch (\Exception $e) {
            $this->error($e->getMessage());
        }

        // New function is_countable.
        $this->info(is_countable(1.1) ? 'Is countable' : 'Is not countable');

        // New functions array_key_first and array_key_last.
        $arr = [1, 2, 3];
        $this->info('First idx: ' . array_key_first($arr));
        $this->info('Last idx: ' . array_key_last($arr));
    }
}

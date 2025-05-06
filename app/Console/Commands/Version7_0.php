<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Version7_0 extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:version7_0';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Version 7.0';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Null-коалесцентный оператор
        $val = $itsNull ?? 'default';
        $this->info($val);

        // Оператор “космический корабль”
        $val1 = 3;
        $val2 = 2;
        switch ($val1 <=> $val2) {
            case 0:
                $this->info($val1 . '=' . $val2);
                break;
            case -1:
                $this->info($val1 . '<' . $val2);
                break;
            case 1:
                $this->info( $val1 . '>' . $val2);
                break;
        }

        // Анонимные классы
        $this->info(
            new class {
                public function get()
                {
                    return 1;
                }
            }->get()
        );

        // Функции CSPRNG
        $this->info(random_bytes(10));
        $this->info(random_int(1, 10));

        // Обновленные генераторы (return)
        $numsFunc = function () {
            yield 1;
            yield 2;
            yield 3;
            return 4; // Not will show.
        };
        foreach ($numsFunc() as $val) {
            $this->info('Num: ' . $val);
        }

    }
}

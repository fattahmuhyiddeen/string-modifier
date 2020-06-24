<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\ModifierService;

class Modifier extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'string:modifier {str=""}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command accept an argument and convert it to capital letters, alternating upper and lower case and a csv file';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $modifier = new ModifierService($this->argument('str'));

        echo $modifier->convertToUpperCase() . PHP_EOL;
        echo $modifier->convertToAlternatingCase() . PHP_EOL;
        $modifier->generateCSV();
        echo 'CSV created!' . PHP_EOL;
        return $this->argument('str');
    }
}

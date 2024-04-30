<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class productCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'product:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Product Description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        return Command::SUCCESS;
    }
}

<?php

namespace App\Console\Commands;

use App\Jobs\CompanyCreate;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

class Debug extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:debug-job';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        for ($i = 0; $i < 10; $i++) {
            CompanyCreate::dispatch([
                "id" => $i,
                "first_name" => "{$i}-Gray",
                "last_name" => "{$i}-log",
                "email" => "{$i}-tera_test@log.com"
            ], strval(Str::uuid()));
        }
    }
}

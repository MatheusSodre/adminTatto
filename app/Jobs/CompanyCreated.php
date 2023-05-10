<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class CompanyCreated implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public mixed $params;
    public int $tries = 3;

    /**
     * Create a new job instance.
     */
    public function __construct(mixed $payload)
    {
        $this->onConnection('sqs')
            ->onQueue('company-queue')
            ->params = $payload;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        print_r($this->params);
    }
}

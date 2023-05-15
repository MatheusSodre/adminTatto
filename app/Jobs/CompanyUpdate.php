<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class CompanyUpdate implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public mixed $params;
    public int $tries = 1;

    public string $correlationId;

    /**
     * Create a new job instance.
     */
    public function __construct(mixed $payload, string $correlationId = null)
    {
        $correlationId = is_null($correlationId) ? (string)Str::uuid() : $correlationId;
        $this->onConnection('sqs')
            ->onQueue('company-update-queue')
            ->setCorrelationId($correlationId)
            ->params = $payload;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Log::withContext([
            'correlation-id' => $this->getCorrelationId(),
            'class' => __CLASS__,
            'method' => __METHOD__
        ]);
        try {
            Log::info('Initialize update  company process  with correlation ID from create company queue', ['parameters' => $this->params]);
            sleep(1);
            Log::debug('Debug process steps', ['description' => $this->params]);
            sleep(1);
            Log::info('Finished create  company process ', ['resume' => $this->params]);
            throw new \Exception('Error to update company');
        } catch (\Throwable $throwable) {
            sleep(1);
            Log::error($throwable->getMessage(), ['error_with_parameters' => $this->params]);
        }
    }

    public function setCorrelationId(string $correlationId): CompanyUpdate
    {
        $this->correlationId = $correlationId;
        return $this;
    }

    /**
     * @return string
     */
    public function getCorrelationId(): string
    {
        return $this->correlationId;
    }
}

<?php

namespace App\Jobs;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class CompanyCreate implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public mixed $params;
    public int $tries = 3;

    public string $correlationId;

    /**
     * Create a new job instance.
     */
    public function __construct(array $payload, string $correlationId = null)
    {
        $this->onConnection('sqs')
            ->onQueue('company-create-queue')
            ->setCorrelationId($correlationId ?? strval(Str::uuid()))
            ->params = array_merge($payload, []);
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
        Log::info('Initialize create  company process  with correlation ID', ['parameters' => $this->params]);
        sleep(1);
        Log::debug('Debug process steps', ['description' => $this->params]);
        sleep(1);
        Log::debug('Before send  to  update queue company process ', ['parameters' => $this->params]);
        sleep(1);
        $this->params = [
            "id" => $this->params['id'],
            "first_name" => 'update-' . $this->params['first_name'],
            "last_name" => 'update-' . $this->params['last_name'],
            "email" => 'update-' . $this->params['email'],
        ];
        sleep(1);
        CompanyUpdate::dispatch($this->params, $this->getCorrelationId());
        Log::debug('Sent to  update queue company process ', ['parameters' => $this->params]);
        sleep(1);
        Log::info('Finished create  company process ', ['resume' => $this->params]);
        sleep(1);
        print_r($this->params);

    }

    public function setCorrelationId(string $correlationId): CompanyCreate
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

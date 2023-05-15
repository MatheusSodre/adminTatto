<?php
namespace App\Services\ServicesExternal\Evaluation;
use App\Services\ServicesExternal\Traits\ConsumeExternalService;

class EvaluationService
{
    use ConsumeExternalService;
    protected $url;
    protected $token;

    public function __construct()
    {
        $this->url = config('services.micro_02.url');
        $this->token = config('services.micro_02.token');
    }

    public function getEvaluation(string $company)
    {   
        $response = $this->request('get', "/api/evaluations/{$company}");
        return $response->body();
    }
}
?>
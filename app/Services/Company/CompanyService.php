<?php

namespace App\Services\Company;

use App\Http\Resources\Company\CompanyResource;
use App\Jobs\CompanyCreate;
use App\Repositories\Company\CompanyRepository;
use App\Services\ServicesExternal\Evaluation\EvaluationService;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Response as HttpResponse;
use Illuminate\Http\JsonResponse;

class CompanyService
{


    /**
     * Create a new service instance.
     *
     * @param  CompanyRepository  $companyRepository
     * @return void
     */
    public function __construct(private CompanyRepository $companyRepository,private EvaluationService $evaluationService)
    {
        //
    }

    public function store(array $data)
    {
            $company = $this->companyRepository->create($data);
            CompanyCreate::dispatch($company->email)->onQueue('queue_micro_email');
        return $company;

    }

    public function getAll($relations = [], $columns = ['*'])
    {
        return $this->companyRepository->all($relations, $columns);
    }

    public function getPaginate($relations = [], $limit = null, $columns = ['*'])
    {
        return $this->companyRepository->paginate($relations,$limit,$columns);
    }

    public function getCompanyByUUID(string $field, string $uuid = null)
    {
        $reponse             = $this->evaluationService->getEvaluation($uuid);
        $data['company']     = (CompanyResource::collection($this->companyRepository->getCompanyByUUID($field,$uuid)));


        $data['evaluations'] = json_decode($reponse->body());
        return $data;
    }

    public function updateCompanyByUUID($field,$request,$uuid):bool|null
    {
        return $this->companyRepository->updateCompanyByUUID($field,$uuid,$request);
    }

    public function destroyByUUID($filed,$id):bool|null
    {
        return $this->companyRepository->destroyByUUID($filed,$id);
    }
}

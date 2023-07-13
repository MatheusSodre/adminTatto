<?php

namespace App\Http\Controllers\Api\Company;

use App\Http\Controllers\Controller;
use App\Http\Requests\Company\StoreUpdateCompany;
use App\Http\Resources\Company\CompanyResource;
use App\Services\Company\CompanyService; 
use App\Services\ServicesExternal\Evaluation\EvaluationService;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Response as HttpResponse;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class CompanyController extends Controller
{
    /**
     * @param CompanyService $companyService
     *
     */
    public function __construct(private CompanyService $companyService,private EvaluationService $evaluationService)
    {
        $this->companyService = $companyService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()                                        
    {
        Log::info('Initialize order validator process', ['parameters' => 'asdasd']);
        
        // Log::debug('Call header from request to get Idempotency');
        return CompanyResource::collection($this->companyService->getPaginate());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUpdateCompany $request)
    {
        return new CompanyResource($this->companyService->store($request->validated()));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $uuid)
    {
        $company    = $this->companyService->getCompanyByUUID('uuid',$uuid);
        $evaluation = $this->evaluationService->getEvaluation($uuid);
        return (new CompanyResource($company))
                            ->additional([
                                'evaluations' => json_decode($evaluation)
                            ]);
    }

    /** 
     * Update the specified resource in storage.
     */
    public function update(StoreUpdateCompany $request, string $uuid)
    {
        return Response::json($this->companyService->UpdateCompanyByUUID('uuid',$request->validated(),$uuid),HttpResponse::HTTP_ACCEPTED);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $uuid)
    {   
        return Response::json($this->companyService->destroyByUUID('uuid',$uuid), HttpResponse::HTTP_NO_CONTENT); 
    }
}

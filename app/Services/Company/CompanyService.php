<?php

namespace App\Services\Company;



use App\Jobs\CompanyCreate;
use App\Jobs\CompanyCreatedEmail;
use App\Repositories\Company\CompanyRepository;


class CompanyService
{


    /**
     * Create a new service instance.
     *
     * @param  CompanyRepository  $companyRepository
     * @return void
     */
    public function __construct(private CompanyRepository $companyRepository)
    {
        //
    }

    public function store(array $data)
    {
            $company = $this->companyRepository->create($data);
            // CompanyCreatedEmail::dispatch($company->email)->onQueue('queue-micro-email');
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
        return $this->companyRepository->getCompanyByUUID($field,$uuid);
    }

    public function updateCompanyByUUID($field,$request,$uuid)
    {
        return $this->companyRepository->updateCompanyByUUID($field,$uuid,$request);
    }

    public function destroyByUUID($filed,$id)
    {
        return $this->companyRepository->destroyByUUID($filed,$id);
    }
}

<?php

namespace App\Services\Plans;
use App\Repositories\Plans\PlanRepository;



class PlanService
{
    /**
     * Create a new service instance.
     *
     * @param  PlanRepository  $planRepository
     * @return void
     */
    public function __construct(private PlanRepository $planRepository)
    {
        //
    }

    public function store(array $data)
    {
        return $this->planRepository->create($data);
    }

    public function getAll()
    {
        return $this->planRepository->all($relations = [], $columns = ['*']);
    }

    public function paginate($limit = 10,$relations = [], $columns = ['*'])
    {
        return $this->planRepository->paginate($limit = 10,$relations = [], $columns = ['*']);
    }
    public function getByUUID($fild,$uuid)
    {
        return $this->planRepository->getByUUID($fild,$uuid);
    }
    public function getById($id)
    {
        return $this->planRepository->findOrFail($id);
    }

    public function update($request,$id):bool|null
    {
        return $this->planRepository->update($request,$id);
    }

    public function destroy($id):bool|null
    {
        return $this->planRepository->delete($id);
    }
}

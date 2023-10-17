<?php

namespace App\Services\Plans;
use App\Repositories\Plans\PlanRepository;
use App\Repositories\Plans\PlansRepository;


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

<?php

namespace App\Repositories\Plans;



use App\Models\Planos\Plan;
use App\Repositories\BaseRepository;

class PlanRepository extends BaseRepository 
{
    public function __construct(Plan $plan)
    {
        $this->model = $plan;
    }
}
?>

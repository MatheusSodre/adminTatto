<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Plans\StoreUpdatePlan;
use App\Services\Plans\PlanService;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    public function __construct(private PlanService $planService) 
    {
        
    }
    public function index()
    {
        $plans = $this->planService->paginate();
        return view('admin.pages.plans.index',[
            'plans' => $plans
        ]);
    }
    public function store(StoreUpdatePlan $request)
    {   
        $this->planService->store($request->all());   
        return redirect()->route('plans.index');
    }

    public function getByUUID($uuid){
        $plan = $this->planService->getByUUID('uuid',$uuid);
    }
}

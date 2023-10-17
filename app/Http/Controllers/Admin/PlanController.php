<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Plans\PlanService;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    public function __construct(private PlanService $planService) 
    {
        
    }
    public function index()
    {
        $plans = $this->planService->getAll();
        return view('admin.pages.plans.index',[
            'plans' => $plans
        ]);
    }
    public function create()
    {
        return view('admin.pages.plans.create');
    }
}

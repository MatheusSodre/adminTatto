<?php

namespace App\Providers;


use App\Models\Company\{
    Category,
    Company
};

use App\Models\Planos\Plan;
use App\Observers\Company\{
    CategoryObserve,
    CompanyObserve
};


use App\Observers\Plans\PlanObserve;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
         Category::observe(CategoryObserve::class);
         Company::observe(CompanyObserve::class);
         Plan::observe(PlanObserve::class);
    }
}

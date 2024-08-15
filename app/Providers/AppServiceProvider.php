<?php

namespace App\Providers;


use App\Models\{
    Category,
    Company
};

use App\Models\Planos\Plan;
use App\Observers\Company\{
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
         Company::observe(CompanyObserve::class);
         Plan::observe(PlanObserve::class);
    }
}

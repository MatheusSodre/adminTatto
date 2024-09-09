<?php

namespace App\Providers;


use App\Models\Admin\{
    Category,
    Company
};

use App\Models\Planos\Plan;
use App\Observers\Company\{
    CompanyObserve
};


use App\Observers\Plans\PlanObserve;
use Illuminate\Pagination\Paginator;
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
         Paginator::useBootstrapFive();
         Company::observe(CompanyObserve::class);
         Plan::observe(PlanObserve::class);
    }
}

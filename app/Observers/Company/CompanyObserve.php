<?php

namespace App\Observers\Company;

use App\Models\Admin\Company;
use Illuminate\Support\Str;

class CompanyObserve
{
    /**
     * Handle the Company "created" event.
     */
    public function creating(Company $company): void
    {
        $company->url  = Str::slug($company->name, "-");
        $company->uuid = Str::uuid();
    }

    /**
     * Handle the Company "updated" event.
     */
    public function updating(Company $company): void
    {
        $company->url = Str::slug($company->name, "-");
    }

    /**
     * Handle the Company "deleted" event.
     */
    public function deleted(Company $company): void
    {
        //
    }

    /**
     * Handle the Company "restored" event.
     */
    public function restored(Company $company): void
    {
        //
    }

    /**
     * Handle the Company "force deleted" event.
     */
    public function forceDeleted(Company $company): void
    {
        //
    }
}

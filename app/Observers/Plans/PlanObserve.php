<?php

namespace App\Observers\Plans;

use App\Models\Planos\Plan;
use Illuminate\Support\Str;

class PlanObserve
{
    /**
     * Handle the Plan "created" event.
     */
    public function creating(Plan $plan): void
    {
        $plan->url  = Str::slug($plan->name, "-");
        $plan->uuid = Str::uuid();
    }

    /**
     * Handle the Plan "updated" event.
     */
    public function updated(Plan $plan): void
    {
        $plan->url  = Str::slug($plan->name, "-");
    }

    /**
     * Handle the Plan "deleted" event.
     */
    public function deleted(Plan $plan): void
    {
        //
    }

    /**
     * Handle the Plan "restored" event.
     */
    public function restored(Plan $plan): void
    {
        //
    }

    /**
     * Handle the Plan "force deleted" event.
     */
    public function forceDeleted(Plan $plan): void
    {
        //
    }
}

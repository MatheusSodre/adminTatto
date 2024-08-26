<?php

namespace App\Company\Traits;

use App\Company\Observers\UserObserver;
use App\Company\Scopes\UserScope;

trait UserTrait
{
    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::observe(UserObserver::class);
        static::addGlobalScope(new UserScope);
    }
}

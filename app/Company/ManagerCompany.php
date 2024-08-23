<?php

namespace App\Company;

use App\Models\Company;

class ManagerCompany
{
    public function getCompanyIdentify()
    {
        return 1;
    }

    public function getCompany()
    {
        return auth()->check() ? auth()->user()->company : 1;
    }

    public function isAdmin(): bool
    {
        return in_array(auth()->user()->email, config('company.admins'));
    }
}

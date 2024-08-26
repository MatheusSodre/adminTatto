<?php

namespace App\Company\Observers;

use App\Company\ManagerCompany;
use Illuminate\Database\Eloquent\Model;

class UserObserver
{
    /**
     * Handle the plan "creating" event.
     *
     * @param \Illuminate\Database\Eloquent\Model $model
     * @return void
     */
    public function creating(Model $model)
    {

        $identify = auth()->user()->id;

        if ($identify){
            $model->user_id = $identify;
        }
    }
}

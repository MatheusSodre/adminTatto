<?php

namespace App\Models\Admin;

use App\Models\Admin\Profile;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;

    protected $fillable = ['name','description'];


    public function profiles()
    {
        return $this->belongsToMany(Profile::class, 'permissions_profile', 'permission_id', 'profile_id');
    }

    public function profilesAvailable($filter)
    {
            $permission = Profile::where('profiles.id',
            function($query){
            $query->select('permissions_profile.profile_id')
                  ->from('permissions_profile')
                  ->whereRaw("permissions_profile.permission_id = {$this->id}");

            })
            ->where(function($queryFilter) use ($filter){
                if ($filter) {
                    $queryFilter->where('permissions.name', 'LIKE',"%{$filter}%");
                }

            })
            ->paginate();
        return $permission;
    }
}

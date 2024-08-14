<?php

namespace App\Models\Admin;

use App\Models\Permission\Permission;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = ['name','description'];

    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'permissions_profile', 'profile_id', 'permission_id');

    }

    public function pemissionAvailable($filter)
    {
            $permission = Permission::whereNotIn('permissions.id',function($query){
            $query->select('permissions_profile.permission_id')
                  ->from('permissions_profile')
                  ->whereRaw("permissions_profile.profile_id = {$this->id}");

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

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

    public function pemissionAvailable()
    {
        $permission = Permission::whereNotIn('id',function($query){
            $query->select('permission_profile.permission_id')
                  ->from('permission_profile')
                  ->whereRaw("permission_profile.profile_id = {$this->id}");

        })
            ->paginate();
        return $permission;
    }
}

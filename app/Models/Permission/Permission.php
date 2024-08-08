<?php

namespace App\Models\Permission;

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
}

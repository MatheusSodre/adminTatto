<?php

namespace App\Repositories\Admin;


use App\Models\Admin\Profile;
use App\Models\Admin\Permission;
use App\Repositories\BaseRepository;

class PermissionRepository extends BaseRepository
{
    public function __construct(Permission $permission)
    {
        $this->model = $permission;
    }

    public function search($request)
    {
        return $this->model
                    ->where(function($query) use ($request){
                        if ($request->filter) {
                            $query->where('name', $request->filter)
                                  ->orWhere('description', 'LIKE', "%{$request->filter}%");
                        }
                        })->paginate();
    }
}
?>

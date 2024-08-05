<?php

namespace App\Repositories\Admin;


use App\Models\Admin\Profile;
use App\Repositories\BaseRepository;

class ProfileRepository extends BaseRepository
{
    public function __construct(Profile $profile)
    {
        $this->model = $profile;
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

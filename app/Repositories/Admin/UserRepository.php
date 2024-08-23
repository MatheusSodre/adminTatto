<?php

namespace App\Repositories\Admin;



use App\Models\User;
use App\Repositories\BaseRepository;

class UserRepository extends BaseRepository
{
    public function __construct(User $user)
    {
        $this->model = $user;
    }

    public function search($request)
    {
        return $this->model
                    ->where(function($query) use ($request){
                        if ($request->filter) {
                            $query->where('name', $request->filter)
                                  ->orWhere('cnpj', 'LIKE', "%{$request->filter}%")
                                  ->orWhere('email', 'LIKE', "%{$request->filter}%");
                        }
                        })->paginate();
    }

    public function find($id)
    {
        return $this->model::find($id);
    }
}
?>

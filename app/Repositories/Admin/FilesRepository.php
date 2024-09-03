<?php

namespace App\Repositories\Admin;

use Illuminate\Database\Eloquent\Collection;
use App\Models\Files\Files;
use App\Repositories\BaseRepository;

class FilesRepository extends BaseRepository
{
    public function __construct(Files $files)
    {
        $this->model = $files;
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

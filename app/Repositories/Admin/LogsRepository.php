<?php

namespace App\Repositories\Admin;

use App\Enums\ServicosStatusEnum;
use Illuminate\Database\Eloquent\Collection;
use App\Models\Files\Files;
use App\Models\Log;
use App\Repositories\BaseRepository;

class LogsRepository extends BaseRepository
{
    public function __construct(Log $files)
    {
        $this->model = $files;
    }

    public function search($request)
    {
        // dd(getServicosName('servi'));
        return $this->model
                    ->where(function($query) use ($request){
                        if ($request->filter) {
                            $query->where('name', $request->filter)
                            ->orWhere('data_arquivo', 'LIKE', "%{$request->filter}%")
                            ->orWhereHas('user', function ($userQuery) use ($request) {
                                $userQuery->where('name', 'LIKE', "%{$request->filter}%");
                             })
                             ->orWhereHas('typeFiles', function ($typeFilesQuery) use ($request) {
                                $typeFilesQuery->orWhere('name', 'LIKE', "%{$request->filter}%");
                            });
                        }
                        })->paginate();
    }
}

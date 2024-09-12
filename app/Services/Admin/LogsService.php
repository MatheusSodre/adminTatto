<?php

namespace App\Services\Admin;

use App\Repositories\Admin\LogsRepository;


class LogsService
{
    /**
     * Create a new service instance.
     *
     * @param  LogsRepository $logsRepository
     * @return void
     */
    public function __construct(private LogsRepository $logsRepository)
    {
        //
    }

    public function store(array $data)
    {
        return $this->logsRepository->create($data);
    }

    public function all()
    {
        return $this->logsRepository->all();
    }

    public function paginate(array $relations = [],array $condition = [], array $columns = ['*'], int $limit = 10)
    {
        return $this->logsRepository->paginate($relations , $condition,  $columns ,  $limit );
    }

    public function getById($id)
    {
        return $this->logsRepository->findOrFail($id);
    }

    public function update($request,$id):bool|null
    {
        return $this->logsRepository->update($request,$id);
    }

    public function destroy($id):bool|null
    {
        return $this->logsRepository->delete($id);
    }

    public function search($resquet)
    {
        return $this->logsRepository->search($resquet);
    }
}
